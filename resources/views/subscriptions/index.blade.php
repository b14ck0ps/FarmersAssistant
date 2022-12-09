@extends('ReactUI.Layout.app')
@section('content')
    <div id="subs"></div>
    {{-- <div class="flex flex-col items-center justify-center max-h-screen lg:overflow-hidden lg:mt-44">
        @if (session()->has('info'))
            <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 text-center px-4 py-3 rounded relative w-[600px] m-auto mb-10"
                role="alert">
                <strong class="font-bold">Attention!</strong>
                <span class="block sm:inline">{{ session()->get('info') }}</span>
            </div>
        @endif
        <div class="flex items-center justify-center gap-10 mb-10">
            <div class="flex flex-col items-center justify-center gap-2">
                <h1 class="text-2xl font-bold">Account</h1>
            </div>
            <!-----Method------>
            <div>
                <input type="text" id="pay_method"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Bank ID" required>
            </div>
            <!-----MethodEnd------>
        </div>

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
                    @if (session('subs') == 0)
                        <a href="{{ route('subscription.subscribe', $plan->id) }}"
                            class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Subscribe</a>
                    @endif
                </div>
            @endforeach
        </div>
    </div> --}}
@endsection
