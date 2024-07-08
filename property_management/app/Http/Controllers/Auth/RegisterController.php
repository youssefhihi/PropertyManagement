<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
     /**
     * Display the registration view.
     */
    public function create()
    { 
        return view('Auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $request->merge(['password' => Hash::make($request->password)]);
        
        $user = User::create($request->validated());
        event(new Registered($user));
        Auth::login($user);
        return redirect('/')->with('success', 'Registration successful! Welcome to our platform.');
    }
}
