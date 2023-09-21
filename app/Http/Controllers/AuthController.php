<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\Guard;
use App\Models\User;
use Illuminate\Database\QueryException;

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
        return redirect('/login')->withErrors('Username atau     Password yang anda masukan tidak sesuai')->withInput();
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


}
