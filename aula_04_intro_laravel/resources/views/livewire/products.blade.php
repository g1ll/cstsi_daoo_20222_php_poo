<div>
    @if (isset($produtos) && $produtos->count() > 0)
        <x-tables.products-live :produtos="$produtos" class='table-odd' type='hover' />
        @auth
            <div style="display:flex; flex-direction: row; justify-content:flex-end">
                <a href="/produto"><button>Criar Novo Produto</button></a>
            </div>
        @endauth
    @else
        <p>Produtos não encontrados! </p>
    @endif
</div>
