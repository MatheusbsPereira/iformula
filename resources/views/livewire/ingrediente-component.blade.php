<div style="height: 100%;display: flex;flex-direction: column;justify-content: space-between;">
    <div class="container">
        <div class="title-container">
            <div class="page-title">
                <span class="title-painel">Painel de Controle</span>
                <span class="subtitle-painel">ingredientes</span>
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
                <button class="btn-adicionar" x-on:click="$dispatch('open-modal')">
                    <i class='bx bx-plus'></i> Adicionar
                </button>
                <button class="btn-adicionar"> <i class='bx bx-export'></i> Exportar</button>
            </div>

            <div class="right-tools">
                <input type="text" placeholder="Pesquisar" class="btn-pesquisar" wire:model.live='search'>
            </div>
        </div>

        <div class="container-ingredientes">
            @foreach ($ingredientes as $key => $ingrediente)
                <a class="card-toggle" href="{{ route('ingrediente.show', ['nome' => $ingrediente->nome]) }}">
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
    <div>
             </div>
    {{ $ingredientes->links() }}
</div>

