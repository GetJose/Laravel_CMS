<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(){
        return view('Admin.login');
    }

    public function authenticate(Request $request){
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        $remember = $request->input('remember', false);

        if (Auth::attempt($validator, $remember)) {
            return redirect()->route('painel');
        }else{
            $erros = ['email' => 'Senha e/ou Email incorretos'];
            return redirect()->route('login')
            ->withErrors($erros)
            ->withInput();
        }
       
    }

    public function logout(Request $r){
        Auth::logout();
        return  redirect()->route('login');
    }

}
