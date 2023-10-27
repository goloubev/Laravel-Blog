<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class SessionController extends Controller
{
    public function create(): Factory|View|Application
    {
        return view('sessions/create');
    }

    public function login(): Redirector|RedirectResponse|Application
    {
        $attributes = request()->validate([
            'email'     => ['required', 'email'],
            'password'  => ['required'],
        ]);

        if (! auth()->attempt($attributes)) {
            return back()->withErrors(['error' => 'Wrong email or password']);
        }
        else {
            session()->regenerate();
            return redirect('/home')->with('success', 'Your are logged in');
        }
    }

    public function logout(): Redirector|Application|RedirectResponse
    {
        // Log out user
        auth()->logout();

        return redirect('/home')->with('success', 'You are logged out');
    }
}
