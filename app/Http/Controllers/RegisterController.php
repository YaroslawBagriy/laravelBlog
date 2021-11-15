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
            'username' => ['required' , 'max:255', 'min:3'],
            'email' => ['required' , 'email', 'max:255'],
            'password' => ['required' , 'max:255', 'min:7']
        ]);

        User::create($attributes);

        return redirect('/');
    }
}