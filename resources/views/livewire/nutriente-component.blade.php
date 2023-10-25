<div style="height: 100%;display: flex;flex-direction: column;justify-content: space-between;">
    <div x-data="{ show: false }" x-show= "show" x-on:open-modal.window="show = true" x-on:close-modal.window="show = false"
        x-on:keydown.escape.window="show = false" class="mymodal" style="display: none">
        <div class="modal-dialog modal-fullscreen-md-down modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click='close'
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3 row">
                            <label for="nutriente" class="col-mb-2 col-form-label">Nutriente:</label>
                            <div class="col-sm-10">
                                <input type="text" maxlength="20" class="form-control" wire:model.live="nome">
                            </div>
                            @error('nome')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <label for="unidade" class="col-mb-2 col-form-label">Unidade:</label>
                            <div class="col-sm-10">
                                <input type="unidade" maxlength="6" class="form-control" wire:model.live="unidade">
                            </div>
                            @error('unidade')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <label for="unidade" class="col-mb-2 col-form-label">Tag:</label>
                            <div class="col-sm-10">
                                <input type="tag" maxlength="10" class="form-control" wire:model.live="tag">
                            </div>
                            @error('tag')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" wire:click='save'>
                                Salvar
                            </button>
                            <button type="button" class="btn btn-secondary" wire:click='close'>Fechar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="title-container">
            <div class="page-title">
                <span class="title-painel">Painel de Controle</span>
                <span class="subtitle-painel">Nutrientes</span>
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

                <div class="dropdown btn-adicionar">
                    <button class="dropdown-reset"><i class='bx bx-export'></i> Exportar</button>
                    <div class="dropdown-content">
                        <a href="#" wire:click="exportToPDF">PDF</a>
                        <a href="#" wire:click="exportToExcel">Excel</a>
                    </div>
                </div>


            </div>

            <div class="right-tools">
                <input type="text" placeholder="Pesquisar" class="btn-pesquisar" wire:model.live='search'>
            </div>
        </div>

        <div class="container-nutrientes">
            @foreach ($nutrientes as $key => $nutriente)
                <a data-bs-toggle="modal" data-bs-target="#nutriente_{{ $nutriente['id'] }}" class="modal-toggle">
                    <div title="{{ $nutriente['nome'] }}" class="nutrientes-card card-animation">
                        <div class="card-body">
                            <div class="card-header">
                                <p class='nome-text'>{{ $nutriente['nome'] }}</p>
                                <div class='tag-label'>
                                    <p class='text'>{{ $nutriente['tag'] }}</p>
                                </div>
                            </div>
                            <p class='unidade-text text'>{{ $nutriente['unidade'] }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <div>
        @foreach ($nutrientes as $nutriente)
            <livewire:crud-nutriente-component :id="$nutriente['id']" :key="$nutriente['id']" />
        @endforeach
    </div>
    {{ $nutrientes->links() }}
</div>
