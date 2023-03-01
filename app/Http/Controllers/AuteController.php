<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuteController extends Controller
{
    public function registerform()
    {
        return view('auth.register');
    }
    public function register(Request $request){
        $request->validate([
            'name'=>'required|string|min:3',
            'email'=>'required|email|max:150',
            // 'password'=>'required|string|confirmed|min:4|max:9',
        ]);
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
        ]);
        Auth::login($user);
        return redirect('/');
    }
    public function login(){
        return view('auth.login') ;
    }
    public function loginstore(Request $request){
        $request->validate([
            'email'=>'required|email|max:150',
            // 'password'=>'required|string|confirmed|min:4|max:9',
        ]);
        $login=Auth::attempt(['email'=>$request->email,'password'=>$request->password]);
        if(!$login){
            return redirect()->back()->with("done",'this email isnor register');
        }
        return redirect('/') ;
    }
    public function logout(){
        Auth::logout();
        return view('auth.login');
    }
}

