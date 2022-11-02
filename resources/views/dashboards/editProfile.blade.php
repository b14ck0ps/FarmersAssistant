@extends('layouts.app')
@section('content')
    <div class="container w-[300px] md:w-[600px] m-auto p-5">
        <img class="rounded-full mx-auto h-40 w-40  shadow"
            src="https://extendedevolutionarysynthesis.com/wp-content/uploads/2018/02/avatar-1577909_960_720.png">
        <div class="my-20"></div>
        <form method="POST" action="/updateProfile">
            @csrf
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 ">First
                        name</label>
                    <input name="fname" type="text" id="first_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                        placeholder="John" required="" value="{{ old('fname') ?? Auth::User()->firstName }}">
                    @error('fname')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">Last
                        name</label>
                    <input name="lname" type="text" id="last_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                        placeholder="Doe" required="" value="{{ old('lname') ?? Auth::User()->lastName }}">
                    @error('lname')
                        <p class="text-red-500 text-xs
                        italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 ">Username</label>
                    <input name="username" type="text" id="username"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                        placeholder="john123" required="" value="{{ old('username') ?? Auth::User()->username }}">
                    @error('username')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 ">Phone
                        number</label>
                    <input name="phone" type="tel" id="phone"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                        placeholder="123-45-678" required="" value="{{ old('phone') ?? Auth::User()->phone }}">
                    @error('phone')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="City" class="block mb-2 text-sm font-medium text-gray-900 ">City</label>
                    <input name="city" type="text" id="City"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                        placeholder="i.e. Dhaka" required="" value="{{ old('city') ?? Auth::User()->city }}">
                    @error('city')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="Postal Code" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Postal Code</label>
                    <input name="postCode" type="number" id="Postal Code"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                        placeholder="1234" required="" value="{{ old('postCode') ?? Auth::User()->postalCode }}">
                    @error('postCode')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="Gender" class="block mb-2 text-sm font-medium text-gray-900 ">Gender</label>
                    <input type="radio" name="gender" value="male"
                        {{ Auth::User()->gender == 'male' ? 'checked=' . '"' . 'checked' . '"' : '' }} checked> Male
                    <input class="ml-5" type="radio" name="gender" value="female"
                        {{ Auth::User()->gender == 'female' ? 'checked=' . '"' . 'checked' . '"' : '' }}> Female
                </div>
                <div>
                    <label for="DOB" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Date Of Birth</label>
                    <input type="date" name="dob"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                        required="" value="{{ old('dob') ?? Auth::User()->dob }}">
                    @error('dob')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Address</label>
                <input type="address" name="address"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                    placeholder="1/3 Dhaka , Bangladesh" required=""
                    value="{{ old('address') ?? Auth::User()->address }}">
                @error('address')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email
                    address</label>
                <input type="email" name="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                    placeholder="john.doe@company.com" required="" value="{{ old('email') ?? Auth::User()->email }}">
                @error('email')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Old Password</label>
                <input type="password" name="password_old"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                    placeholder="•••••••••" value="{{ old('password_old') }}">
                @if ($errors->has('invalid_password'))
                    <h4 class="text-red-700 text-xs italic">{{ $errors->first() }}</h4>
                @endif
            </div>
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">New Password</label>
                <input type="password" name="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                    placeholder="•••••••••">
                @error('password')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 ">Confirm
                    password</label>
                <input type="password" name="password_confirmation"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    "
                    placeholder="•••••••••">
                @error('password')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Update</button>
        </form>
    </div>
@endsection
