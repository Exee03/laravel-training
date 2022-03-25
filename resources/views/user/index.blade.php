@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="ml-4 text-lg leading-7 font-semibold">
            <a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">
                User List
            </a>
        </div>
    </div>

    @foreach ($users as $user)
        <div class="ml-12" style="border-bottom: 1px solid gray">
            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                <p>ID : {{ $user['id'] }}</p>
                <p>Name : {{ $user['name'] }}</p>
            </div>
        </div>
    @endforeach
@endsection
