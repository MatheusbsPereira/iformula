<div style="height: 100%;display: flex;flex-direction: column;justify-content: space-between;">

    

    <div class="container">
        <div class="body-header">
            <div class="page-title">
                <span class="title-painel">Painel de Controle</span>
                <span class="subtitle-painel">Nutrientes</span>
            </div>
            <div class="page-tools">
                <button   wire:click="$dispatch('open-modal')"   class="btn-adicionar">Criar</button>
                <input type="text" placeholder="Pesquisar" class="btn-pesquisar" wire:model.live='search'>
            </div>
             <div>
            <label for="per_page">Itens por página:</label>
            <select id="per_page" wire:model="perPage" wire:change="setPerPage($event.target.value)">
                <option value="0" style="display:none;"></option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="50">50</option>
                <!-- Adicione mais opções conforme necessário -->
            </select>
        </div>  
        </div>
        <div>
            <div class="row container-nutrientes">
                @foreach ($nutrientes as $key => $nutriente)
                    <a data-bs-toggle="modal" data-bs-target="#nutriente_{{ $nutriente['id'] }}"
                        class="modal-toggle col">
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
    <div>
        @foreach ($nutrientes as $nutriente)
            <livewire:crud-nutriente-component :id="$nutriente['id']" :key="$nutriente['id']" />
        @endforeach
    </div>
    {{ $nutrientes->links() }}
</div>
<script>
    document.addEventListener('livewire:initialized', () => {
       @this.on('fechar-modal', (event) => {
           //
           $('#modalCriar').modal('hide');
       });
       @this.on('exibir-modal', (event) => {
           //
           console.log('A validação falhou');
           $('#modalCriar').modal('show');
           
       });
    });
</script>