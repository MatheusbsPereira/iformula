<div style="height: 99%">
    {{-- Be like water. --}}
    <div class="modal-dialog modal-fullscreen-md-down modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ingrediente</h5>
                <button type="button" class="btn-close" data jn-bs-dismiss="modal" wire:click='close'
                    aria-label="Close" @click="showModal = false; $dispatch('modal-close')"></button>
            </div>
            <div class="modal-body">
                <div class="form-container">
                    <form>
                        <div class="row">
                            <div class="row-sm-12">
                                <label for="nutriente" class="col-mb-2 col-form-label">Nome</label>
                                <div class="col-sm-12">
                                    <input type="text" maxlength="20"
                                        class="form-control @error('nome')erro @enderror" wire:model.live="nome">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="unidade" class="col-mb-2 col-form-label">Preço</label>
                                <div class="col-sm-12">
                                    <input type="tag" maxlength="10"
                                        class="form-control @error('preco')erro @enderror" wire:model.live="preco">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="unidade" class="col-mb-2 col-form-label">Tag</label>
                                <div class="col-sm-12">
                                    <input type="unidade" maxlength="6"
                                        class="form-control @error('tag')erro @enderror" wire:model.live="tag">
                                </div>
                            </div>
                        </div>

                        <div class="row-sm-12">
                            <label for="nutriente" class="col-mb-2 col-form-label">Descrição</label>
                            <div class="col-sm-12">
                                <input type="text" maxlength="70"
                                    class="form-control @error('nome')descricao @enderror" wire:model.live="descricao">
                            </div>
                        </div>
                        @if ($errors->isEmpty())
                            <p style="color: rgb(238, 0, 0);"> </p>
                        @endif
                        @if (!$errors->isEmpty())
                            <p style="color: rgb(238, 0, 0);">*Verifique os campos</p>
                        @endif
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btnProximo" wire:click='nutrientes'>
                                Nutrientes
                            </button>
                            <button type="button"
                                class="btn btn-danger"wire:click="excluir">Excluir</button>
                            <button type="button" class="btn btn-primary btnProximo" wire:click='save'>
                                Salvar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
