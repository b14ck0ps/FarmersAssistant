{{-- nav bar --}}
<div class="bg-gray-900 shadow shadow-gray-700">
    <div class="flex md justify-between lg:justify-around items-center">
        <div class="font-Bungee text-xl lg:text-3xl px-4"><a href="/">Farmer's Assistant</a></div>

        <nav class="flex gap-8 p-3 justify-center">
            @guest
                <div><a class="flex items-center gap-2 hover:text-orange-500" href="/signup">
                        @svg('iconsax-bro-signpost', 'w-5') Register</a></div>
                <div class="pr-4"><a class="flex items-center gap-2 hover:text-orange-500" href="/signin">
                        @svg('tni-signin-o', 'w-5') sign in</a></div>
            @endguest
            @auth
                <div><a class="flex items-center gap-2 hover:text-orange-500" href="{{ route('farmers.editProfile') }}">
                        @svg('uiw-setting-o', 'w-5') Setting</a></div>
                <div class="pr-4"><a class="flex items-center gap-2 hover:text-orange-500" href="/logout">
                        @svg('tni-signin-o', 'w-5') Log out</a></div>
            @endauth
        </nav>
    </div>
</div>
