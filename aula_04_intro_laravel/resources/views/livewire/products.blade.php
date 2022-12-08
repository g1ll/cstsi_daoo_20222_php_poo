<div x-data="{ open: false }">
    <div class="py-3 pr-5 flex justify-end">
        <x-primary-button @click="open = true">Novo Produto</x-primary-button>
    </div>
    <x-modals.forms.produto-create />
    @if (isset($produtos) && $produtos->count() > 0)
        <x-tables.products-live :produtos="$produtos" class='table-odd' type='hover' />
    @else
        <p>Produtos não encontrados! </p>
    @endif
</div>
