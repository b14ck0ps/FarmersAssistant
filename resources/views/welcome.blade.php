@extends('layouts.app')
@section('content')
    <title>Welcome To Farmers Assistant</title>
    @include('components.carousel')
    <!----Searchbar-->
    <div class="mx-52 mt-10">
        <form action="{{ route('search.product') }}" method="POST">
            @csrf
            <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Your Email</label>
            <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="search" id="search" name="search"
                    class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search products" required="">
                <button type="submit"
                    class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>
    </div>

    <!-- Products Card-->
    <div class="flex flex-wrap mx-10 items-center justify-center">
        @php
            if (session()->has('products')) {
                $products = session()->get('products');
            }
        @endphp
        @foreach ($products as $product)
            <div class="w-60 max-w-sm rounded-lg shadow-md bg-gray-900 border-gray-700 m-10" id="{{ $product->id }}">
                <a href="#">
                    <img class="p-8 rounded-t-lg" src="{{ URL::asset('/uploads/product') }}/{{ $product->image }}"
                        alt="product image">
                </a>
                <div class="px-3 pb-5">
                    <div class="flex justify-between">
                        <a href="#">
                            <h5 class="font-bold tracking-tight truncate">{{ $product->title }}</h5>
                        </a>
                        <p class="text-xs">Sotck: {{ $product->quantity }}</p>
                    </div>
                    <div class="my-2 truncate">
                        <p>{{ $product->description }}</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold  ">৳ {{ $product->price }}</span>
                        <a href="{{ route('cart.add', $product->id) }}"
                            class=" focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-3 py-2 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Add
                            to cart</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
