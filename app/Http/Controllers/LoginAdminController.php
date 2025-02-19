<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    //

    public function store()
    {

        //validate
        $attributes =  request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'emai' => 'Wrong Email.'
            ]);
        }
        request()->session()->regenerate();
        // regen token
        return redirect(url('/admin'));
        //redirect
    }
}
