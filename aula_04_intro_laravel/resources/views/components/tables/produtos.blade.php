<table {{ $attributes->merge(['class' => 'table table-' . $type]) }}>
    @vite('resources/css/table.css')
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>qtd_estoque</th>
            <th>preco</th>
            <th>Importado</th>
            @if(Auth::user() && Route::is('dashboard'))
                <th colspan="2">Acoes</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($produtos as $produto)
            <tr>
                @if(Auth::user() && Route::is('dashboard'))
                     <td><a href="{{route('produto.single-dash',$produto->id) }}">{{ $produto->id }}</a></td>
                     <td><a href="{{route('produto.single-dash',$produto->id) }}">{{ $produto->nome }}</a></td>
                @else
                    <td><a href="/produtos/{{ $produto->id }}">{{ $produto->id }}</a></td>
                    <td><a href="/produtos/{{ $produto->id }}">{{ $produto->nome }}</a></td>
                @endif

                <td>{{ $produto->qtd_estoque }}</td>
                <td>{{ $produto->preco }}</td>
                <td align="center">
                    <input type="checkbox" disabled {{ $produto->importado ? 'checked' : '' }}>
                </td>
                @if(Auth::user() && Route::is('dashboard'))
                    <td class='actions'>
                        <a href="{{ route('edit', $produto->id) }}">
                            <x-primary-button class='px-2 py-1 mx-0 my-0'>
                                Atualizar
                            </x-primary-button>
                        </a>
                    </td>
                    <td class='actions'>
                        <a href="{{ route('delete', $produto->id) }}">
                            <x-danger-button class='px-2 py-1 mx-0 my-0'>
                                Remover
                            </x-danger-button>
                        </a>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
