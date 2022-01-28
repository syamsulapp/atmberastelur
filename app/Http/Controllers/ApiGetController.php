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
        // cek data pengambilan => tidak boleh melebihi max pengambilan
        $max_pengambilan = DB::table('tbl_data')->max('max_pengambilan');
        $ubahData = ApiGetTelur::find($id);
        if ($status_pengambilan == $max_pengambilan) {
            $ubahData->beras = 100;
            $ubahData->telur = 100;
            $ubahData->telur_beras = 100;
            $ubahData->status_pengambilan = $status_pengambilan;
            $hasilData = $ubahData->save();
            if ($hasilData) {
                return ["data" => "sudah ngambil"];
            } else {
                return ["data" => "data gagal"];
            }
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
            // untuk refresh(tap kembali kartu pada mesin)
            if ($telur_beras['jmltelur'] == 0 && $telur_beras['jumlahBeras'] == 0) {
                $ubahData->beras = 0;
                $ubahData->telur = $telur_beras['jmltelur'];
                $ubahData->telur_beras = $telur_beras['jumlahBeras'];
                $ubahData->status_pengambilan = 0; // data pengambilan 0 jika status nya refresh
                $hasilData = $ubahData->save();
                if ($hasilData) {
                    return ["data" => "tempelkan kembali kartu pada mesin"];
                }
            } else {
                if ($telur_beras['jmltelur'] <= 9 && $telur_beras['jumlahBeras'] <= 3) {
                    // insert data pengambilan beras dan telur
                    $ubahData->beras = 0;
                    //                $ubahData->id_kartu = $telur_beras['id_kartu'];
                    $ubahData->telur = $telur_beras['jmltelur'];
                    $ubahData->telur_beras = $telur_beras['jumlahBeras'];
                    $ubahData->status_pengambilan = 1;
                    $hasilData = $ubahData->save();
                    if ($hasilData) {
                        return ["data" => "berhasil ambil beras dan telur"];
                    } else {
                        return ['data' => 'data gagal di insert'];
                    }
                } else {
                    return ["data" => "beras tidak lebih dari 3 liter dan telur hanya sampai 9 butir"];
                }
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

    // tambahan 

    public function jadwal()
    {
        // jadwal pengambilan beras dan telur
    }

    public function limit_pengambilan_berdasarkan_jadwal()
    {
        // limit pengambilan berdasarkan jadwal
    }

    public function animasi_layout_atmberas()
    {
    }

    public function img_tambah()
    {
    }

    public function kirim_status()
    {
        // kirim status ke layar , yang fungsi statusnya untuk cek apakah ada beras dan telur di dalam mesin atm
    }
}
