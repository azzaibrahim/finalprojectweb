<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){

        return view('auth.login');

    }

    public  function authenticate(Request $request){

        //dd($request->toArray());

        $login_data = ['email'=>$request->email,'password'=>$request-> password];

        if (Auth::attempt($login_data));{

            return redirect()->route('Dashboard.index');
        }
            return redirect()->back()->with('error','login failed');
    }

    public function logout(){

        if (Auth::check()){

            Auth::logout();
        }

        return view('auth.login');


    }
}
