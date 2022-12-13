<div x-data="{ open: false }" class='flex justify-center'>
    <x-modals.forms.produto-create />
    <div class="w-full lg:w-5/6">
        <div class="py-3 pr-5 flex justify-start">
            <x-primary-button @click="open = true">Novo Produto</x-primary-button>
        </div>
        @if (isset($produtos) && $produtos->count() > 0)
            <x-tables.products-live :produtos="$produtos" class='table-odd' type='hover' />
        @else
            <p>Produtos não encontrados! </p>
        @endif
    </div>
</div>
