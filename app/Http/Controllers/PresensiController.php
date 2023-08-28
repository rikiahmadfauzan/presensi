<?php

namespace App\Http\Controllers;

use App\Exports\Data;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class PresensiController extends Controller
{
    function export_excel(){
        return Excel::download(new Data, "datapresensi.xlsx");
    }
    function show(){
        $nik = Auth::user()->nik;
        $data['presensi'] = Presensi::all()->where('nik', $nik);
        return view('pegawai.pegawai', $data);
    }
    function profile(){
        return view('pegawai.profile');
    }
    function data(){
        $nik = Auth::user()->nik;
        $data['presensi'] = Presensi::all()->where('nik', $nik);
        return view('pegawai.data', $data);
    }
    function showCekin(){
        $hariini = date("Y-m-d");
        $nik = Auth::user()->nik;
        $cek = DB::table('presensi')->where('tgl', $hariini)->where('nik', $nik)->count();
        return view('pegawai.checkin', compact('cek'));
    }
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
                echo "success|Terimakasih, Hati-Hati Di Jalan|out";
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
