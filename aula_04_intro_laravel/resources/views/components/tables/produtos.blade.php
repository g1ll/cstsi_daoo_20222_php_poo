<table {{$attributes->merge(['class'=>'table table-'.$type])}}>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>qtd_estoque</th>
            <th>preco</th>
            <th>Importado</th>
            <th>Acoes</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produtos as $produto)
            <tr>
                <td><a href="/produtos/{{ $produto->id }}">{{ $produto->id }}</a></td>
                <td>{{ $produto->nome }}</td>
                <td>{{ $produto->qtd_estoque }}</td>
                <td>{{ $produto->preco }}</td>
                {{-- <td>{{($produto->importado)?'Sim':'Não'}}</td> --}}
                <td align="center">
                    <input type="checkbox" disabled {{ $produto->importado ? 'checked' : '' }}>
                </td>
                <td><a href="{{ route('edit', $produto->id) }}">editar</a> |
                    <a href="{{ route('delete', $produto->id) }}">deletar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
