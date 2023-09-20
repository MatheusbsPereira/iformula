<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="modal fade" id="nutriente_{{$id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nutriente</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3 row">
                            <label for="nutriente" class="col-mb-2 col-form-label">Nutriente:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" wire:model="nome">
                            </div>
                            @error('nome')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <label for="unidade" class="col-mb-2 col-form-label">Unidade:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" wire:model="unidade">
                            </div>
                            @error('unidade')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <label for="tag" class="col-mb-2 col-form-label">Tag:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" wire:model="tag">
                            </div>
                            @error('tag')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"wire:click="salvar" >Salvar</button>
                    <button type="button" class="btn btn-primary"wire:click="excluir({{$id}})" data-bs-dismiss="modal">Excluir</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
</div>
