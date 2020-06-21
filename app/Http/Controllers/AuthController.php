<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function getSignin()
    {
        return view('signin');
    }

    public function postSignin(Request $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']), $request->has('remember'))) {
            return redirect()->back()->with('info', 'Неправильный логин или пароль');
        }
        return redirect()->route('home')->with('info', 'Вы вошли на портал');
    }

    public function getSignup()
    {
        return view('signup');
    }

    public function postSignup(Request $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        DB::table('user_roles')->insert([
           'user_id' => $user->id,
        ]);

        return redirect()
            ->route('home')
            ->with('info', 'Вы успешно зарегистрировались! Можно войти на портал.');
    }

    public function getSignout()
    {
        Auth::logout();
        return redirect()->route('home')->with('delete', 'Вы вышли из учетной записи');
    }
}
