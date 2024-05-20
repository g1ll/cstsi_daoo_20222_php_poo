<div class="w-11/12 aspect-[3/4] mx-auto bg-green-400 border-2 border-blue-700 rounded-lg shadow-md sm:w-full md:h-80 md:overflow-hidden shadow-green-700"">
    <a href="{{ route('single', $produto->id) }}">
        <div class="w-full py-3">
            <h3 class="mb-3 font-bold text-center">{{ $produto->nome }}</h3>
            <img class="w-full" src="{{ asset('storage/defaults/cards-thumbnail.jpg') }}" />
            <h4 class="font-bold text-center text-blue-800 shadow-text-gray-100">
                {{ 'R$ '.number_format($produto->preco, 2) }}</h4>
            <p class="h-full text-center text-ellipsis text-wrap">{{ $produto->descricao }}</p>
        </div>
    </a>
</div>
