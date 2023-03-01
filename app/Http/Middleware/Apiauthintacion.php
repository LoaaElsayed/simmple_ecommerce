<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class Apiauthintacion
{
    public function handle($request, Closure $next)
    {
        $token = $request->header('fire');
        if ($token !== null) {
            $user = User::where('acsses_token', '=', $token)->first();
            if ($user !== null) {
                return $next($request);
            } else {
                return response()->json([
                    'msg' => 'token not validate',
                ], 404);
            }
        } else {
            return response()->json([
                'msg' => 'token not sent',
            ], 404);
        }
    }
}
