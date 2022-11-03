@extends('layouts.app')
@section('content')
    <div class="text-center text-3xl m-10">
        <h1>Farmer's Dashboard</h1>
    </div>
    <div>
        <div class="container mx-auto my-5 p-5">
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
                            src="https://extendedevolutionarysynthesis.com/wp-content/uploads/2018/02/avatar-1577909_960_720.png">
                        <div class="my-5"></div>
                        <h1 class="font-bold text-xl leading-8 my-1">{{ Auth::user()->getFullName() }}</h1>
                        <h3 class=" font-lg text-semibold leading-6">Farmer from {{ Auth::user()->city }}</h3>

                        <ul class=" py-2 px-3 mt-3 divide-y rounded shadow-sm">
                            <li class="flex items-center py-3">
                                <span>Status</span>
                                <span class="ml-auto"><span
                                        class="bg-green-500 py-1 px-2 rounded text-white text-sm">Active</span></span>
                            </li>
                            <li class="flex items-center py-3">
                                <span>Member since</span>
                                <span class="ml-auto">{{ Auth::user()->created_at }}</span>
                            </li>
                        </ul>
                    </div>
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
                                    <div class="px-4 py-2">{{ Auth::user()->city }} , {{ Auth::user()->postalCode }}</div>
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
                    <div class="">
                        <h1 class="text-3xl text-center p-6">Feedbacks</h1>
                        <div class="mb-3 w-96 md:w-auto">
                            <div class="input-group relative flex flex-row gap-5 items-center w-full mb-4">
                                <input type="search"
                                    class="form-control bg-gray-800 relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal bg-clip-padding border border-solid rounded transition ease-in-out m-0 focus:border-blue-600 focus:outline-none"
                                    placeholder="Search" aria-label="Search" aria-describedby="button-addon3">
                                <button
                                    class="btn px-6 py-2 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded hover:bg-gray-500 hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                                    type="button" id="button-addon3">Search</button>
                            </div>
                        </div>
                    </div>
                    {{-- end search email --}}
                    <!-- Inbox -->
                    <!-- Dummy DATA For Now -->
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
                                                    First
                                                </th>
                                                <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                                    Last
                                                </th>
                                                <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                                    Handle
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="border-b">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium ">1
                                                </td>
                                                <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                                                    Mark
                                                </td>
                                                <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                                                    Otto
                                                </td>
                                                <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                                                    @mdo
                                                </td>
                                            </tr>
                                            <tr class=" border-b">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium ">2
                                                </td>
                                                <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                                                    Jacob
                                                </td>
                                                <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                                                    Thornton
                                                </td>
                                                <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                                                    @fat
                                                </td>
                                            </tr>
                                            <tr class=" border-b">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium ">3
                                                </td>
                                                <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                                                    Larry
                                                </td>
                                                <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                                                    Wild
                                                </td>
                                                <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                                                    @twitter
                                                </td>
                                            </tr>
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
