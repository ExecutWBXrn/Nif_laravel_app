<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function store(Request $request){
        $attrs = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($attrs)){
            throw ValidationException::withMessages(['email' => 'Дані введені не правильно або ж такого користувача не існує']);
        }

        $request->session()->regenerate();

        return redirect('/');
    }

    public function show()
    {
        $user = Auth::user();
        return view('auth.dashboard', ['user' => $user]);
    }

    public function destroy(){
        Auth::logout();
        return redirect('/');
    }
}
