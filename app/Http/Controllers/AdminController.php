<?php

namespace App\Http\Controllers;
use App\Exports\Data;

use App\Models\Admin;
use App\Models\Presensi;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function export_excel(){
        return (new Data)->download('data_presensi.xlsx');
    }
    function showAdmin(){
        return view('admin.admin');
    }
    function presensi(){
        $data['presensi'] = Presensi::all();
        return view('admin.datapresensi', $data);
    }

    function profile(){
        return view('admin.profile');
    }
    function dataPegawai(){
        $data['user'] = User::all();
        return view('admin.pegawai', $data);
    }


}
