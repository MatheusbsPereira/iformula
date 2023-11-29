<div style="height: 99%">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button @click="showModal = false; $dispatch('modal-close')" type="button" class="btn-close"
                    data-bs-dismiss="modal" wire:click='close' aria-label="Close"></button>
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
                        <div class="row">
                            <div class="col-6">
                                <label for="unidade" class="col-mb-2 col-form-label">Unidade</label>
                                <select class="form-select @error('unidade')erro @enderror" wire:model.live="unidade">
                                    <option value="0">Selecione</option>
                                    <option value="kcal">kcal</option>
                                    <option value="Mcal">Mcal</option>
                                    <option value="J">J</option>
                                    <option value="%">%</option>
                                    <option value="g">g</option>
                                    <option value="µg">µg</option>
                                    <option value="UI">UI</option>
                                    <option value="ppb">ppb</option>
                                </select>
                            </div>

                            <div class="col-6">
                                <label for="tag" class="col-mb-2 col-form-label">Tag</label>
                                <div class="col-sm-12">
                                    <input type="tag" maxlength="12"
                                        class="form-control @error('tag')erro @enderror" wire:model.live="tag">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-adicionar" wire:click='save'>
                                <i class='bx bx-plus'></i> Adicionar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
