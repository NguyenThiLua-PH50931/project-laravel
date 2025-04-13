<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Sai tài khoản hoặc mật khẩu'], 401);
    }

    $token = $user->createToken('myapptoken')->plainTextToken;

    return response()->json([
        'message' => 'Đăng nhập thành công',
        'token' => $token,
        // 'user' => $user
    ]);
}
}
