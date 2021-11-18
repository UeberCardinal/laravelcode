<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function create()
    {
        return view('user.create');
    }

    public function store(RegisterUserRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        session()->flash('success', 'Регистрация пройдена');
        Auth::login($user);
        return redirect()->home();
    }

    public function loginForm()
    {
        return view('user.login');
    }

    public function login(LoginUserRequest $request)
    {

        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            $user = User::where('email', $request->email)->first();
            $user->active = 1;
            $user->save();
            session()->flash('success', 'You are logged');
            if (Auth::user()->is_admin) {
                return redirect()->route('home');
            } else {
                return redirect()->home();
            }
        }

        return redirect()->back()->with('error', 'Incorrect login or password');
    }

    public function logout()
    {
        $emailUser = Auth::user()->email;
        $user = User::where('email', $emailUser)->first();
        $user->active = 0;
        $user->save();
        Auth::logout();
        return redirect()->route('home');
    }
}
