<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $userData = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        $userData['email_verified_at'] = now();
        $user = User::create($userData);

        if ($user) {
            return redirect('login');
        }

    }

    public function login(Request $request) {
        if (Auth::guard()->attempt($request->only('email', 'password'))) {
            return redirect()->intended();
        }
    
        throw new \Exception('There was some error while trying to log you in');
    }

    // public function refreshToken(Request $request)
    // {
    //     $response = Http::asForm()->post(env('APP_URL') . '/oauth/token', [
    //         'grant_type' => 'refresh_token',
    //         'refresh_token' => $request->refresh_token,
    //         'client_id' => env('PASSPORT_PASSWORD_CLIENT_ID'),
    //         'client_secret' => env('PASSPORT_PASSWORD_SECRET'),
    //         'scope' => '',
    //     ]);

    //     return response()->json([
    //         'success' => true,
    //         'statusCode' => 200,
    //         'message' => 'Refreshed token.',
    //         'data' => $response->json(),
    //     ], 200);
    // }


    // public function generateToken($user) {
    //     return Http::post(env('APP_URL') . '/oauth/token', [
    //         'grant_type' => 'password',
    //         'client_id' => env('PASSPORT_PASSWORD_CLIENT_ID'),
    //         'client_secret' => env('PASSPORT_PASSWORD_SECRET'),
    //         'username' => $user['email'],
    //         'password' => $user['password'],
    //         'scope' => '',
    //     ]);
    // }
}
