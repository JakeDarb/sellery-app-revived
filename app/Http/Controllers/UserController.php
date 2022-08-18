<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
      //
    /*public function create(){
        // SHOW FORM
        return view('users/create');
    }*/

    public function register(){
        return view('users/register');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);

        $user = new \App\Models\User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $file = $request->file('file');

        if(!empty($file)){
            $t=time();
            $imageSrc = date("Y-m-d").$t.'-user'.'.'.$file->extension();
            $file->move(public_path('attachements/users'), $imageSrc);

            $user->picture_source = $imageSrc;
        }else{
            $user->picture_source = '';
        }
        $user->save();
        return view('users/login');
    }

    public function login(){
        return view('users/login');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $request->session()->flash('message', "Je bent uitgelogd");
        return redirect('/products');
    }

    public function handleLogin(Request $request){
        $credential = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credential)){
            $request->session()->flash('message', "Je bent ingelogd");
            return redirect('/products');
        }else{
            $request->session()->flash('message', 'Je email of wachtwoord is incorrect');
            return redirect("/login");
        }
    }
}