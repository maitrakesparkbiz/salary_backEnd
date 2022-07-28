<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            $user= User::select('id','name','email',)->where('email', $request->email)->first();
            $resultToken = $user->createToken($request->email);
            $user['token'] = $resultToken->accessToken;
            return $user;
        }
        else
        {
            return false;
        }
    }
    public function register(Request $request)
    {
        $name= explode("@",$request->email);
        $user = [
            'name'=>$name[0],
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        return User::create($user);
    }
}
