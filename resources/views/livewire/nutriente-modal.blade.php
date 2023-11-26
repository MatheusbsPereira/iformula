<div style="height: 100%">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click='close'
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-title">
                    <h1>Adicionar Nutriente</h1>
                </div>
                <div class="form-container">
                    <form>
                        <div class="row" style="margin-bottom: 19px">
                            <label for="nutriente" class="col-mb-2 col-form-label">Nome</label>
                            <div class="col-sm-12">
                                <input type="nome" maxlength="20" class="form-control @error('nome')erro @enderror"
                                    wire:model.live="nome">
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="unidade" class="col-mb-2 col-form-label">Unidade</label>
                                <div class="col-sm-12">
                                    <input type="text" maxlength="20"
                                        class="form-control @error('unidade')erro @enderror" wire:model.live="unidade">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="tag" class="col-mb-2 col-form-label">Tag</label>
                                <div class="col-sm-12">
                                    <input type="tag" maxlength="12"
                                        class="form-control @error('tag')erro @enderror" wire:model.live="tag">
                                </div>
                            </div>
                        </div>
                        @if ($errors->isEmpty())
                            <p style="color: rgb(238, 0, 0);"> </p>
                        @endif
                        @if (!$errors->isEmpty())
                            <p style="color: rgb(238, 0, 0);">*Verifique os campos</p>
                        @endif
                        <div class="modal-footer">
                            <button type="button" class="btn-adicionar" wire:click='save'>
                                <i class='bx bx-plus'></i> Finalizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
