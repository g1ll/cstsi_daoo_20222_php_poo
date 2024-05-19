<nav class="flex pt-2 bg-blue-800 max-h-16">
    <div class="flex justify-start w-3/4 ">
        <a href="{{route('landing')}}" >
            <x-application-logo class="w-12 h-12" />
        </a>
    </div>
    <div class="flex justify-end w-1/4 mr-5 text-center">
        @auth
            <a href="{{ url('/dashboard') }}" class="mt-4 text-sm text-white underline dark:text-gray-500">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="mt-4 text-sm text-white underline dark:text-gray-500">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="mt-4 ml-4 text-sm text-white underline dark:text-gray-500">Register</a>
            @endif
        @endauth
    </div>
    </div>
</nav>
