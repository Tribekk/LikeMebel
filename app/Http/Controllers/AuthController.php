<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function create()
    {
        return redirect("home");
    }

    public function store(Request $request)
    {
        $request->validate([
            "email" => ["required", "email", "string", "unique:users"],
            "password" => ["required", "confirmed", "min:8"],
            'name' => ['required', 'string'],
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'name' => $request->name
        ]);

        Auth::login($user);
        $user = Auth::user()->name;
        return redirect('/');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        return redirect()->route('home');
    }

}