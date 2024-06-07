<x-dash-layout>
    @if ($produto)
        <h1 class="text-2xl font-bold text-center text-blue-700">{{ $produto->nome }}</h1>
        <p>{{ $produto->descricao }}</p>
        <ul>
            <li>Quantidade: {{ $produto->qtd_estoque }}</li>
            <li>Preço: {{ $produto->preco }}</li>
            <li>Importado: {{ $produto->importado ? 'Sim' : 'Não' }}</li>
            <li>Fornecedor:{{ $produto->fornecedor->nome }}</li>
        </ul>
        <form action="{{ route('remove', $produto->id) }}" method="post">
            @csrf
            <h4 style="color:red;font-weight:bold">Confirmar a exclusão deste item?</h4>
            <tr align="center">
                <td>
                    <a href="{{route('dashboard')}}">
                        <x-secondary-button >
                            Cancelar
                        </x-secondary-button>
                    </a>
                </td>
                <td>
                    <x-danger-button
                        class='px-2 py-1 mx-0 my-0'
                        @click="idmodal=null;"
                        type="submit"
                        name='confirmar'
                        >
                        Deletar
                    </x-danger-button>
                </td>
            </tr>
        </form>
    @else
        <p>Produtos não encontrados! </p>
        <a href="/dashboard">&#9664;Voltar</a>
    @endif
</x-dash-layout>
