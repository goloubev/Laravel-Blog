@php
    use App\Models\Category;
@endphp

@extends('components/layout')

@section('content')
    <main class="max-w-6xl mx-auto mt-10 lg:mt-10 space-y-6">
        <h1 class="text-center font-bold text-xl">Manage posts</h1>

        <x-admin-menu />

        <div class="flex justify-center mt-8">
            <div class="w-full">
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto">
                        @foreach ($posts as $post)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <a href="/posts/{{ $post->slug }}" target="_blank">{{ $post->title }}</a>
                                </td>
                                <td class="py-3 px-6 text-right">
                                    <a href="/admin/posts/{{ $post->id }}/edit" class="text-blue-700 hover:text-red-700">Edit</a>
                                </td>
                                <td class="py-3 px-6 text-right">
                                    <form name="form" id="form" method="post" action="/admin/posts/{{ $post->id }}">
                                    	@csrf

                                    	@method('DELETE')
                                        <button class="text-blue-700 hover:text-red-700">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
