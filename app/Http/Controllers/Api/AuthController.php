<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerUser(Request $request)
    {
       $result = $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8'
        ]);
        $result['email_verified_at'] = now();
        $result['created_at'] = now();
        $result['updated_at'] = now();
        $result['password'] = Hash::make($result['password']);

        try {
            $user = User::create($result);
//            $accessToken = $user->createToken('authToken')->accessToken;
            return response()->json(['message'=>'successfully saved to database'], 201);
        } catch (\Exception $e) {
            return response()->json(['message'=>'could not save user to database'],400);
        }
    }

    public function login(Request $request)
    {

    }
}
