<div style="height: 100%;display: flex;flex-direction: column;justify-content: space-between;">
    {{-- <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="save">
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
                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                    <span wire:loading.remove>Salvar</span>
                    <span wire:loading>Salvando...</span>
                </button>
            </form>
        </div>
    </div> --}}
    <div class="container">
        <div class="body-header">
            <div class="page-title">
                <span class="title-painel">Painel de Controle</span>
                <span class="subtitle-painel">Nutrientes</span>
            </div>
            {{-- <div>
            <label for="per_page">Itens por página:</label>
            <select id="per_page" wire:model="perPage" wire:change="setPerPage($event.target.value)">
                <option value="0" style="display:none;"></option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="50">50</option>
                <!-- Adicione mais opções conforme necessário -->
            </select>
        </div>  --}}
        </div>

        <div class="container">

            <div class="row container-nutrientes">
                @foreach ($nutrientes as $key => $nutriente)
                    <a data-bs-toggle="modal" data-bs-target="#nutriente_{{ $nutriente['id'] }}" class="modal-toggle">
                        <div title="{{ $nutriente['nome'] }}" class="nutrientes-card card-animation">
                            <div class="card-body">
                                <div class="card-header">
                                    <p class='nome-text'>{{ $nutriente['nome'] }}</p>
                                    <div class='tag-label'>
                                        <p class='text'>{{ $nutriente['tag'] }}</p>
                                    </div>
                                </div>
                                <p class='unidade-text text'>{{ $nutriente['unidade'] }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    @foreach ($nutrientes as $nutriente)
        <livewire:crud-nutriente-component :id="$nutriente['id']" :key="$nutriente['id']" />
    @endforeach
    {{ $nutrientes->links() }}
</div>
