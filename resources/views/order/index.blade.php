@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="ml-4 text-lg leading-7 font-semibold">
            <a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">
                Order List ( {{ $total }} orders )
            </a>
        </div>
    </div>

    @foreach ($orders as $order)
        <div class="ml-12" style="border-bottom: 1px solid gray">
            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                <p>Date : {{ $order['createdAt']->format('d/m/Y') }}</p>
                <p>Name : {{ $order['name'] }}</p>
            </div>
        </div>
    @endforeach
@endsection
