@extends('layouts.app')
@section('content')
    <div class="flex flex-col items-center justify-center">
        <div class=" flex-grow w-[800px] m-10 border rounded-2xl border-gray-700">
            <!-------Title------>
            <h1 class="flex items-center text-5xl font-extrabold text-gray-200 p-5">Seek Advice<span
                    class=" text-2xl font-semibold mr-2 px-2.5 py-0.5 rounded bg-blue-200 text-blue-800 ml-2">PRO</span>
            </h1>
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 text-center px-4 py-3 rounded relative mx-5"
                    role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <!---- Form starting ---->
            <form class="p-5" method="POST" action="{{ route('send.mail') }}">
                @csrf
                <select name="advisor_id"
                    class="text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  bg-gray-700  border-gray-600  placeholder-gray-400  text-white">
                    <option selected>Choose an Advisor</option>
                    @foreach ($advisors as $advisor)
                        <option value="{{ $advisor->id }}">{{ $advisor->full_name }}</option>
                    @endforeach
                </select>
                <div class="relative my-6">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <x-far-pen-to-square class="w-5 h-5 text-gray-500" />
                    </div>
                    <input name="subject" type="text" id="input-group-1"
                        class="text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5   bg-gray-700  border-gray-600  placeholder-gray-400  text-white"
                        placeholder="Write a Short details">
                </div>
                <div class="mt-2">
                    <div class="mb-4 w-full  rounded-lg border border-gray-700  ">
                        <div class="flex justify-between items-center py-2 px-3 border-b  border-gray-900">
                            <div class="flex flex-wrap items-center divide-gray-700 sm:divide-x ">
                                <div class="flex items-center space-x-1 sm:pr-4">
                                    <button type="button"
                                        class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-700 ">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Attach file</span>
                                    </button>
                                    <button type="button"
                                        class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-700 ">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Embed map</span>
                                    </button>
                                    <button type="button"
                                        class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-700 ">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Upload image</span>
                                    </button>
                                </div>
                                <div class="flex flex-wrap items-center space-x-1 sm:pl-4">

                                </div>
                            </div>
                            <div id="tooltip-fullscreen" role="tooltip"
                                class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip "
                                style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 8px);"
                                data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom">
                                Show full screen
                                <div class="tooltip-arrow" data-popper-arrow=""
                                    style="position: absolute; left: 0px; transform: translate(0px, 0px);"></div>
                            </div>
                        </div>
                        <div class="py-2 px-4 rounded-b-lg ">
                            <label for="editor" class="sr-only">New message</label>
                            <textarea name="body" id="editor" rows="8"
                                class="block px-0 w-full text-sm text-white border-0  focus:ring-0 " placeholder="Write your problems..."
                                required=""></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200">
                    Send
                </button>
            </form>

        </div>
    </div>
@endsection
