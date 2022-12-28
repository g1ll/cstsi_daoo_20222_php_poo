<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class='text-4xl'>Produtos</h2>
                    @if (isset($produtos) && $produtos->count() > 0)
                        <div style="display:flex; flex-direction: row; justify-content:flex-end">
                            <a href="/produto">
                                <x-primary-button class='mb-2'>Novo Produto</x-primary-button>
                            </a>
                        </div>
                        {{$produtos->links()}}
                        <x-tables.produtos :produtos="collect($produtos->items())" class='table-odd' type='hover' />
                        {{$produtos->links()}}
                    @else
                        <p>Produtos não encontrados! </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class='text-4xl'>Users</h2>
                    @if (isset($users) && $users->count() > 0)
                        <ul>
                            @foreach ($users as $user)
                                <li>{{ $user->name }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>Produtos não encontrados! </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
