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
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Username / Password salah');
        }

        session([
            'user' => [
                'id'   => $user->id,
                'name' => $user->name,
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