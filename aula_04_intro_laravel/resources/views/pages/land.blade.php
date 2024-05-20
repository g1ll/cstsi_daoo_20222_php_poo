<x-main-layout>
    <div class="w-full 2xl:max-w-screen-xl">
        <div class="grid mx-auto sm:w-fit h-fit min-h-80 gap-x-8 2xl:grid-cols-5 2xl:gap-8 md:grid-cols-3 lg:grid-cols-4 sm:grid-cols-2 gap-y-5">
            @if (isset($produtos) && $produtos->count() > 0)
                @foreach ($produtos as $produto)
                    <x-cards.produtos-card :$produto />
                @endforeach
            @endif
        </div>
    </div>
</x-main-layout>
