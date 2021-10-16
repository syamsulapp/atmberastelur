<?php

namespace App\Http\Controllers;

use App\Models\ApiGetTelur;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiGetController extends Controller
{
    public function getDataAllBerasTelurAtauBerasId($id)
    {
        $getDataId = ApiGetTelur::find($id);

        if ($getDataId) {
            return response()->json([
                'success' => true,
                'message' => 'Data Di Temukan',
                'data' => $getDataId
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data tidak ditemukan'
            ], 404);
        }
    }
    // method dibawah paling penting
    public function status_pengambilan($id, $status_pengambilan)
    {
        // logic pengambilan beras dan telur
        $pengambilan = DB::table('tbl_data')->max('status_pengambilan');
        $jml_pengambilan = (int) $pengambilan + $status_pengambilan;
        // cek data pengambilan => tidak boleh melebihi max pengambilan
        $max_pengambilan = DB::table('tbl_data')->max('max_pengambilan');
        $ubahData = ApiGetTelur::find($id);
        if ($jml_pengambilan >= $pengambilan) {
            if($jml_pengambilan < $max_pengambilan) {
                $ubahData->status_pengambilan = $jml_pengambilan;
                $hasilData = $ubahData->save();
                if ($hasilData) {
                    return ["data" => 'jumlah pengambilan' . ' ' . ($jml_pengambilan) . ' ' . 'kali'];
                } else {
                    return ["data" => 'gagal'];
                }
            } else {
                $ubahData->beras = 100;
                $ubahData->telur = 100;
                $ubahData->telur_beras = 100;
                $hasilData = $ubahData->save();
                if($hasilData) {
                    return ["data" => "sudah ngambil"];
                } else {
                    return ["data" => "data gagal"];
                }
            }
        } else {
            return ["data" => "tidak bisa mengambil 2 kali"];
        }
    }

    public function waktu_pengambilan($id, $waktu_pengambilan)
    {
        $now = new \DateTime();
        $date['waktu'] = $now->format("H");
        $waktu_mengambil = array(
            'waktu_pengambilan' => $waktu_pengambilan,
        );
        $ubahData = ApiGetTelur::find($id);
        if ($date['waktu'] == $waktu_mengambil['waktu_pengambilan']) {
            $ubahData->status_waktu_pengambilan = 'Y';
            $hasilData = $ubahData->save();
            if ($hasilData) {
                return ["data" => "time is now"];
            } else {
                return ['data' => 'data gagal di insert'];
            }
        } else {
            $ubahData->status_waktu_pengambilan = 'N';
            $ubahData->status_pengambilan = 0;
            $hasilData = $ubahData->save();
            if ($hasilData) {
                return ["data" => "belum waktu pengambilan"];
            }
        }
    }

    public function max_pengambilan($id, $max_pengambilan)
    {
        $ubahData = ApiGetTelur::find($id);
        $ubahData->max_pengambilan = $max_pengambilan;
        $hasilData = $ubahData->save();
        if ($hasilData) {
            return ["data" => "max pengambilan berhasil insert"];
        } else {
            return ["data" => "max pengambilan gagal insert"];
        }
    }

    public function getDataAllBerasTelurAtauBeras(ApiGetTelur $apiGetTelur)
    {
        return $apiGetTelur->all();
    }

    public function updateDataBerasTelur($id, $telur_beras, $telur)
    {
        $ubahData = ApiGetTelur::find($id);
        $telur_beras = array(
            'jmltelur' => $telur,
            'jumlahBeras' => $telur_beras,
//            'id_kartu' => $id_kartu,
        );
        if ($telur_beras['jmltelur'] >= 0 && $telur_beras['jumlahBeras'] >= 0) {
            if ($telur_beras['jmltelur'] <= 9 && $telur_beras['jumlahBeras'] <= 3) {
                // insert data pengambilan beras dan telur
                $ubahData->beras = 0;
//                $ubahData->id_kartu = $telur_beras['id_kartu'];
                $ubahData->telur = $telur_beras['jmltelur'];
                $ubahData->telur_beras = $telur_beras['jumlahBeras'];
                $hasilData = $ubahData->save();
                if ($hasilData) {
                    return ["data" => "berhasil ambil telur dan beras"];
                } else {
                    return ['data' => 'data gagal di insert'];
                }
            } else {
                return ["data" => "beras tidak lebih dari 3 liter dan telur hanya sampai 9 butir"];
            }
        } else {
            return ["data" => "data salah"];
        }
    }

    public function updateDataBeras($id, $beras)
    {
        $ubahData = ApiGetTelur::find($id);
        $JmlBeras = $beras;
        if ($JmlBeras <= 3) {
            $ubahData->beras = $JmlBeras;
            $ubahData->telur = 0;
            $ubahData->telur_beras = 0;
            $hasilData = $ubahData->save();
            if ($hasilData) {
                return ["data" => "berhasil ambil beras"];
            } else {
                return ['data' => 'gagal'];
            }
        } else {
            return ["data" => "beras hanya sampai 3 liter"];
        }
    }
}
