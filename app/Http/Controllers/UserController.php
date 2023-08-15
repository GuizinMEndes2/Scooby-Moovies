<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $user = User::where('email', $request->input('email'))->first();

            if (!$user || !password_verify($request->input('password'), $user->password)) {
                return redirect()->route('login')->with('erro', 'Email ou senha incorretos');
            }

            if ($user->isAdmin) {
                Auth::loginUsingId($user->id);
                return redirect()->intended('/');
            }
            Auth::loginUsingId($user->id);
            return redirect()->intended();
        }

        return view('user.login');
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }

    public function register()
    {
        return view('user.register');
    }

    public function regSuccess(Request $form)
    {
        $dados = $form->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'password' => 'required',
        ]);
        $dados['password'] = Hash::make($dados['password']);

        $user = User::create($dados);

        event(new Registered($user));

        return redirect()->route('login')->with('sucesso', 'Conta Criada com sucesso!');
    }
}
