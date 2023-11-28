<div style="height: 99%">
    {{-- Be like water. --}}
    <div class="modal-dialog modal-dialog-centered modal-crud">
        <div class="modal-content">
            <div class="modal-header">
                <button @click="showModal = false; $dispatch('modal-close')" type="button" class="btn-close" data
                    jn-bs-dismiss="modal" wire:click='close' aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <div class="modal-title">
                    <h1>Editar {{ $this->nome }}</h1>
                    <button type="button" class="btn btn-adicionar" wire:click='nutrientes'>
                        <i class='bx bx-atom'></i> Tabela nutricional
                    </button>
                </div>
                <div class="form-container">
                    <form>
                        <div class="row">
                            <div class="row-sm-12">
                                <label for="nutriente" class="col-mb-2 col-form-label">Nome</label>
                                <div class="col-sm-12">
                                    <input type="nutriente" maxlength="20"
                                        class="form-control @error('nome')erro @enderror" wire:model.live="nome">
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="preco" class="col-mb-2 col-form-label">Preço</label>
                                <div class="col-sm-12">
                                    <input type="preco" maxlength="10"
                                        class="form-control real @error('preco')erro @enderror" wire:model.live="preco">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="tag" class="col-mb-2 col-form-label">Tag</label>
                                <div class="col-sm-12">
                                    <input type="tag" maxlength="6"
                                        class="form-control @error('tag')erro @enderror" wire:model.live="tag">
                                </div>
                            </div>
                        </div>

                        <div class="row-sm-12">
                            <label for="descricao" class="col-mb-2 col-form-label">Descrição</label>
                            <div class="col-sm-12">
                                <input type="text" maxlength="70"
                                    class="form-control @error('descricao')descricao @enderror"
                                    wire:model.live="descricao">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-adicionar" wire:click='save'>
                                <i class='bx bxs-download'></i> Salvar
                            </button>
                            <button type="button" class="btn btn-adicionar"wire:click="excluir"><i
                                    class='bx bx-trash'></i>
                                Excluir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        .modal-crud .modal-title h1 {
            margin-bottom: 1rem;
        }
        .modal-crud .modal-title button {
            width: 100% !important; 
        }
        .modal-crud .modal-title {
            display: flex;
            justify-content: space-between;
            flex-direction: column;
        }

        .modal-crud .modal-footer {
            flex-wrap: nowrap !important;
        }

        .form-container form {
            height: 316px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            max-width: 400px;
            width: 100%;

        }

        .input-container {
            display: flex;
            flex-direction: column;
            width: 100%;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            height: 316px;
            width: 100%;
        }
    </style>
</div>
