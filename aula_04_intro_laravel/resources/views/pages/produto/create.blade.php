<x-dash-layout>
    <h1>Insert new Produto</h1>
    <form id=create action="/produto" method="POST">
        @csrf
        {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"/> --}}
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" /></td>
            </tr>
            <tr>
                <td>Descricao:</td>
                <td>
                    <textarea name="descricao" id="" cols="30" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <td>Quantidade em Estoque:</td>
                <td><input type="text" name="qtd_estoque" /></td>
            </tr>
            <tr>
                <td>Preço:</td>
                <td><input type="number" name="preco" /></td>
            </tr>
            <tr>
                <td>Importado:</td>
                <td><input type="checkbox" name="importado" /></td>
            </tr>
        </table>
    </form>
    <input type="submit" value="Criar" form='create'/>
    <a href="/dashboard"><button>Cancelar</button></a>
</x-dash-layout>
