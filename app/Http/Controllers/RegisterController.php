<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class RegisterController extends Controller
{
    
    public function registerDirect(Request $request)
{
    if (!$request->isMethod('post')) {
        return redirect('/login')->withErrors('Metode tidak diizinkan.');
    }

    // Logika pembuatan akun
    $defaultData = [
        'email' => $request->input('email'),
        'password' => $request->input('password'),
    ];

    $user = User::create($defaultData);

    Auth::login($user);

    return redirect()->route('report.index')->with('success', 'Akun Anda telah berhasil dibuat!');

}


}


