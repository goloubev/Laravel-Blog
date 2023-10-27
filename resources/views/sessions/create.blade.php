@extends('components/layout')

@section('content')
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <h1 class="text-center font-bold text-xl">Log in</h1>

        <form action="/login" method="post">
        	@csrf

            <x-form.toperrors />

            <x-form.input name="email" type="text" />
            <x-form.input name="password" type="password" />

            <input type="submit" value="LOG IN" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" />
        </form>
    </main>
@endsection
