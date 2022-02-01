<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    
    public function auth(Request $req){
     
        $user = User::where('cpf', $req->cpf)->first();
        $confirm = Hash::check($req->senha, $user->senha);

        if ($user && $confirm) // se existir um usuário e com a senha correta
        {
            Auth::login($user); //efetuando a operação de autenticação            
        } else {

            $msg = 'Usuário e/ou senha inválidos';
            $arr_err = Array('login' => $msg);

            return Redirect::route('login')->withErrors($arr_err);

        }

        if (Auth::check())
        {
            return Redirect::route('login');
        }

    }

}
