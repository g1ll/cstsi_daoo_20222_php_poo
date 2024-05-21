<x-guest-layout>
    <x-navbar/>
    <x-header />
    <main class='flex justify-center w-full p-3 sm:p-10 '>
        {{$slot}}
    </main>
</x-guest-layout>
