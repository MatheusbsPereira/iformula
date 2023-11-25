<div style="height: 100%">
    {{-- Success is as dangerous as failure. --}}
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
                        <label for="fabrica" class="col-mb-2 col-form-label">Fábrica:</label>
                        <div class="col-sm-10">
                            <input type="text" maxlength="20" class="form-control" wire:model.live="especie">
                        </div>
                        @error('especie')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <label for="unidade" class="col-mb-2 col-form-label">Capacidade do misturador:</label>
                        <div class="col-sm-10">
                            <input type="unidade" maxlength="6" class="form-control"
                                wire:model.live="capacidade_do_misturador">
                        </div>
                        @error('capacidade_do_misturador')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <label for="descricacao" class="col-mb-2 col-form-label">Descrição:</label>
                        <div class="col-sm-10">
                            <input type="tag" maxlength="10" class="form-control" wire:model.live="descricacao">
                        </div>
                        @error('descricacao')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btnProximo" wire:click='exibir'>
                            Rações e Formulação
                        </button>
                        <button type="button" class="btn btn-primary" wire:click='save'>
                            Salvar
                        </button>
                        <button type="button" class="btn btn-danger"wire:click="excluir">Excluir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
