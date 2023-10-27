<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

// php artisan make:controller CategoryController
class CategoryController extends Controller
{
    public function index(Category $category): Factory|View|Application
    {
        return view('posts/index', [
            'posts' => $category->posts
        ]);
    }
}
