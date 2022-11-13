@extends('layouts.app')
@section('content')
    <div class="flex justify-center items-center h-screen">
        <form action="login" method="POST">
            @csrf
            <div class="flex flex-col bg-gray-900 rounded md:px-8 py-10">
                <h1 class=" text-2xl font-bold text-gray-200 text-center mb-8 md:text-3xl md:mb-10">Sign in to your account
                </h1>
                {{-- error --}}
                @if ($errors->any())
                    <h4 class="text-red-700 text-center p-3">{{ $errors->first() }}</h4>
                @endif
                @csrf
                <p>Your Email:</p>
                <input type="email" name="email" placeholder="name@mail.com" @if (Cookie::has('adminemail')) value="{{ Cookie::get('adminemail') }}" @endif/>
                <p>Password:</p>
                <input type="password" name="password" placeholder="********"  @if (Cookie::has('adminpassword')) value="{{ Cookie::get('adminpassword') }}" @endif />
                <div class="flex justify-between mt-3">

                    <div class="flex items-center">
                        <input id="link-checkbox" type="checkbox"  name ="remember" value="" class="w-4 h-4">
                        <label for="link-checkbox" class="ml-2 font-medium ">Remember
                            me</label>
                    </div>

                    <a class="text-blue-500" href="#">Forgot Password?</a>
                </div>

                <button class="my-2 rounded-xl p-2 mt-5 md:px-32 bg-blue-600">Sign in</button>
        </form>
        <a class="text-center mt-5 text-blue-500" href="/signup">Dont't have an account?</a>
    </div>
    </div>
@endsection
