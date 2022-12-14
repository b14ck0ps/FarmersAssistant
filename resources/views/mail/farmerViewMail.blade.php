@extends('ReactUI.Layout.app')
@section('content')
    @csrf
    <div id="mail"></div>
    {{-- <div class="m-5 lg:m-auto xl:w-[1200px] p-5 lg:px-24 lg:py-10 border border-gray-700 rounded-3xl lg:mt-20">

        <article class="md:gap-8 md:grid md:grid-cols-3">
            <div>
                <div class="flex items-center mb-6 space-x-4">
                    <img class="w-10 h-10 rounded-full" src="{{ URL::asset('uploads/avater') }}/{{ $advisor->photo }}"
                        alt="">
                    <div class="space-y-1 font-medium text-white">
                        <p>{{ $advisor->firstName }} {{ $advisor->lastName }}</p>
                        <div class="flex items-center text-sm  text-black">
                            {{ $advisor->email }}
                        </div>
                    </div>
                </div>
                <ul class="space-y-4 text-sm  text-black">
                    <li class="flex items-center"><svg aria-hidden="true" class="w-4 h-4 mr-1.5" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z"
                                clip-rule="evenodd"></path>
                        </svg>{{ $advisor->address }}</li>
                    <li class="flex items-center"><svg aria-hidden="true" class="w-4 h-4 mr-1.5" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd"></path>
                        </svg> {{ 'Education' }}</li>
                </ul>
            </div>
            <div class="col-span-2 mt-6 md:mt-0">
                <div class="flex items-start mb-5">
                    <div class="pr-4">
                        <footer>
                            <p class="mb-2 text-sm  text-black">Sent on: <time
                                    datetime="2022-01-20 19:00">{{ $mail->created_at }}</time></p>
                        </footer>
                        <h4 class="text-xl font-bold text-white overflow-hidden">{{ $mail->subject }}
                        </h4>
                    </div>
                </div>
                <p class="mb-2 font-light  text-black overflow-hidden"> {{ $mail->body }}
                </p>
                <div class="border-t border-gray-700 p-5  mt-24 overflow-hidden">
                    {{ $mail->reply ?? 'Your advisor\'s reply will be visible here...' }}
                </div>
            </div>
            <aside class="flex items-center mt-3 space-x-5">
                <a href="{{ url()->previous() }}"
                    class="inline-flex items-center text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                    Back
                </a>
            </aside>
            <form action="{{ route('delete.mail', $mail->id) }}" method="POST">
                <aside class="flex items-center mt-3 space-x-5">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center text-sm font-medium text-red-600 hover:underline dark:text-red-500">
                        Delete
                    </button>
                </aside>
            </form>
        </article>

    </div> --}}
@endsection
