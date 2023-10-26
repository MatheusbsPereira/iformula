<div style="height: 100%">
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="modal-dialog modal-fullscreen-md-down modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data jn-bs-dismiss="modal" wire:click='close'
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($this->etapa == 1)
                    <!-- Step Navigation -->
                    <div class="d-flex align-items-start mb-3 sm:mb-5 progress-form__tabs" role="tablist">
                        <button id="progress-form__tab-1" class="flex-1 px-0 pt-2 progress-form__tabs-item"
                            type="button" role="tab" aria-controls="progress-form__panel-1" aria-selected="true">
                            <span class="d-block step" aria-hidden="true">Etapa 1 <span class="sm:d-none">de
                                    3</span></span>
                            Informações
                        </button>
                        <button id="progress-form__tab-2" class="flex-1 px-0 pt-2 progress-form__tabs-item"
                            type="button" role="tab" aria-controls="progress-form__panel-2" aria-selected="false"
                            tabindex="-1" aria-disabled="true">
                            <span class="d-block step" aria-hidden="true">Etapa 2 <span class="sm:d-none">de
                                    3</span></span>
                            Tabela nutricional
                        </button>
                        <button id="progress-form__tab-3" class="flex-1 px-0 pt-2 progress-form__tabs-item"
                            type="button" role="tab" aria-controls="progress-form__panel-3" aria-selected="false"
                            tabindex="-1" aria-disabled="true">
                            <span class="d-block step" aria-hidden="true">Etapa 3 <span class="sm:d-none">de
                                    3</span></span>
                            Finalizar
                        </button>
                    </div>
                    <!-- / End Step Navigation -->

                    <div class="modal-title">
                        <h1>Adicionar Ingrediente</h1>
                    </div>
                    <div class="form-container">
                        <form>
                            <div class="row">
                                <div class="row-sm-12">
                                    <label for="nutriente" class="col-mb-2 col-form-label">Nome</label>
                                    <div class="col-sm-12">
                                        <input type="text" maxlength="20" class="form-control"
                                            wire:model.live="nome">
                                    </div>
                                    @error('nome')
                                        <div>{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-sm-6">
                                    <label for="unidade" class="col-mb-2 col-form-label">Preço</label>
                                    <div class="col-sm-12">
                                        <input type="tag" maxlength="10" class="form-control" wire:model.live="preco">
                                    </div>
                                    @error('preco')
                                        <div>{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label for="unidade" class="col-mb-2 col-form-label">Tag</label>
                                    <div class="col-sm-12">
                                        <input type="unidade" maxlength="6" class="form-control" wire:model.live="tag">
                                    </div>
                                    @error('tag')
                                        <div>{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row-sm-12">
                                <label for="nutriente" class="col-mb-2 col-form-label">Descrição</label>
                                <div class="col-sm-12">
                                    <input type="text" maxlength="70" class="form-control"
                                        wire:model.live="descricao">
                                </div>
                                @error('descricao')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary btnProximo" wire:click='primeiraEtapa'>
                                    Próximo
                                </button>
                            </div>
                        </form>
                    </div>
                @endif
                @if ($this->etapa == 2)
                    <div class="d-flex align-items-start mb-3 sm:mb-5 progress-form__tabs" role="tablist">
                        <button id="progress-form__tab-1" class="flex-1 px-0 pt-2 progress-form__tabs-item"
                            type="button" role="tab" aria-controls="progress-form__panel-1" aria-selected="false"
                            data-complete="true">
                            <span class="d-block step" aria-hidden="true">Etapa 1 <span class="sm:d-none">de
                                    3</span></span>
                            Informações
                        </button>
                        <button id="progress-form__tab-2" class="flex-1 px-0 pt-2 progress-form__tabs-item"
                            type="button" role="tab" aria-controls="progress-form__panel-2" aria-selected="true"
                            tabindex="-1" aria-disabled="false">
                            <span class="d-block step" aria-hidden="true">Etapa 2 <span class="sm:d-none">de
                                    3</span></span>
                            Tabela nutricional
                        </button>
                        <button id="progress-form__tab-3" class="flex-1 px-0 pt-2 progress-form__tabs-item"
                            type="button" role="tab" aria-controls="progress-form__panel-3"
                            aria-selected="false" tabindex="-1" aria-disabled="true">
                            <span class="d-block step" aria-hidden="true">Etapa 3 <span class="sm:d-none">de
                                    3</span></span>
                            Finalizar
                        </button>
                    </div>
                    <div class="modal-title">
                        <h1>Adicionar Ingrediente</h1>
                    </div>
                    <div class="form-container">
                        <form>
                            <div class="row">
                                <div class="col-sm-8">
                                    <label for="nutriente" class="col-mb-2 col-form-label">Nome</label>
                                    <div class="col-sm-12">
                                        <input type="text" maxlength="20" class="form-control"
                                            wire:model.live="nome">
                                    </div>
                                    @error('nome')
                                        <div>{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="unidade" class="col-mb-2 col-form-label">Tag</label>
                                    <div class="col-sm-12">
                                        <input type="unidade" maxlength="6" class="form-control"
                                            wire:model.live="tag">
                                    </div>
                                    @error('tag')
                                        <div>{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="unidade" class="col-mb-2 col-form-label">Preço</label>
                                <div class="col-sm-12">
                                    <input type="tag" maxlength="10" class="form-control"
                                        wire:model.live="preco">
                                </div>
                                @error('preco')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btnBack" wire:click='anterior'>
                                    Voltar
                                </button>
                                <button type="button" class="btn btn-primary" wire:click='segundaEtapa'>
                                    Próximo
                                </button>
                            </div>
                        </form>
                    </div>
                @endif
                @if ($this->etapa == 3)
                <div class="d-flex align-items-start mb-3 sm:mb-5 progress-form__tabs" role="tablist">
                    <button id="progress-form__tab-1" class="flex-1 px-0 pt-2 progress-form__tabs-item"
                        type="button" role="tab" aria-controls="progress-form__panel-1" aria-selected="false"
                        data-complete="true">
                        <span class="d-block step" aria-hidden="true">Etapa 1 <span class="sm:d-none">de
                                3</span></span>
                        Informações
                    </button>
                    <button id="progress-form__tab-2" class="flex-1 px-0 pt-2 progress-form__tabs-item"
                        type="button" role="tab" aria-controls="progress-form__panel-2" aria-selected="false"
                        tabindex="-1" aria-disabled="true">
                        <span class="d-block step" aria-hidden="true">Etapa 2 <span class="sm:d-none">de
                                3</span></span>
                        Tabela nutricional
                    </button>
                    <button id="progress-form__tab-3" class="flex-1 px-0 pt-2 progress-form__tabs-item"
                        type="button" role="tab" aria-controls="progress-form__panel-3"
                        aria-selected="true" tabindex="-1" aria-disabled="false">
                        <span class="d-block step" aria-hidden="false" data-complete="true">Etapa 3 <span class="sm:d-none">de
                                3</span></span>
                        Finalizar
                    </button>
                </div>
                <div class="modal-title">
                    <h1>Adicionar Ingrediente</h1>
                </div>
                <div class="form-container">
                    <form>
                        <div class="row">
                            <div class="col-sm-8">
                                <label for="nutriente" class="col-mb-2 col-form-label">Nome</label>
                                <div class="col-sm-12">
                                    <input type="text" maxlength="20" class="form-control"
                                        wire:model.live="nome">
                                </div>
                                @error('nome')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-4">
                                <label for="unidade" class="col-mb-2 col-form-label">Tag</label>
                                <div class="col-sm-12">
                                    <input type="unidade" maxlength="6" class="form-control"
                                        wire:model.live="tag">
                                </div>
                                @error('tag')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="unidade" class="col-mb-2 col-form-label">Preço</label>
                            <div class="col-sm-12">
                                <input type="tag" maxlength="10" class="form-control"
                                    wire:model.live="preco">
                            </div>
                            @error('preco')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btnBack" wire:click='anterior'>
                                Voltar
                            </button>
                            <button type="button" class="btn btn-primary" wire:click='segundaEtapa'>
                                Próximo
                            </button>
                        </div>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
