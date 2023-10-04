<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\Guard;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    function show(){
        return view('auth.login');
    }
    function showReg(){
        return view('auth.register');
    }

    public function proseslogin(Request $request){
       $request->validate([
        'email'=>'required',
        'password' => 'required',
       ],[
        'email.required' => 'Email wajib diisi',
        'password.required' => 'Password wajib diisi',
       ]
    );
    $proseslogin = [
        'email' => $request->email,
        'password' => $request->password,
    ];
    if(Auth::attempt($proseslogin)){
       if(Auth::user()->role == 'admin'){
        return redirect('/home-admin');
       }elseif(Auth::user()->role == 'user'){
        return redirect('/home');
       }
    }else{
        return redirect('/login')->with('error', 'Username atau Password yang anda masukan tidak sesuai.');
    }

    }
    function logout(){
        Auth::logout();
        return redirect('/login');
    }

    function create(Request $req){
        $req->validate([
            'nik'=>'required|unique:users',
            'name' => 'required',
            'email' => 'required|unique:users',
            // 'password' => 'required',
           ],[
            'nik.required' => 'Nik wajib diisi',
            'name.required' => 'Name wajib diisi',
            'email.required' => 'Email wajib diisi',
            // 'password.required' => 'Password wajib diisi',
            'nik.unique' => 'Nik sudah terdaftar',
            'email.unique' => 'Email sudah terdaftar',
           ]
        );
        User::create([
            'id' => $req->id,
            'nik' => $req->nik,
            'name' => $req->name,
            'email' => $req->email,
            'password' => $req->nik

        ]);

        return redirect('/pegawai')->with('success', 'Berhasil menambahkan data');
    }

    //  function update(Request $req){

    //    User::where('id', $req->id)->update([
    //         'id' => $req->id,
    //         'name' => $req->name,
    //         // 'foto_profile' => $req->foto_profile,
    //         // 'email' => $req->email,
    //         'password' => bcrypt($req->password)

    //     ]);


    //     return redirect('/profil')->with('success', 'Berhasil update profile.');
    //  }
     function update(Request $req){
        $nik = Auth::user()->nik;
        $pw = Auth::user()->password;
        $name = $req->name;
        $password = Hash::make($req->password);
        $user = DB::table('users')->where('nik', $nik)->first();
        // $pw = $user->password;
        if($req->hasFile('foto_profile')){
            $foto_profile = $nik ."." . $req->file('foto_profile')->getClientOriginalExtension();
        }else{
            $foto_profile = $user->foto_profile;
            // $password = $user->password;
        }
        if(empty($req->password)){
            $data = [
            'id' => $req->id,
            'name' => $name,
            'foto_profile' => $foto_profile,
            // 'password' => bcrypt($pw)


            ];
        }else{
            $data = [
                'id' => $req->id,
                'name' => $name,
                'password' => $password,
                'foto_profile' => $foto_profile
            ];
        }
        $update = DB::table('users')->where('nik', $nik)->update($data);
        if($update){
            if($req->hasFile('foto_profile')){
                $folderPath = "public/uploads/foto_profile/";
                $req->file('foto_profile')->storeAs($folderPath, $foto_profile);
            }
            return redirect('/profil')->with('success', 'Berhasil update profile.');

        }else{
            return redirect('/profil')->with('error', 'Gagal update profile.');

        }

     }
     function updateAdmin(Request $req){
        $nik = Auth::user()->nik;
        $name = $req->name;
        $password = Hash::make($req->password);
        $user = DB::table('users')->where('nik', $nik)->first();
        if($req->hasFile('foto_profile')){
            $foto_profile = $nik ."." . $req->file('foto_profile')->getClientOriginalExtension();
        }else{
            $foto_profile= $user->foto_profile;
        }
        if(empty($req->password)){
            $data = [
            'id' => $req->id,
            'name' => $name,
            // 'password' => $password,
            'foto_profile' => $foto_profile,


            ];
        }else{
            $data = [
                'id' => $req->id,
                'name' => $name,
                'password' => $password,
                'foto_profile' => $foto_profile
            ];
        }
        $update = DB::table('users')->where('nik', $nik)->update($data);
        if($update){
            if($req->hasFile('foto_profile')){
                $folderPath = "public/uploads/foto_profile/";
                $req->file('foto_profile')->storeAs($folderPath, $foto_profile);
            }
        return redirect('/profil-admin')->with('success', 'Berhasil update profile.');

        }else{
            return redirect('/profil-admin')->with('error', 'Gagal update profile.');

        }

     }
    //  function updateAdmin(Request $req){
    //     User::where('id', $req->id)->update([
    //         'id' => $req->id,
    //         'name' => $req->name,
    //         'email' => $req->email,
    //         'password' => bcrypt($req->password)

    //     ]);
    //     return redirect('/profil-admin')->with('success', 'Berhasil update profile.');
    //  }
     function updatePegawai(Request $req){

        User::where('id', $req->id)->update([
            'id' => $req->id,
            'nik' => $req->nik,
            'name' => $req->name,
            'email' => $req->email,
            // 'password' => bcrypt($req->nik)

        ]);
        return redirect('/pegawai')->with('success', 'Berhasil update data pegawai.');
     }

}
