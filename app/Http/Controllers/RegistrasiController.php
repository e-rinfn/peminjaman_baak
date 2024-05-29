<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerAction(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'organisasi' => 'required|max:255',
            'role_name' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        // Create a new user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'organisasi' => $validatedData['organisasi'],
            'role_name' => $validatedData['role_id'],
            'password' => bcrypt($validatedData['password']),
        ]);


        // Login the user
        auth()->login($user);

        // Redirect to the homepage
        return redirect()->route('registrasi');
    }

    public function tampilUserAdmin()
    {
        $data = User::orderBy("name", "desc")->get();
        return view('admin.registrasi')->with('nama', $data);
    }
}
