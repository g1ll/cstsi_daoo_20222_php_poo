<x-guest-layout>
    <nav class="bg-blue-800 pt-2 max-h-16 flex">
        <div class=" w-3/4 flex justify-start">
            <x-application-logo class="w-12 h-12" />
        </div>
        <div class="w-1/4 flex justify-end text-center mr-5">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-white dark:text-gray-500 underline mt-4">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-white dark:text-gray-500 underline mt-4">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="ml-4 mt-4 text-sm text-white dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
        </div>
    </nav>
    <header class="h-56 bg-green-400">
        <div class="flex flex-col items-center justify-center">
            <h1 class="w-1/2 mb-16 text-6xl mt-12 font-bold text-center text-blue-800 shadow-white">
                Black Friday BuyTech
            </h1>
            <h4 class="w-1/2 rounded-lg bg-blue-400 text-white text-center">Tudo pela METADE !!! <span class='text-[10px]'>...do triplo</span></h4>
        </div>
    </header>
    <main class='container m-10'>
        {{$slot}}
    </main>
</x-guest-layout>
