<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{

    public function create() {
        return view('sessions.create');
    }

    public function store() {
        // Validate the request
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Attempt to log in the user
        // based on provided credentials
        if (auth()->attempt($attributes)) {
            session()->regenerate();
            // Redirect with a success flash message
            return redirect('/')->with('success', 'Welcome back!');
        }

        // Auth failed
        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.'
        ]);
    }

    public function destroy() {
        auth()->logout();

        return redirect('/')-with('success', 'Goodbye!');
    }
}
