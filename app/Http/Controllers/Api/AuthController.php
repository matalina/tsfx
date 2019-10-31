<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;


class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email','password');

        if(auth()->once($credentials)) {

            $user =  auth()->user();

            return response()->json($user);
        }

        throw new \Exception('Invalid Credentials');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->only('name','email','password');
        $data['api_token'] = true;

        $user = User::create($data);

        return response()->json($user);
    }
}
