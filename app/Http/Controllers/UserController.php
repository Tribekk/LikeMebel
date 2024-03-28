<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request){
        $user = $request->only(['email', 'password']);
        if(auth()->attempt($user)){
            return redirect(route('home'));
        }
        return redirect(route('login'))->withErrors('Не верно введён логин и/или пароль');
    }

    public function logout(){
        auth()->logout();
        return redirect()->intended('/');
    }

    public function signup(Request $request){
        $request->validate([
            "email" => ["required", "email", "string", "unique:users"],
            "password" => ["required", "confirmed", "min:8"],
            'name' => ['required', 'string']
        ]);
        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'name' => $request->name
        ]);
        if($request['check']!=''){
            Auth::login($user);
        }
        return redirect(route('home'));
    }

    public function updatePhoneUser(Request $request){
        $user = auth()->user();
        $request->validate([
            'phone' => ['min:11','max:12']
        ]);
        $user->phone = $request->phone;
        $user->save();

        return redirect(route('thisUser'));
    }
    public function thisUser(){
        $user = auth()->user();

        return view('thisUser', compact('user'));
    }

    public function destroy(){
        auth()->user()->delete();
        auth()->logout();


        return view('login');
    }

    public function avatar(Request $request){
        $request->validate([
            'file' => 'image|required'
        ]);
        $user = Auth::user();
        $path = $request->file('file')->store('avatars', 'public');
        $user->avatar = $path;
        if ($user->save()){
            return redirect(route('thisUser'));
        }
        return redirect(route('thisUser'))->withErrors('Файл повреждён');
    }

    public function password(Request $request){
        $request->validate([
            "password" => ["required", "confirmed", "min:8"]
        ]);
        $user = auth()->user();
        if (Hash::check($request->oldPassword, $user->password)) {
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect(route('password'))->withErrors('Успех');
        }
        return redirect(route('password'))->withErrors('Не верный пароль');
    }
}
