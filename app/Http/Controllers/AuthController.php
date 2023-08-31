<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\Guard;
use App\Models\User;


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
        'nik'=>'required',
        'password' => 'required',
       ],[
        'nik.required' => 'Nik wajib diisi',
        'password.required' => 'Password wajib diisi',
       ]
    );
    $proseslogin = [
        'nik' => $request->nik,
        'password' => $request->password,
    ];
    if(Auth::attempt($proseslogin)){
       if(Auth::user()->role == 'admin'){
        return redirect('/admin');
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
        User::create([
            'id' => $req->id,
            'nik' => $req->nik,
            'name' => $req->name,
            'email' => $req->email,
            'password' => $req->password

        ]);

        return redirect('/login');
    }


}
