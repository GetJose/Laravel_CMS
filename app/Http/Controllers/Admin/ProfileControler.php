<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileControler extends Controller
{
    private $loggedUser;


    public function __construct()
    {
        $this->loggedUser = Auth::user();
    }
    public function edit()
    {
        return view('Admin.users.profile', ['user' => $this->loggedUser]);
    }

    public function update(Request $request)
    {
        $errors = [];

        $user = User::find($this->loggedUser->id);

        $request->validate([
            'name' => 'required|string |max:100',
            'email' => 'required|string|email',
        ]);

        $data = $request->only(['name', 'email', 'password', 'password_confirmation']);

        $user->name = $data['name'];

        if ($user->email != $data['email']) {
            $hasEmail =  User::where('email', $data['email'])->get();
            if (count($hasEmail) > 0) {
                return redirect()->route('profile')->withErrors(['email' => "emails ja existe"]);
            }
            $user->email = $data['email'];
        }

        if (!empty($data['password'])) {
            if ($data['password'] != $data['password_confirmation']) {
                return redirect()->route('profile')->withErrors(['password' => "A confirmação da senha esta incorreta"]);
            } else {
                $user->password = Hash::make($data['password']);
            }
        };
        $user->save();
        return redirect()->route('painel');
    }
}
