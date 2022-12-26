<div x-cloak>
    <div x-show="open"
        x-bind:class="!open ? 'hidden' :
            'overflow-y-auto overflow-x-hidden flex justify-center fixed top-0 right-0 left-0 z-50 h-modal md:h-full bg-gray-900/25'"
        x-data="{
            fornecedores:@js($fornecedores),
            save(){
                if($refs.select.value==0)
                    return alert('Escolha um forncedor válido!')
                $wire.save() //chama o método do livewire
                open=false //fecha o modal
            }
        }">
        <div class="flex rounded-md p-5 flex-col justify-center w-fit min-w-min mt-10 bg-white"
            @click.away="open = false">
            <h1 class='text-center text-2xl font-bold pb-4 mb-4 border-b-2 border-gray-300'>Novo Produto</h1>
            <form @submit.prevent="save()" id="produto-create" >
                <table>
                    <tr>
                        <td>Nome:</td>
                        <td><input wire:model.defer='produto.nome' type="text" name="nome" /></td>
                    </tr>
                    <tr>
                        <td>Descricao:</td>
                        <td>
                            <textarea wire:model.defer='produto.descricao' name="descricao" id="" cols="30" rows="10"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Quantidade em Estoque:</td>
                        <td><input type="number" min='1' step=1 wire:model.defer='produto.qtdEstoque' name="qtd_estoque" /></td>
                    </tr>
                    <tr>
                        <td>Preço:</td>
                        <td><input type="number" min='1' step=0.01 wire:model.defer='produto.preco' name="preco" /></td>
                    </tr>
                    <tr>
                        <td>Importado:</td>
                        <td><input wire:model.defer='produto.importado' type="checkbox" name="importado" /></td>
                    </tr>
                    <tr>
                        <td>Fornecedor:</td>
                        <td>
                            <select x-ref="select" required min='1' name="fornecedor" wire:model.defer="produto.fornecedor">
                                <option value=0 selected placeholder>Escolha um Fornecedor:</option>
                                <template x-for="fornecedor in fornecedores">
                                    <option x-bind:value="fornecedor.id" x-text="fornecedor.nome" />
                                </template>
                            </select>
                        </td>
                    </tr>
                </table>
            </form>
            <div class='flex mt-4 justify-center gap-24 w-full'>
                <x-secondary-button @click="open=false" class='w-30'>Cancelar</x-secondary-button>
                <x-primary-button class='w-30' form="produto-create">Criar</x-primary-button>
            </div>
        </div>
    </div>
</div>
