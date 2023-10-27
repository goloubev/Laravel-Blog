<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;

// php artisan make:controller PostController
class PostController extends Controller
{
    public function index(): View
    {
        $result = view('posts/index', [
            'posts' => Post::latest()->superMegaFilter(request([
                'search',
                'category',
                'author',
            ]))->paginate(7)->withQueryString(),
        ]);

        return $result;
    }

    public function show(Post $post): View
    {
        return view('posts/show', [
            'post' => $post,
        ]);
    }
}
