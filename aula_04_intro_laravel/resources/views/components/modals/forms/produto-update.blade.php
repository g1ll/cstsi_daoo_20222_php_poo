<div class="flex flex-col justify-center w-fit shadow dark:bg-gray-700 h-fit m-0 p-3 bg-white self-center rounded-md">
    <div x-data="{
        produto: @js($produto),
        fornecedores:@js($fornecedores),
        update() {
            this.produto.preco = Number(this.produto.preco)
            this.produto.qtd_estoque = +this.produto.qtd_estoque //equivalente ao cast com Number
            this.produto.fornecedor_id = +this.produto.fornecedor_id
            if (this.produto.preco &&
                this.produto.qtd_estoque) {
                console.log({ produto: this.produto });
                $wire.update(this.produto)
            } else {
                alert('Erro ao atualizar produto!')
            }
        },
        start() {
            this.produto.importado = this.produto.importado == 1
        }
    }" x-init="start()">
        <form @submit.prevent="update()" id="produto-update-{{ $produto->id }}">
            <table>
                <tr>
                    <td>Nome:</td>
                    <td><input x-model="produto.nome" type="text" name="nome" /></td>
                </tr>
                <tr>
                    <td>Descricao:</td>
                    <td>
                        <textarea x-model="produto.descricao" name="descricao" id="" cols="30" rows="10"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Quantidade em Estoque:</td>
                    <td><input x-model="produto.qtd_estoque" step=1 type="number" name="qtd_estoque" /></td>
                </tr>
                <tr>
                    <td>Preço:</td>
                    <td><input x-model="produto.preco" step=0.01 id="preco-{{ $produto->id }}" type="number"
                            name="preco" /></td>
                </tr>
                <tr>
                    <td>Importado:</td>
                    <td><input x-model="produto.importado" type="checkbox" name="importado" /></td>
                </tr>
                <tr>
                    <td>Fornecedor:</td>
                    <td>
                        <select x-ref="select" required min='1' name="fornecedor" x-model="produto.fornecedor_id">
                            <template x-for="fornecedor in fornecedores">
                                <option
                                    x-bind:selected="fornecedor.id === produto.fornecedor_id"
                                    x-bind:value="fornecedor.id"
                                    x-text="fornecedor.nome"
                                    />
                            </template>
                        </select>
                    </td>
                </tr>
            </table>
        </form>
        <div class='flex justify-center gap-24 w-full'>
            <x-secondary-button @click="idmodal=null">
                Cancelar
            </x-secondary-button>
            <x-primary-button form="produto-update-{{ $produto->id }}" @click="idmodal=null">
                Atualizar
            </x-primary-button>
        </div>
    </div>
</div>
