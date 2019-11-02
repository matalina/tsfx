<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetRequest;
use App\Mail\ResetPasswordEmail;
use App\Models\User;


class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email','password');

        if(auth()->once($credentials)) {

            $user =  auth()->user();

            return response()->json($user->load('saves'));
        }

        throw new \Exception('Invalid Credentials');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->only('name','email','password');
        $data['api_token'] = true;

        $user = User::create($data);

        return response()->json($user->load('saves'));
    }

    public function reset(ResetRequest $request)
    {
        $user = User::where('email','=',$request->get('email'))->first();

        if($user != null) {
            $password = \Str::random(10);

            $user->password = $password;
            $user->save();

            \Mail::to($request->get('email'))->send(new ResetPasswordEmail($password));
        }

        return response()->json([
            'message' => 'If your account exists a new password has been sent to the supplied email address.',
        ]);


    }
}
