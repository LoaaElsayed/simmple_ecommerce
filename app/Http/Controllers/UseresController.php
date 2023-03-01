<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UseresController extends Controller
{
    public function index(){
        $user=  User::all();
        return view('users.index',compact('user'));
    }
}
