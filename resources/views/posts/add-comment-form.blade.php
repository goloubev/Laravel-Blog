@auth
    <form name="form" method="post" action="/posts/{{ $post->slug }}/comments" class="border border-gray-200 p-6 rounded-xl">
        @csrf

        <header>Comments ?</header>
        <div class="m-6">
            <textarea
                name="comment"
                class="border border-gray-200 w-full text-sm focus:outline-none focus:ring"
                cols="30"
                rows="5"></textarea>

            @error('comment')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="m-6">
            <input type="submit" value="Post" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
        </div>
    </form>
@else
    <p class="font-semibold">
        <i><a href="/login">Log in to leave a comment</a></i>
    </p>
@endauth
