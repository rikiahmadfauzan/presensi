<?php

namespace App\Http\Controllers;
use DateTime;

use DateTimeZone;
use App\Models\User;
use App\Exports\Data;
use App\Models\Admin;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;


class AdminController extends Controller
{
    function search(Request $req){
        $data['presensi'] = Presensi::where('name', $req->search)
            ->orwhere('name', $req->search)->get();
        return view('admin.datapresensi', $data);
     }
    function export_excel(){
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tgl = $date->format('Y-m-d');
        return (new Data)->download("data-presensi-$tgl.xlsx");
    }
    function showAdmin(){
        $role = 'user';
        $data['user'] = User::all()->where('role', $role);
        return view('admin.homeadmin',$data);
    }
    function presensi(){
        $data['presensi'] = Presensi::all();
        return view('admin.datapresensi', $data);
    }

    function profile(){
        return view('admin.profile');
    }
    function dataPegawai(){
            $role = 'user';
            $data['user'] = User::all()->where('role', $role);
            return view('admin.pegawai', $data);

    }
        function delete($id){
        $user = User::where('id', $id)->delete();
        if($user){
            return Redirect::back()->with(['success' => 'Data Berhasil Dihapus']);
        }else{
            return Redirect::back()->with(['warning' => 'Data Gagal Dihapus']);
        }
      }
        function deleteData($id){
        $presensi = Presensi::where('id', $id)->delete();
        if($presensi){
            return Redirect::back()->with(['success' => 'Data Berhasil Dihapus']);
        }else{
            return Redirect::back()->with(['warning' => 'Data Gagal Dihapus']);
        }
      }

    //   function home(){
    //     return view('admin.home');
    //   }

      function deleteAll(Request $request){
        $id = $request->id;
        User::whereIn('id', $id)->delete();
        return redirect('/pegawai')->with('success', 'Berhasil menghapus data');
          }
    //   function deleteAllData(Request $request){
    //     $id = $request->id;
    //     Presensi::whereIn('id', $id)->delete();
    //     return redirect('/data-presensi')->with('success', 'Berhasil menghapus data');
    //       }




}
