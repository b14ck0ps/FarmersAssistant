@extends('layouts.app')
@section('content')
    <div class="flex items-center justify-center max-h-screen lg:overflow-hidden lg:mt-56">
        <div class="container w-[1200px] p-5 h-[390px] flex gap-5 flex-wrap justify-center">
            @foreach ($plans as $plan)
                <div class="p-4 w-[200px] max-w-sm rounded-lg border shadow-md sm:p-8 bg-gray-800 border-gray-700">
                    <h5 class="mb-4 text-xl font-medium text-gray-100">{{ $plan->planName }}</h5>
                    <div class="flex items-baseline text-gray-100">
                        <span class="text-3xl font-semibold">৳</span>
                        <span class="text-5xl font-extrabold tracking-tight">{{ intval($plan->price) }}</span>
                        <span class="ml-1 text-xl font-normal text-gray-400">/month</span>
                    </div>
                    <!-- List -->
                    <ul role="list" class="my-7 space-y-5">
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-blue-600" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <title>Check icon</title>
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-400">{{ $plan->orderDiscount }}<span
                                    class="text-sm">%</span>
                                Discount
                            </span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-blue-500" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <title>Check icon</title>
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-400">{{ $plan->description }}</span>
                        </li>
                    </ul>
                    <button type="submit"
                        class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Choose
                        plan</button>
                </div>
            @endforeach
        </div>
    </div>
@endsection
