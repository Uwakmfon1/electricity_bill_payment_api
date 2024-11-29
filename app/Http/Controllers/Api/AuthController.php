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

       $user = User::create($result);
        if (!$user) {
            return response()->json([
                'message' => 'could not save user to database'
            ], 400);
        }
        $access_token = $user->createToken($user->name . 'authToken')->plainTextToken;
        return response()->json([
            'message' => 'successfully saved to database',
            'access_token' => $access_token
        ], 201);

    }

    public function login(Request $request)
    {
        $validated_user = $request->validate([
            'email'=>'required|string|email',
            'password'=>'required|min:8'
        ]);

        $user = User::where('email',$validated_user['email'])->first();
        if(!$user || !Hash::check($validated_user['password'],$user->password)) {
            return response()->json([
                'message' => 'Invalid Credentials'
            ]);
        }
        $access_token = $user->createToken($user->name.'AuthToken')->plainTextToken;
            return response()->json([
                'access_token' => $access_token,
            ]);
        }

}
