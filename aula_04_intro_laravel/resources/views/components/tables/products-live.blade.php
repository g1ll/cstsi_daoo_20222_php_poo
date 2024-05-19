<div x-data="{
    idmodal:null,
    orderColumn:@entangle('orderColumn'), {{--@entangle recebe valor do livewire--}}
    orderAsc:@entangle('orderAsc'),
    start(){
        console.log({column:this.orderColumn,asc:this.orderAsc})
    },
    orderBy(column='id'){
        this.orderColumn = column
        this.orderAsc=!this.orderAsc
        console.log({order:this.orderColumn,asc:this.orderAsc})
        $wire.set('orderColumn',this.orderColumn)
        $wire.set('orderAsc',this.orderAsc)
        $wire.orderBy(this.orderColumn)
    }
}"  x-init="start()">
@vite('resources/css/table.css')
<table class="table table-odd table-hover">
    <thead>
        <tr>
            <th><a href="#" @click=" orderBy()">Id</a></th>
            <th><a href="#" @click=" orderBy('nome')">Nome</a></th>
            <th><a href="#" @click=" orderBy('qtd_estoque')">qtd_estoque</a></th>
            <th><a href="#" @click=" orderBy('preco')">Preco</a></th>
            <th>Importado</th>
            @auth
                <th colspan="2">Ações</th>
            @endauth
        </tr>
    </thead>
    <tbody>
        @foreach ($produtos as $produto)
            <tr>
                @if (Auth::user())
                    <td><a href="{{ route('produto.single-dash', $produto->id) }}">{{ $produto->id }}</a></td>
                    <td><a href="{{ route('produto.single-dash', $produto->id) }}">{{ $produto->nome }}</a></td>
                @else
                    <td><a href="/produtos/{{ $produto->id }}">{{ $produto->id }}</a></td>
                    <td><a href="/produtos/{{ $produto->id }}">{{ $produto->nome }}</a></td>
                @endif

                <td>{{ $produto->qtd_estoque }}</td>
                <td>{{ $produto->preco }}</td>
                <td align="center">
                    <input type="checkbox" disabled {{ $produto->importado ? 'checked' : '' }}>
                </td>
                @if (Auth::user())
                    <td class='actions'>
                        <x-primary-button class='px-2 py-1 mx-0 my-0'
                            @click=" idmodal = 'modal-upd-{{ $produto->id }}'">
                            Atualizar
                        </x-primary-button>
                    </td>
                    <td class='actions'>
                        <x-danger-button class='px-2 py-1 mx-0 my-0'
                            @click=" idmodal = 'modal-rm-{{ $produto->id }}'">
                            Remover
                        </x-danger-button>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>

@foreach ($produtos as $produto)
    <x-modals.produto-modal id="{{'modal-rm-'.$produto->id}}" trigger="idmodal">
        <x-slot name="title">{{$produto->nome.' ('.$produto->id.')'}}</x-slot>
        <x-modals.forms.produto-remove
            :produto="$produto"
            :fornecedor="Arr::first(
                Arr::where(
                    $fornecedores,
                    fn($fornecedor)=>$fornecedor['id']===$produto->fornecedor_id
                )
            )"
        />
    </x-forms.produto-modal>
@endforeach

@foreach ($produtos as $produto)
    <x-modals.produto-modal
        id="{{'modal-upd-'.$produto->id}}"
        trigger="idmodal"
        >
        <x-slot name="title">{{$produto->nome.' ('.$produto->id.')'}}</x-slot>
        <x-modals.forms.produto-update :produto="$produto" :fornecedores="$fornecedores"/>
    </x-forms.produto-modal>
@endforeach

<div>
