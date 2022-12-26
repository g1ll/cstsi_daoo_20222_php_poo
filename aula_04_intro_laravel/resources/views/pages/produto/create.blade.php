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
            </tr>
                <td>Fornecedor:</td>
                <td>
                    <select  required min='1' name="fornecedor_id">
                        <option value=0 selected placeholder>Escolha um Fornecedor:</option>
                        @foreach($fornecedores as $fornecedor)>
                            <option value="{{$fornecedor->id}}">{{$fornecedor->nome}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
        </table>
    </form>
    <div class='flex mt-4 justify-center gap-24 w-full'>
        <a href="/dashboard"><x-secondary-button class='w-30'>Cancelar</x-secondary-button></a>
        <x-primary-button class='w-30' type="submit" value="Criar" form='create'>Criar</x-primary-button>
    </div>
</x-dash-layout>
