<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use App\Models\Presensi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PresensiContoller extends Controller
{
    function show(){
        return view('pegawai.pegawai');
    }
    function showCekin(){
        return view('pegawai.checkin');
    }
    function showCekout(){
        return view('pegawai.checkout');
    }
    // function createPegawai(Request $req){
    //     $timezone = 'Asia/Jakarta';
    //     $date = new DateTime('now', new DateTimeZone($timezone));
    //     $tanggal = $date->format('Y-m-d');
    //     $localtime = $date->format('H:i:s');
    //    Presensi::create([
    //            'id' => $req->id,
    //            'nama' => $req->nama,
    //            'nik' => $req->nik,
    //            'lokasi' => $req->lokasi,
    //            'evidence' => $req->file('evidence')->store('evidence'),
    //            'jammasuk' => $localtime,
    //            'tanggal' => $tanggal

    //        ]);
    //        return redirect('/pegawai');
    //  }
    // function update(Request $req){
    //     $timezone = 'Asia/Jakarta';
    //     $date = new DateTime('now', new DateTimeZone($timezone));
    //     $tanggal = $date->format('Y-m-d');
    //     $localtime = $date->format('H:i:s');
    //    Pegawai::where('id', $req->id)->update([
    //     'id' => $req->id,
    //     'nama' => $req->nama,
    //     'nik' => $req->nik,
    //     'lokasi' => $req->lokasi,
    //     'evidence' => $req->file('evidence')->store('evidence'),
    //     'jammasuk' => $localtime,
    //     'tanggal' => $tanggal


    //     ]);
    //     return redirect('menu');
    //  }

    public function store(Request $request){
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tgl = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');
        $nik = Auth::user()->nik;
        $lokasi = $request->lokasi;
        $image = $request->image;
        $folderPath = "public/evidence/";
        $image_parts = explode(";base64", $image);
        $image_base64 = base64_decode($image_parts[1]);
        $formatName = $nik . "-" .$tgl;
        $fileName = $formatName . ".png";
        $file = $folderPath .$fileName;
        $data = [
            'nik' => $nik,
            'tgl' => $tgl,
            'jam_in' => $localtime,
            'foto_in' => $fileName,
            'lokasi_in' => $lokasi
        ];
        $simpan = DB::table('presensi')->insert($data);
        if($simpan){
            echo 0;
            Storage::put($file, $image_base64);
        }else{
            echo 1;
        }
    }
}
