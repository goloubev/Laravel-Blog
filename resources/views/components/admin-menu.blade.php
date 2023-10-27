<p>
    <b>
        <a href="/admin/posts"
           class="{{ request()->is('admin/posts') ? 'bg-red-200' : '' }}"
        >List posts</a>
    </b>
    |
    <b>
        <a href="/admin/posts/create"
           class="{{ request()->is('admin/posts/create') ? 'bg-red-200' : '' }}"
        >Add new post</a>
    </b>
</p>
