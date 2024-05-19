<x-main-layout>
<div class="mt-8 text-center">
    @if ($produto)
        <h1 class='my-12 text-4xl font-bold'>{{ $produto->nome }}</h1>
        <p>{{ $produto->descricao }}</p>
        <table>
            </thead>
            <tbody>
                <tr>
                    <th>Preço</th>
                    <td>{{ number_format($produto->preco, 2) }}</td>
                </tr>
                <tr>
                    <th>Quantidade</th>
                    <td>{{ $produto->qtd_estoque }}</td>
                </tr>
                <tr>
                    <th>Importado</th>
                    {{-- <td>{{ $produto->importado ? 'Sim' : 'Não' }}</td> --}}
                    <td>
                        @if ($produto->importado)
                            <input type="checkbox" disabled checked>
                        @else
                            <input type="checkbox" disabled>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
        @auth
            <a href="{{ route('edit', $produto->id) }}"><button>editar</button></a>
            <a href="{{ route('delete', $produto->id) }}"><button>deletar</button></a>
        @endauth
    @else
        <p>Produtos não encontrados! </p>
    @endif
    <div>
        <a href="/">&#9664;Voltar</a>
    </div>
</div>
</x-main-layout>
