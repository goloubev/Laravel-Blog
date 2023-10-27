<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class PostCommentsController extends Controller
{
    public function store(Post $post): RedirectResponse
    {
        request()->validate([
            'comment' => ['required'],
        ]);

        $post->comments()->create([
            'user_id' => auth()->id(),
            'body' => request('comment'),
        ]);

        return back();
    }
}
