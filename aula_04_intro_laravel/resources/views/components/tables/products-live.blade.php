<div x-data="{
    open: false,
    idmodal:null,
}">
<table {{ $attributes->merge(['class' => 'table table-' . $type]) }}>
    @vite('resources/css/table.css')
    <thead>
        <tr>
            <th><a href="#" wire:click='orderBy'>Id</a></th>
            <th><a href="#" wire:click='orderByName'>Nome</a></th>
            <th>qtd_estoque</th>
            <th><a href="#" wire:click='orderByPrice'>Preco</a></th>
            <th>Importado</th>
            @if (Auth::user())
                <th colspan="2">Acoes</th>
            @endif
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
                {{-- <td>{{($produto->importado)?'Sim':'Não'}}</td> --}}
                <td align="center">
                    <input type="checkbox" disabled {{ $produto->importado ? 'checked' : '' }}>
                </td>
                @if (Auth::user())
                    <td class='actions'>
                        {{-- <a href="{{ route('edit', $produto->id) }}">editar</a> --}}
                        <x-primary-button class='px-2 py-1 mx-0 my-0'
                        @click=" idmodal = 'modal-upd-{{ $produto->id }}'">
                            Atualizar
                        </x-primary-button>
                    </td>
                    <td class='actions'>
                        {{-- <a href="{{ route('delete', $produto->id) }}">deletar</a> --}}
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
    <x-modals.produto-modal
        id="{{'modal-rm-'.$produto->id}}"
        trigger="idmodal"
        >
        <x-slot name="title">{{$produto->nome.' ('.$produto->id.')'}}</x-slot>
        <x-modals.forms.produto-remove :produto="$produto"/>
    </x-forms.produto-modal>
@endforeach
@foreach ($produtos as $produto)
    <x-modals.produto-modal
        id="{{'modal-upd-'.$produto->id}}"
        trigger="idmodal"
        >
        <x-slot name="title">{{$produto->nome.' ('.$produto->id.')'}}</x-slot>
        <x-modals.forms.produto-update :produto="$produto"/>
    </x-forms.produto-modal>
@endforeach
<div>
