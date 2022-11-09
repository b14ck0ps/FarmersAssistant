@extends('layouts.app')
@section('content')
    <div class="text-center text-3xl m-10">
        {{-- <h1>Farmer's Dashboard</h1> --}}
    </div>
    <div>
        <div class="container mx-auto my-5 p-5">
            @if (session()->has('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 text-center px-4 py-3 rounded relative w-[600px] m-auto mb-10"
                    role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session()->get('success') }}</span>
                </div>
            @endif
            <div class="md:flex no-wrap md:-mx-2 ">
                <!-- Left Side -->
                <div class="w-full md:w-3/12 md:mx-2">
                    <!-- Profile Card -->
                    <div class="p-3">
                        <div class="image overflow-hidden">
                            <img class="h-auto w-full mx-auto"
                                src="https://lavinephotography.com.au/wp-content/uploads/2017/01/PROFILE-Photography-112.jpg"
                                alt="">
                        </div>
                        <img class="rounded-full mx-auto h-40 w-40  shadow"
                            src="{{ URL::asset('uploads/avater') }}/{{ Auth::User()->photo }}">
                        <div class="my-5"></div>
                        <h1 class="font-bold text-xl leading-8 my-1">{{ Auth::user()->getFullName() }}</h1>
                        <h3 class=" font-lg text-semibold leading-6">Farmer from {{ Auth::user()->city }}</h3>

                        <ul class=" py-2 px-3 mt-3 divide-y rounded shadow-sm">
                            <li class="flex items-center py-3">
                                <span>Subscription</span>
                                @if (session('subs') == 1)
                                    <span data-popover-target="popover-right" data-popover-placement="right" type="button"
                                        class="ml-auto bg-amber-500 py-1 px-2 rounded text-black text-sm cursor-pointer flex gap-2">{{ $plan->planName }}
                                        <!------icon----->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                        </svg>

                                        <!------iconend----->

                                    </span>
                                    <div data-popover="" id="popover-right" role="tooltip"
                                        class="inline-block absolute invisible z-10 w-64 text-sm font-light rounded-lg border  shadow-sm opacity-0 transition-opacity duration-300 text-gray-400 border-gray-600 bg-gray-800"
                                        style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(10px, 0px);"
                                        data-popper-reference-hidden="" data-popper-escaped=""
                                        data-popper-placement="right">
                                        <div class="py-2 px-3 rounded-t-lg border-b  border-gray-600 bg-gray-700">
                                            <h3 class="font-semibold  text-center text-white"><span
                                                    class="font-bold">{{ $plan->planName }} </span>Subscription
                                            </h3>
                                        </div>
                                        <div class="py-2 px-3">
                                            <div>

                                                <ul class="space-y-4 text-left text-gray-500 dark:text-gray-400">
                                                    <li class="flex items-center space-x-3">
                                                        <!-- Icon -->
                                                        <svg class="flex-shrink-0 w-5 h-5 text-green-400"
                                                            fill="currentColor" viewBox="0 0 20 20"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span>Discount: <span
                                                                class="font-semibold text-gray-900 dark:text-white">{{ $plan->orderDiscount }}
                                                                %</span></span>
                                                    </li>
                                                    <li class="flex items-center space-x-3">
                                                        <!-- Icon -->
                                                        <svg class="flex-shrink-0 w-5 h-5 text-green-400"
                                                            fill="currentColor" viewBox="0 0 20 20"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span>Ends in: <span
                                                                class="font-semibold text-gray-900 dark:text-white">{{ $sub_end }}
                                                                Days</span></span>
                                                    </li>
                                                    <li class="flex items-center space-x-3">
                                                        <!-- Icon -->
                                                        <svg class="flex-shrink-0 w-5 h-5 text-green-400"
                                                            fill="currentColor" viewBox="0 0 20 20"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span>Since: <span
                                                                class="font-semibold text-gray-900 dark:text-white">{{ date('M j, Y', strtotime($subscription->start_date)) }}
                                                            </span></span>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                        <div data-popper-arrow=""
                                            style="position: absolute; top: 0px; transform: translate(0px, 0px);"></div>
                                    </div>
                                @else
                                    <span class="ml-auto"><a href="{{ route('subscription.buy') }}"
                                            class="bg-yellow-200 py-1 px-2 rounded text-black text-sm">Buy
                                            Premium</a></span>
                                @endif
                            </li>
                            <li class="flex items-center py-3">
                                <span>Member since</span>
                                <span class="ml-auto">{{ date('M j, Y', strtotime(Auth::user()->created_at)) }}</span>
                            </li>
                        </ul>
                    </div>
                    <!-- End of profile card -->
                    <!--Start order -->
                    <div class="p-3">
                        <h1 class="text-xl font-bold leading-8 my-1">Orders</h1>
                        <div class="my-5"></div>
                        <ul class=" py-2 px-3 mt-3 divide-y rounded shadow-sm">
                            @if (isset($orders))
                                @foreach ($orders as $order)
                                    <li class="flex items center py-3">
                                        <span>{{ $order->id }}</span>
                                        <span class="ml-16">{{ $order->total }}</span>
                                        <span class="ml-auto">{{ date('d-m-Y', strtotime($order->created_at)) }}</span>
                                    </li>
                                @endforeach
                            @else
                                <li class="flex items center py-3">
                                    <span>No orders yet</span>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <!--End order -->
                    <div class="my-4"></div>
                </div>
                <!-- Right Side -->
                <div class="w-full md:w-9/12 mx-2 h-64">
                    <!-- Profile tab -->
                    <!-- About Section -->
                    <div class="bg-inherit p-3 shadow-sm rounded-sm">
                        <div class="flex items-center space-x-2 font-semibold leading-8">
                            <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <span class="tracking-wide">About</span>
                        </div>
                        <div>
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">First Name</div>
                                    <div class="px-4 py-2">{{ Auth::user()->firstName }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Last Name</div>
                                    <div class="px-4 py-2">{{ Auth::user()->lastName }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Gender</div>
                                    <div class="px-4 py-2">{{ Auth::user()->gender }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Contact No.</div>
                                    <div class="px-4 py-2">{{ Auth::user()->phone }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Address</div>
                                    <div class="px-4 py-2">{{ Auth::user()->address }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">City & Post Code </div>
                                    <div class="px-4 py-2">{{ Auth::user()->city }} , {{ Auth::user()->postalCode }}
                                    </div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Email.</div>
                                    <div class="px-4 py-2">
                                        <a class="text-blue-600"
                                            href="mailto:jane@example.com">{{ Auth::user()->email }}</a>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Birthday</div>
                                    <div class="px-4 py-2">{{ Auth::user()->dob }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of about section -->

                    <div class="mt-20"></div>
                    {{-- search email --}}
                    <h1 class="text-3xl text-center p-3">Inbox</h1>
                    <form action="{{ route('search.mail') }}" method="POST">
                        @csrf
                        <div class="p-10">
                            <div class="mb-3 w-96 md:w-auto">
                                <div class="input-group relative flex flex-row gap-5 items-center w-full mb-4">
                                    <input type="search" name="search" id="search"
                                        class="form-control bg-gray-800 relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal bg-clip-padding border border-solid rounded transition ease-in-out m-0 focus:border-blue-600 focus:outline-none"
                                        placeholder="Search by subject" aria-label="Search"
                                        aria-describedby="button-addon3">
                                    <button
                                        class="btn px-6 py-2 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded hover:bg-gray-500 hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                                        type="submit" id="button-addon3">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    {{-- end search email --}}
                    <!-- Inbox -->
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full">
                                        <thead class="border-b">
                                            <tr>
                                                <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                                    #
                                                </th>
                                                <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                                    Subject
                                                </th>
                                                <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                                    Advisor
                                                </th>
                                                <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                                    Date
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                if (session('user_mails')) {
                                                    $mails = session('user_mails');
                                                }
                                            @endphp
                                            @foreach ($mails as $mail)
                                                <tr class="border-b">
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-300 underline ">
                                                        <a class="hover:text-blue-500"
                                                            href="/view/mail/{{ $mail->id }}">
                                                            {{ $mail->id }}
                                                        </a>
                                                    </td>
                                                    <td
                                                        class="text-sm font-light px-6 py-4 whitespace-nowrap text-blue-300">
                                                        <a class="hover:text-blue-500"
                                                            href="/view/mail/{{ $mail->id }}">
                                                            {{ $mail->subject }}
                                                        </a>
                                                    </td>
                                                    <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                                                        {{ $mail->advisor_name }}
                                                    </td>
                                                    <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                                                        {{ $mail->created_at }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @php
                                                if ($mails = session('user_mails')) {
                                                    session()->forget('user_mails');
                                                }
                                            @endphp
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of profile tab -->
                </div>
            </div>
        </div>
    </div>
@endsection
