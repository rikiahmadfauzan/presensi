<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Presensi;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function showAdmin(){
        return view('admin.admin');
    }
    // function presensi(){
    //     return view('admin.datapresensi');
    // }
    // function layouts(){
    //     // $nik = Auth::user()->nik;
    //     $data['user'] = User::first();
    //     return view('pegawai.layouts', $data);
    // }
    function presensi(){
        $data['presensi'] = Presensi::all();
        $data['admin'] = Admin::all();
        return view('admin.datapresensi', $data);
    }

    function create(Request $req){
        $nik = Auth::user()->nik;
        Admin::create([
            'id'=> $req->id,
            'nama' => $req->nama,
            'nik' => $nik,
            'foto_in' => $req->file('foto_in')->store('foto_in')


        ]);
        return redirect('/data-presensi');
    }

}
