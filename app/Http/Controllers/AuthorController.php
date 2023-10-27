<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

// php artisan make:controller AuthorController
class AuthorController extends Controller
{
    public function index(User $author): Factory|View|Application
    {
        return view('posts/index', [
            'posts' => $author->posts,
        ]);
    }
}
