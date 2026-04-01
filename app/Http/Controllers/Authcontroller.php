<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Register(Request $request) {
        $role = 'operator';
        if($request->email === 'superadmin@gmail.com' && $request->role === 'admin') {
            $role = 'admin';
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $role
        ]);

        
        return response()->json($user);
    }

    public function Login(Request $request) {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'email or password invalid',
            ], 401);
        }

        $user = Auth::User();

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'message' => 'Login successfull',
            'data' => $user,
            'token' => $token,
        ]);
    }

    public function Logout(Request $request) {
        $request->user()->Tokens()->delete();

        return response()->json([
            'message' => 'User logged out'
        ]);
    }
}
