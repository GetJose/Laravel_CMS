<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index(){
        return view('Admin.register');
    }

    public function register(Request $r){
        $data = $r->only(['name', 'email', 'password', 'password_confirmation']);
        $validator = $this->validator($data);

        if($validator->fails()){
            return redirect()->route('register')
            ->withErrors($validator)
            ->withInput();
        }

        $user = $this->create_user($data);
        if (Auth::attempt($data)) {
            return redirect()->route('painel');
        }

    }

    protected function validator(array $data){
        return Validator::make($data, [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|string|unique:users',
            'password' => 'required|string|min:4|confirmed'
        ]);
    }

    protected function create_user( array $data){
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
