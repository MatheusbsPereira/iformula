<div>
    <div class="modal " id="modalCriar"   
        x-data = "{ show : false}"
        x-show = "show"
        x-on:open-modal.window= "show : true"
        x-on:close-modal.window= "show : false"
        >
        <div class="modal-dialog modal-fullscreen-md-down modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click='close' aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form >
                        <div class="mb-3 row">
                            <label for="nutriente" class="col-mb-2 col-form-label">Nutriente:</label>
                            <div class="col-sm-10">
                                <input type="text" maxlength="20" class="form-control" wire:model="nome">
                            </div>
                            @error('nome')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <label for="unidade" class="col-mb-2 col-form-label">Unidade:</label>
                            <div class="col-sm-10">
                                <input type="unidade" maxlength="6" class="form-control" wire:model="unidade">
                            </div>
                            @error('unidade')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <label for="unidade" class="col-mb-2 col-form-label">Tag:</label>
                            <div class="col-sm-10">
                                <input type="tag"  maxlength="10" class="form-control" wire:model="tag">
                            </div>
                            @error('tag')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary"    wire:click='save'>
                                Salvar
                            </button>
                            <button type="button" class="btn btn-secondary" wire:click='close'  data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
