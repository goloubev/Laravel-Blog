@php
    use App\Models\Category;
@endphp

@extends('components/layout')

@section('content')
    <main class="max-w-2xl mx-auto mt-10 lg:mt-10 space-y-6">
        <x-admin-menu />

        <h1 class="font-bold text-xl">
            Edit post :
            <a href="/posts/{{ $post->slug }}" class="text-blue-500" target="_blank">Preview post</a>
        </h1>
        <h1 class="font-bold text-xl">{{ $post->title }}</h1>

        <form action="/admin/posts/{{ $post->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.toperrors />

            <x-form.input name="title" type="text" value="{{ old('title', $post->title) }}" />

            <div class="flex mt-1">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" value="{{ old('thumbnail', $post->thumbnail) }}" />
                </div>
                <a href="{{ $post->thumbnail }}" target="_blank">
                    <img src="{{ $post->thumbnail }}" style="width:100px;" class="rounded-xl ml-6" />
                </a>
            </div>

            <x-form.textarea name="excerpt">{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
            <x-form.textarea name="body">{{ old('body', $post->body) }}</x-form.textarea>

            <div class="mb-6">
                <label class="block mb-3">
                    Category
                    <select name="category_id" class="border border-gray-400 p-2 w-full">
                        <option value="">Select...</option>

                        @foreach (Category::all() as $category)
                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                            >{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <x-form.error name="category_id" />
                </label>
            </div>

            <input type="submit" value="SUBMIT" class="bg-blue-400 text-white rounded py-2 px-4 mt-5 hover:bg-blue-500" />
        </form>
    </main>
@endsection
