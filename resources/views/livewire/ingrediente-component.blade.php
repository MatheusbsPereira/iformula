<div style="height: 100%;">
    <div style="display: flex;flex-direction: column;justify-content: space-between;">
        <x-my-modal name="cadastrar">
            <livewire:ingrediente_modal />
        </x-my-modal>
        <div class="container">
            <div class="title-container">
                <div class="page-title">
                    <span class="title-painel">Painel de Controle</span>
                    <span class="subtitle-painel">Ingredientes</span>
                </div>
                <div>
                    <select id="per_page" wire:model="perPage" wire:change="setPerPage($event.target.value)">
                        <option value="0" style="display:none;"></option>
                        <option value="20">20 itens</option>
                        <option value="30">30 itens</option>
                        <option value="50">50 itens</option>
                        <option value="9999">Todos</option>
                    </select>
                </div>
            </div>

            <div class="header-tools">
                <div class="left-tools">
                    <button id="btnAddIng" class="btn-adicionar" x-data x-on:click="$dispatch('open-modal',{name : 'cadastrar'})">
                        <i class='bx bx-plus'></i> Adicionar
                    </button>
                    <div class="dropdown btn-adicionar">
                        <button class="dropdown-reset"><i class='bx bx-export'></i> Exportar</button>
                        <div class="dropdown-content">
                            <a href="#" wire:click="exportToPDF">PDF</a>
                            <a href="{{ route('ingrediente.exportsxlsx') }}"  >Excel</a>
                        </div>
                    </div>
                </div>

                <div class="right-tools">
                    <input type="text" placeholder="Pesquisar" class="btn-pesquisar" wire:model.live='search'>
                </div>
            </div>

            <div class="container-ingredientes">
                @foreach ($ingredientes as $key => $ingrediente)
                    <a class="card-toggle"x-data x-on:click="$dispatch('open-modal',{name : '{{ $ingrediente['nome'] }}'})"
                    class="modal-toggle">
                        <div title="{{ $ingrediente['nome'] }}" class="ingredientes-card card-animation">
                            <div class="card-body">
                                <div class="card-header">
                                    <p class='nome-text'>{{ $ingrediente['nome'] }}</p>
                                    <div class='tag-label'>
                                        <p class='text'>{{ $ingrediente['tag'] }}</p>
                                    </div>
                                </div>
                                <p class='unidade-text text'>{{ $ingrediente['preco'] }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div style="height: 100%">
            @foreach ($ingredientes as $ingrediente)
                <x-my-modal name="{{ $ingrediente->nome }}">
                    <livewire:crud-ingrediente-component :id="$ingrediente['id']" :key="$ingrediente['id']" />
                </x-my-modal>
            @endforeach
        </div>
        {{ $ingredientes->links() }}
    </div>
</div>
