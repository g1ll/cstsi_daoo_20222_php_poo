<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
</head>

<body>
    @if ($produto)
        <h1>{{ $produto->nome }}</h1>
        <p>{{ $produto->descricao }}</p>
        <ul>
            <li>Quantidade: {{ $produto->qtd_estoque }}</li>
            <li>Preço: {{ $produto->preco }}</li>
            <li>Importado: {{ $produto->importado ? 'Sim' : 'Não' }}</li>
        </ul>
        <a href="{{route('edit', $produto->id)}}"
            ><button>editar</button></a>
        <a href="{{route('delete', $produto->id)}}"
            ><button>deletar</button></a>
    @else
        <p>Produtos não encontrados! </p>
    @endif
    <div>
    <a href="/produtos">&#9664;Voltar</a>
    </div>
</body>

</html>
