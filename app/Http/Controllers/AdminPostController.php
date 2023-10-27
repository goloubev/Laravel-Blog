<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('admin/posts/index', [
            'posts' => Post::paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('admin/posts/create');
    }

    public function store(): \Illuminate\Foundation\Application|Redirector|RedirectResponse
    {
        // Storage
        // php artisan storage:link

        $attributes = $this->validatePost();
        $attributes['slug'] = Str::slug($attributes['title']);
        $attributes['user_id'] = auth()->user()->id;
        $attributes['thumbnail'] = Storage::url(request()->file('thumbnail')->store('public/thumbnails'));

        $result = Post::create($attributes);

        return redirect('/admin/posts/'.$result->id.'/edit')->with('success', 'Post created');
    }

    public function edit(Post $post): View
    {
        return view('admin/posts/edit', ['post' => $post]);
    }

    public function update(Post $post): \Illuminate\Foundation\Application|Redirector|RedirectResponse
    {
        $attributes = $this->validatePost($post);
        $attributes['slug'] = Str::slug($attributes['title']);

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = Storage::url(request()->file('thumbnail')->store('public/thumbnails'));
        }

        $post->update($attributes);

        return back()->with('success', 'Post updated');
    }

    public function delete(Post $post): RedirectResponse
    {
        $post->delete();

        return back()->with('success', 'Post deleted');
    }

    protected function validatePost(?Post $post = null): array
    {
        $post = $post ?? new Post();

        $attributes = request()->validate([
            'title'       => ['required'],
            'excerpt'     => ['required'],
            'thumbnail'   => $post->exists ? ['image'] : ['required', 'image'],
            'body'        => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);
        return $attributes;
    }
}
