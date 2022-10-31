@extends('layouts.app')
@section('content')
    <div class="flex justify-center items-center h-screen">

        <div class="flex flex-col bg-gray-900 p-20 rounded md:px-8 py-10">
            <h1 class=" text-2xl font-bold text-gray-200 text-center mb-8 md:text-3xl md:mb-10">Create An Account</h1>
            <form action="/register" method="POST">
                @csrf
                <div class="flex flex-col">
                    <label for="name" class="text-gray-200">Enter Your Name</label>
                    <x-forms.input type="text" name="name" placeholder="John doe" />
                    @error('name')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label for="email" class="text-gray-200">Enter Your Email</label>
                    <x-forms.input type="email" name="email" placeholder="name@email.com" />
                    @error('email')
                        <p class="text-red-500 text-sm">
                            {{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label for="password" class="text-gray-200">Enter Your Password</label>
                    <x-forms.input type="password" name="password" placeholder="********" />
                    @error('password')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label for="password_confirmation" class="text-gray-200">Confirm Your Password</label>
                    <x-forms.input type="password" name="password_confirmation" placeholder="********" />
                    @error('password_confirmation')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <button type="submit" class="my-2 rounded-xl p-2 mt-5 md:px-32 bg-blue-600">Sign UP</button>
                </div>
            </form>

            <a class="text-center mt-5 text-blue-500" href="/signin">Already have an account?</a>
        </div>
    </div>
@endsection
