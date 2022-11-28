<x-main-layout>
    <h2>Produtos</h2>
    @if ($produtos->count() > 0)
        <x-tables.produtos :produtos="$produtos" class="table-odd" type="hover" />
        <div style="display:flex; flex-direction: row; justify-content:flex-end">
            <a href="/produto"><button>Criar Novo Produto</button></a>
        </div>
    @else
        <p>Produtos não encontrados! </p>
    @endif
</x-main-layout>
