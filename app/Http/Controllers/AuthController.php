<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
         User::create([
             'user' => 'Jojo LeMoche',
             'email' => 'jojo@gmail.com',
             'password' => Hash::make('1234'),
         ]);
        //ici on peut rentrer du code pour entrer du code en base de donnée

        return view('security.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        // dd($credentials);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return to_route('index');
        }

        return back()->with([
            'error' => 'Email ou mot de passe incorrect'
        ]);

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login');
    }
}