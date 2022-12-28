<x-dash-layout>
    <h2 class='text-4xl text-center py-2'>Produtos</h2>
    <livewire:products :listProdutos="collect($produtos->items())"/>
</x-dash-layout>
