@extends('layouts.app')
@include('layouts.nav')
@section('content')
    <div class="flex justify-center items-center h-screen">

        <div class="flex flex-col bg-gray-900 p-20 rounded md:px-8 py-10">
            <h1 class=" text-2xl font-bold text-gray-200 text-center mb-8 md:text-3xl md:mb-10">Sign in to your account</h1>
            <p>Your Email:</p>
            <x-forms.input type="email" name="email" placeholder="name@mail.com" />
            <p>Password:</p>
            <x-forms.input type="password" name="password" placeholder="********" />
            <div class="flex justify-between mt-3">

                <div class="flex items-center">
                    <input id="link-checkbox" type="checkbox" value="" class="w-4 h-4">
                    <label for="link-checkbox" class="ml-2 font-medium text-gray-900 dark:text-gray-300">Remember
                        me</label>
                </div>

                <a class="text-blue-500" href="#">Forgot Password?</a>
            </div>

            <button class="my-2 rounded-xl p-2 mt-5 md:px-32 bg-blue-600">Sign in</button>
            <a class="text-center mt-5 text-blue-500" href="/signup">Dont't have an account?</a>
        </div>
    </div>
@endsection
