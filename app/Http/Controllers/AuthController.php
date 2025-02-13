<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'organization_id' => $request->organization_id,
            'role' => $request->role
        ]);


        $token = JWTAuth::fromUser($user);
        $user->update(['remember_token' => $token]);

        return response()->json([
            'message' => 'User registered successfully',
            'token' => $token
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Validate the credentials
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = Auth::user();

        return response()->json([
            'user' => $user,
            'token' => $token,
            'token_type' => 'Bearer',
            // 'expires_in' => auth('api')->factory()->getTTL() * 60 // Expiration time
        ]);
    }
}
