<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginUserRequest;
use App\Http\Requests\Api\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function registerUser(RegisterUserRequest $request): JsonResponse
    {
       $result = $request->validated();

        $result['email_verified_at'] = now();
        $result['created_at'] = now();
        $result['updated_at'] = now();
        $result['password'] = Hash::make($result['password']);
        $result['remember_token'] = Str::random(10);

        try{
            $user = User::create($result);
            $access_token = $user->createToken($user->name . 'authToken')->plainTextToken;

            return response()->json([
                'message' => 'User registration successful',
                'access_token' => $access_token,

                'user agent'=>$request->header('User-Agent')
            ], 201);

        }catch(\Exception $e){
            return response()->json([
                'message' => 'User registration failed',
                'error'=>$e->errors()
            ], 500);

        }
    }

    public function login(LoginUserRequest $request)
    {
        $validated_user = $request->validated();

        $user = User::where('email', $validated_user['email'])->first();


        if (!$user || !Hash::check($validated_user['password'], $user->password)) {
            $errors = [];
            if(!$user) $errors['email'] = "Please supply a valid email address";

            if($user && !Hash::check($validated_user['password'], $user->password)) $errors['password']= "Incorrect Password";

            Log::error('Invalid credentials attempt', [
                'email' => $validated_user['email'],
            ]);

            return response()->json([
                'message' => 'Invalid Credentials',
                'error'=>$errors,
            ],422);
        }

            $access_token = $user->createToken($user->name . 'authToken')->plainTextToken;
                return response()->json([
                    'message' => 'User logged in Successfully',
                    'access_token' => $access_token,
                ],201);
        }


}
