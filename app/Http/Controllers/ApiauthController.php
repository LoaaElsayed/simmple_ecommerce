<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


class ApiauthController extends Controller
{
    public function register(Request $request)
    {
        $validate3 = validator::make($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|email|max:150',
            'password' => 'required|string|confirmed|min:4|max:9',
        ]);
        if ($validate3->fails()) {
            return response()->json([
                'errors' => $validate3->errors(),
            ]);
        }
        $token = Str::random(64);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'acsses_token' => $token,
        ]);
        return response()->json([
            'acsses_token' => $token,
        ], 201);
    }
    public function login(Request $request)
    {
        $validate4 = validator::make($request->all(), [
            'email' => 'required|email|max:150',
            'password' => 'required|string|min:4|max:9',
        ]);
        if ($validate4->fails()) {
            return response()->json([
                'errors' => $validate4->errors(),
            ]);
        }
        $useremail = User::where('email', '=', $request->email)->first();
        if ($useremail !== null) {
            $userpass = Hash::check($request->password,$useremail->password);
            if ($userpass) {
                $token = Str::random(64);
                $useremail->update([
                    'acsses_token' => $token,
                ]);
                return response()->json([
                    'acsses_token' => $token,
                ], 201);
            }else{
                return response()->json([
                    'msg' => 'password is not correct',
                ]);
            }
        }else{
            return response()->json([
                'msg' => 'email not found',
            ]);
        }
    }
    public function logout(Request $request)
    {
        $token = $request->header('fire');
        $user = User::where('acsses_token', '=', $token)->first();
        $user->update([
            'acsses_token' => null,
        ]);
        return response()->json([
            'message' => 'logout sucess'
        ], 200);;
    }
}
