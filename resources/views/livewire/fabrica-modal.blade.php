<div style="height: 100%">
    {{-- Success is as dangerous as failure. --}}
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click='close'
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-title">
                    <h1>Adicionar Fábrica</h1>
                </div>
                <div class="form-container">
                    <form>
                        <div class="mb-3 row">
                            <label for="fabrica" class="col-mb-2 col-form-label">Fábrica:</label>
                            <div class="col-sm-10">
                                <input type="text" maxlength="20" class="form-control @error('especie')erro @enderror"
                                    wire:model.live="especie">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="unidade" class="col-mb-2 col-form-label">Capacidade do misturador:</label>
                            <div class="col-sm-10">
                                <input type="unidade" maxlength="6"
                                    class="form-control @error('capacidade_do_misturador')erro @enderror"
                                    wire:model.live="capacidade_do_misturador">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="descricacao" class="col-mb-2 col-form-label">Descrição:</label>
                            <div class="col-sm-10">
                                <input type="tag" maxlength="10"
                                    class="form-control @error('descricacao')erro @enderror" wire:model.live="descricacao">
                            </div>
                        </div>
                        @if ($errors->isEmpty())
                            <p style="color: rgb(238, 0, 0);"> </p>
                        @endif
                        @if (!$errors->isEmpty())
                            <p style="color: rgb(238, 0, 0);">*Verifique os campos</p>
                        @endif
                        <div class="modal-footer">
                            <button type="button" class="btn btn-adicionar" wire:click='save'>
                                <i class='bx bx-plus'></i> Finalizar
                            </button>
    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>
