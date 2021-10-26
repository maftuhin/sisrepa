<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use SebastianBergmann\Environment\Console;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web', ['except' => ['login', 'auth', 'logout']]);
    }

    function login()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa 
            return redirect('/');
        }
        $key = Hash::make('123456');
        return view('auth.login',['key'=> $key]);
    }

    function auth(Request $request)
    {
        $credential = $request->only(['email', 'password']);

        Auth::attempt($credential);
        if (Auth::check()) {
            return redirect('/');
        } else {
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('login');
        }
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        // return redirect()->route('login');
        // Auth::logout();
        // Session::put('token', null);
        // Session::save();
        return redirect('/login');
        // return response()->json(['message' => 'User successfully signed out']);
    }
}
