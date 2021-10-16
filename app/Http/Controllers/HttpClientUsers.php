<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HttpClientUsers extends Controller
{
    
    public function getTelurDanBeras()
    {
        $get_data_all = Http::get('http://localhost/dmi/BackendApiDMIAtmBeras/public/api/getApiTelur')->json();
        return view('umk', ['get_data_all' => $get_data_all]);
    }   

    // public function get_data_beras(Request $getData)
    // {
    //     $data['request'] = Http::get('http://localhost/BackendAtmBerasUMK/public/api/getApi/1')['data']['kabupaten'];
    //     return $data['request'];
    // }
}
