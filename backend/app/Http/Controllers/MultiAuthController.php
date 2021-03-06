<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MultiAuthController extends Controller
{
    public function showLoginForm() {
        return view('multi_auth.login');
}
public function login(Request $request) {

    $credentials = $request->only(['email', 'password']);
    $guard = $request->guard;

    if(\Auth::guard($guard)->attempt($credentials)) {

        return redirect($guard .'/dashboard'); // ログインしたらリダイレクト

    }

    return back()->withErrors([
        'auth' => ['認証に失敗しました']
    ]);
}
}