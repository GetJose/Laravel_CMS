<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\Controller;

class UserContoller extends Controller
{
    private $loggedUser;
   

    public function __construct()
    {
        $this->loggedUser = Auth::user();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::paginate(4);
        $users = User::all();
        $data['users'] = $users;
        $data['loggedUser'] = $this->loggedUser;

        return view('Admin.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string |max:100',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:4|string|confirmed'
        ]);

        $data = $request->only(['name', 'email', 'password', 'password_confirmation']);
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        if ($user) {
            return view('Admin.users.edit', [
                'user' => $user
            ]);
        }

        return redirect()->route('users.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $errors = [];

        $user = User::find($id);

        $request->validate([
            'name' => 'required|string |max:100',
            'email' => 'required|string|email',
        ]);

        $data = $request->only(['name', 'email', 'password', 'password_confirmation']);

        $user->name = $data['name'];

        if ($user->email != $data['email']) {
            $hasEmail =  User::where('email', $data['email'])->get();
            if (count($hasEmail) > 0) {
                return redirect()->route('users.edit', ['user' => $user])->withErrors(['email' => "emails ja existe"]);
            }
            $user->email = $data['email'];
        }

        if (!empty($data['password'])) {
            if ($data['password'] != $data['password_confirmation']) {
                return redirect()->route('users.edit', ['user' => $user])->withErrors(['password' => "A confirmação da senha esta incorreta"]);
            } else {
                $user->password = Hash::make($data['password']);
            }
        };
        $user->save();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $loggedId = Auth::id();

        if ($loggedId != $id) {
            $user = User::find($id);
            if ($user) {
                $user->delete();
            }
        }
        return redirect()->route('users.index');
    }
    public static function accessDenied()
    {
        return redirect()->route('login');
    }
}
