{{-- nav bar --}}
<div class="shadow shadow-gray-300">
    <div class="flex md justify-between lg:justify-around items-center">
        <div class="font-Bungee text-xl lg:text-3xl px-4"><a href="/">Farmer's Assistant</a></div>

        <nav class="flex gap-8 p-3 justify-center">
            @guest
                @if (url()->current() !== url('/signup'))
                    <div><a class="flex items-center gap-2 hover:text-orange-500" href="/signup">
                            @svg('iconsax-bro-signpost', 'w-5') Register</a></div>
                @endif
                @if (url()->current() !== url('/signin'))
                    <div class="pr-4"><a class="flex items-center gap-2 hover:text-orange-500" href="/signin">
                            @svg('tni-signin-o', 'w-5') sign in</a></div>
                @endif
            @endguest
            {{-- /////////// --}}
            @guest

                <div><a class="flex items-center gap-2 hover:text-orange-500" href="/signin_signup">
                        @svg('iconsax-bro-signpost', 'w-5') Admin</a></div>

            @endguest

            {{-- ////////// --}}
            <div class="flex items-center gap-2">
                <a href="/cart" class="flex items-center gap-2 hover:text-orange-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                    Cart
                </a>
                @if (session()->has('total_quantity') && session()->get('total_quantity') > 0)
                    <span class="text-white bg-red-500 rounded-full px-2 py-1 text-xs">
                        {{ session()->get('total_quantity') }}
                    </span>
                @endif
            </div>
            @auth
                @if (route('farmers.dashboard') == url()->current())
                    <div><a class="flex items-center gap-2 hover:text-orange-500" href="{{ route('farmers.editProfile') }}">
                            @svg('uiw-setting-o', 'w-5') Setting</a></div>
                @endif
                @if (route('farmers.editProfile') == url()->current() || route('farmers.dashboard') != url()->current())
                    <div><a class="flex items-center gap-2 hover:text-orange-500" href="{{ route('farmers.dashboard') }}">
                            @svg('iconoir-profile-circled', 'w-5') Profile</a></div>
                @endif
                @if (route('mail') != url()->current())
                    <div><a class="flex items-center gap-2 hover:text-orange-500" href="{{ route('mail') }}">
                            @svg('css-mail', 'w-5') Mail</a></div>
                @endif

                <div class="pr-4"><a class="flex items-center gap-2 hover:text-orange-500" href="/logout">
                        @svg('tni-signin-o', 'w-5') Log out</a></div>
            @endauth
        </nav>
    </div>
</div>
