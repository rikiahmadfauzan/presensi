<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\Guard;

class AuthController extends Controller
{
    function show(){
        return view('auth.login');
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
        echo "gagal";
    }
    return redirect()->back();

}
function logout(){
    Auth::logout();
    return redirect('/login');
 }

}
