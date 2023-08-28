<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function showAdmin(){
        return view('admin.admin');
    }
    function presensi(){

        // $nik = Auth::user()->nik;
        $data['presensi'] = Presensi::all();
        return view('admin.datapresensi', $data);
    }
    // function layouts(){
    //     // $nik = Auth::user()->nik;
    //     $data['user'] = User::first();
    //     return view('pegawai.layouts', $data);
    // }
}
