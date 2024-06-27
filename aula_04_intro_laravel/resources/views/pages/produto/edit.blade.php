<x-dash-layout>
    <h1>Insert new Produto</h1>
    <div x-init="console.log('I\'m being initialized!')">
    <form id=edit action="{{route('update',$produto->id)}}" method="POST">
        @csrf
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" value="{{$produto->nome}}"/></td>
            </tr>
            <tr>
                <td>Descricao:</td>
                <td><textarea name="descricao" id="" cols="30" rows="10">{{$produto->descricao}}</textarea></td>
            </tr>
            <tr>
                <td>Quantidade em Estoque:</td>
                <td><input type="text" name="qtd_estoque" value="{{$produto->qtd_estoque}}"/></td>
            </tr>
            <tr>
                <td>Preço:</td>
                <td><input type="number" name="preco" value="{{$produto->preco}}"/></td>
            </tr>
            <tr>
                <td>Importado:</td>
                <td><input type="checkbox" name="importado" {{($produto->importado)?'checked':''}}/></td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td><input type="tel" x-mask="(99) 99999-9999" placeholder="(99) 99999-9999" pattern="\([0-9]{2}\) [0-9]{5}-[0-9]{4}"></td>
            </tr>
        </tr>
        <td>Fornecedor:</td>
        <td>
            <select  required min='1' name="fornecedor_id">
                @foreach($fornecedores as $fornecedor)>
                    {{-- @if($fornecedor->id == $produto->fornecedor_id)
                        <option selected value="{{$fornecedor->id}}">{{$fornecedor->nome}}</option>
                    @else
                        <option value="{{$fornecedor->id}}">{{$fornecedor->nome}}</option>
                    @endif --}}
                    <option
                        {{$fornecedor->id == $produto->fornecedor_id?'selected':''}}
                         value="{{$fornecedor->id}}">
                            {{$fornecedor->nome}}
                    </option>
                @endforeach
            </select>
        </td>
    </tr>
        </table>
    </form>
</div>
    {{-- <a href="/dashboard"><button>Cancelar</button></a> --}}
    <div class='flex justify-center w-full gap-24'>
        <a href="{{ route('dashboard') }}">
            <x-secondary-button>Cancelar</x-secondary-button>
        </a>
        <x-primary-button name='confirmar' form="edit">Atualizar</x-primary-button>
    </div>
</x-dash-layout>
