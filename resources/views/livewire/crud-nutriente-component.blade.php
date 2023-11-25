<div style="height: 100%">
    {{-- fAZ UM MODAL APARECER QUANDO CLICAR NO BOOTAO DE ADICIONAR INGREDIENTE --}}
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click='fechar'
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
                                <input type="nome" maxlength="20" class="form-control" wire:model.live="nome">
                            </div>
                            @error('nome')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="unidade" class="col-mb-2 col-form-label">Unidade</label>
                                <div class="col-sm-12">
                                    <input type="text" maxlength="20" class="form-control"
                                        wire:model.live="unidade">
                                </div>
                                @error('unidade')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
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
                            <button type="button" class="btn-adicionar"wire:click="salvar"><i class='bx bxs-download'></i> Salvar</button>
                            <button type="button" class="btn-adicionar"wire:click="excluir({{ $id }})"
                                data-bs-dismiss="modal"><i class='bx bx-trash' ></i> Excluir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>