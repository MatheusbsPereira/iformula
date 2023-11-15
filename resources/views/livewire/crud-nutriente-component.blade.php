<div style="height: 100%">
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

    <div class="modal-dialog modal-dialog-centered modal-fullscreen-md-down" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click='fechar'
                aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <div class="modal-title">
                    <h1>Editar Nutriente</h1>
                </div>
                <div class="form-container">
                    <form>
                        <div class="row" style="margin-bottom: 19px">
                            <label for="nutriente" class="col-mb-2 col-form-label">Nome</label>
                            <div class="col-sm-12">
                                <input type="nome" maxlength="10" class="form-control" wire:model.live="nome">
                            </div>
                            @error('nome')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <label for="unidade" class="col-mb-2 col-form-label">Unidade</label>
                                <div class="col-sm-12">
                                    <input type="text" maxlength="20" class="form-control"
                                        wire:model.live="unidade">
                                </div>
                                @error('unidade')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="tag" class="col-mb-2 col-form-label">Tag</label>
                                <div class="col-sm-12">
                                    <input type="tag" maxlength="12" class="form-control" wire:model.live="tag">
                                </div>
                                @error('tag')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary btn-excluir"wire:click="excluir({{ $id }})"
                            data-bs-dismiss="modal"><i class='bx bx-trash-alt'></i>  Excluir</button>
                            <button type="button" class="btn btn-primary" wire:click='salvar'>
                                <i class='bx bx-arrow-to-bottom'></i> Salvar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
