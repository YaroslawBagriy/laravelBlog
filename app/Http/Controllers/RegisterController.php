<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create() {
        return "";
    }

    public function store() { 
        // Create the user + form validation
        $attributes = request()->validate([
            'name' => ['required' , 'max:255'],
            'username' => ['required' , 'max:255', 'min:3', Rule::unique('users', 'username')],
            'email' => ['required' , 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required' , 'max:255', 'min:7']
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created.');
    }
}
