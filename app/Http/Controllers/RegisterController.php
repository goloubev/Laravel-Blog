<?php

namespace App\Http\Controllers;

// php artisan make:controller RegisterController
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class RegisterController extends Controller
{
    public function create(): Factory|View|Application
    {
        return view('register/create');
    }

    public function store(): Redirector|Application|RedirectResponse
    {
        // https://laravel.com/docs/10.x/validation#available-validation-rules
        $attributes = request()->validate([
            'name'      => ['required', 'min:1', 'max:250'],
            'username'  => ['required', 'min:1', 'max:250', 'unique:users,username'], // Rule::unique('users', 'username')
            'email'     => ['required', 'min:1', 'max:250', 'email', 'unique:users,email'], // Rule::unique('users', 'email')
            'password'  => ['required', 'min:3'],
        ]);
        $attributes['password'] = bcrypt($attributes['password']);
        $user = User::create($attributes);

        // Log in user
        auth()->login($user);

        return redirect('/home')->with('success', 'Your account is created');
    }
}
