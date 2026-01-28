<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function form()
    {
        return view('auth.login');
    }

public function login(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ], [
        'username.required' => 'Username wajib diisi',
        'password.required' => 'Password wajib diisi',
    ]);

    $user = User::where('username', $request->username)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return back()
            ->withInput()
            ->withErrors([
                'password' => 'Username atau password tidak sesuai'
            ]);
    }

    session([
        'user' => [
            'id'   => $user->id,
            'username' => $user->username,
            'role' => $user->role,
        ]
    ]);

    return $user->role === 'admin'
        ? redirect('/admin')
        : redirect('/kasir');
}


    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }
}