<div>
    <div class="row justify-content-center">
        <p>Ingrediente: {{ $ingrediente->nome }}</p>
        <p>Descrição: {{ $ingrediente->descricao }}</p>
        <p>Nutrientes:</p>
        <button @click="showModal = true; $dispatch('open-modal', { name: 'adicionar' })" id="btnAddIng"
                        class="btn-adicionar">
                        <i class='bx bx-plus'></i> Adicionar
                    </button>
        <div class="row justify-content-center">
            @foreach ($ingrediente->nutrientes as $nutriente)
                <div class="card" style="width: 18rem">
                    <div class="card-body">
                        <p>Nutriente: {{ $nutriente->nome }}</p>
                        <p>Unidade: {{ $nutriente->unidade }}</p>
                        <form>
                            <label for="">Valor :</label>
                            @if ($editarforms[$nutriente->pivot->id])
                                <td>
                                    <form action="">
                                        <input type="text" wire:model='valoreseditar.{{ $nutriente->pivot->id }}'>
                                    </form>
                                    <button type="button" wire:click="atualizarValor({{ $nutriente->pivot->id }})"
                                        class="btn btn-success">Salvar</button>
                                </td>
                            @else
                                <p>{{ $nutriente->pivot->valor }}</p>
                                <button type="button" wire:click="editarValor({{ $nutriente->pivot->id }})"
                                    class="btn btn-primary">Editar</button> </td>
                            @endif
                            <button type="button" wire:click="deletarNutrienter({{ $nutriente->pivot->id }})"
                                class="btn btn-danger">Remover
                            </button>
                        </form>

                    </div>
                </div>
            @endforeach
        </div>

    </div>

    <x-my-modal name="adicionar">
        <livewire:crud-ingrediente-nutriente-component :ingrediente="$ingrediente" :key="$ingrediente['id']" />
    </x-my-modal>

</div>
