<div>
    {{-- <div class="card">
        <div class="card-body">
            <form wire:submit="save">
                <div class="mb-3 row">
                    <label for="nome" class="col-mb-2 col-form-label">Animal:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" wire:model="nome">
                    </div>
                    @error('nome')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label for="descricao" class="col-mb-2 col-form-label">Descrição:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" wire:model="descricao" maxlength="700">
                    </div>
                    @error('descricao')
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
                <div class="mb-3 row">
                    <label for="nutrientes" class="col-mb-2 col-form-label">Nutrientes:</label>
                    <div class="col-sm-10">
                        @foreach ($nutrientes_escolher as $key => $nutriente)
                            <p>
                                <input type="checkbox" value="{{ $nutriente['id'] }}" wire:model="nutrientes">
                                <label for="">{{ $nutriente['nome'] }} |</label>
                                <label for="">Valor Minimo:</label>
                                <input type="text" wire:model="valoresmin.{{ $nutriente['id'] }}">
                                <label for="">{{ $nutriente['unidade'] }}</label>
                                @error("valoresmin.$nutriente[id]")
                                    {{ $message }}
                                @enderror
                                <label for="">Valor Maximo:</label>
                                <input type="text" wire:model="valoresmax.{{ $nutriente['id'] }}">
                                <label for="">{{ $nutriente['unidade'] }}</label>
                                @error("valoresmax.$nutriente[id]")
                                    {{ $message }}
                                @enderror
                            </p>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div> --}}
    <x-my-modal name="cadastrar">    

    </x-my-modal>

  <div class="container">
        <div class="title-container">
            <div class="page-title">
                <span class="title-painel">Painel de Controle</span>
                <span class="subtitle-painel">Animais</span>
            </div>
            <div>
                <select id="per_page" wire:model="perPage" wire:change="setPerPage($event.target.value)">
                        <option value="0" style="display:none;"></option>
                        <option value="20">20 itens</option>
                        <option value="30">30 itens</option>
                        <option value="50">50 itens</option>
                    <option value="9999">Todos</option>
                </select>
            </div>
        </div>

        <div class="header-tools">
            <div class="left-tools">
                <button class="btn-adicionar" x-data x-on:click="$dispatch('open-modal',{name : 'cadastrar'})">
                    <i class='bx bx-plus'></i> Adicionar
                </button>
                <div class="dropdown btn-adicionar">
                    <button class="dropdown-reset"><i class='bx bx-export'></i> Exportar</button>
                    <div class="dropdown-content">
                        <a href="#" wire:click="exportToPDF">PDF</a>
                        <a href="#" wire:click="exportToExcel">Excel</a>
                    </div>
                </div>
            </div>

            <div class="right-tools">
                <input type="text" placeholder="Pesquisar" class="btn-pesquisar" wire:model.live='search'>
            </div>
        </div>

        <div class="container-animais">
            @foreach ($animais as $key => $animal)
                <a class="card-toggle" href="{{ route('animal.show', ['nome' => $animal->nome]) }}">
                    <div title="{{ $animal['nome'] }}" class="animais-card card-animation">
                        <div class="card-body">
                            <div class="card-header">
                                <p class='nome-text'>{{ $animal['nome'] }}</p>
                                <div class='tag-label'>
                                    <p class='text'>{{ $animal['tag'] }}</p>
                                </div>
                            </div>
                            <p class='unidade-text text'>{{ $animal['descricao'] }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <div>
             </div>
    {{ $animais->links() }}
</div>
