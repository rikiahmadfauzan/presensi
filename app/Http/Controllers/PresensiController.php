<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PresensiController extends Controller
{
    function show(){
        $nik = Auth::user()->nik;
        $data['presensi'] = Presensi::all()->where('nik', $nik);
        return view('pegawai.pegawai', $data);
    }
    function showCekin(){
        $hariini = date("Y-m-d");
        $nik = Auth::user()->nik;
        $cek = DB::table('presensi')->where('tgl', $hariini)->where('nik', $nik)->count();
        return view('pegawai.checkin', compact('cek'));
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
        $name = Auth::user()->name;
        $lokasi = $request->lokasi;

        $cek = DB::table('presensi')->where('tgl', $tgl)->where('nik', $nik)->count();

        if($cek >0){
            $ket ="out";
        }else{
            $ket = "in";
        }
        $image = $request->image;
        $folderPath = "evidence/";
        $image_parts = explode(";base64", $image);
        $image_base64 = base64_decode($image_parts[1]);
        $formatName = $nik . "-" .$tgl . "-" . $ket;
        $fileName = $formatName . ".png";
        $file = $folderPath .$fileName;
        if($cek > 0){
            $data_pulang = [
                'jam_out' => $localtime,
                'foto_out' => $fileName,
                'lokasi_out' => $lokasi
            ];
            $update = DB::table('presensi')->where('tgl', $tgl)->where('nik', $nik)->update($data_pulang);
            if($update){
                echo "success|Terimkasih, Hati-Hati Di Jalan|out";
                Storage::put($file, $image_base64);
            }else{
                echo "error|Maaf Absen Gagal|out";
            }
        }else{
            $data = [
                'name' => $name,
                'nik' => $nik,
                'tgl' => $tgl,
                'jam_in' => $localtime,
                'foto_in' => $fileName,
                'lokasi_in' => $lokasi
            ];

            $simpan = DB::table('presensi')->insert($data);
            if($simpan){
                echo "success|Selamat Bekerja|in";
                Storage::put($file, $image_base64);
            }else{
                echo "error|Maaf Absen Gagal|in";
            }
        }

    }
}
