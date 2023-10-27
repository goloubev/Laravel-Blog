@extends('components/layout')

@section('content')
    @include ('posts/header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count() > 0)
            <x-post-featured-card :posts="$posts[0]" />

            @if ($posts->count() > 1)
                <div class="lg:grid lg:grid-cols-3">
                    @foreach ($posts->skip(1) as $post)
                        <x-post-card :posts="$post" />
                    @endforeach
                </div>
            @endif

            {{-- php artisan vendor:publish --}}
            {{-- \resources\views\vendor\pagination\ --}}
            {{-- {{ $posts->links() }} --}}
        @else
            <p class="text-center">No posts yet.</p>
        @endif
    </main>
@endsection
