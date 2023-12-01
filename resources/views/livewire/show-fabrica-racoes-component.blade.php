<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div>
        {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
        <div style="height: 100%;">
            <div style="display: flex;flex-direction: column;justify-content: space-between;">
                <x-my-modal name="cadastrar">
                    <livewire:racao_modal :id=$id>
                </x-my-modal>
                <div class="container">
                    <div class="title-container">
                        <div class="page-title">
                            <span class="title-painel">Painel de Rações</span>
                            <span class="subtitle-painel">{{ $fabrica->especie }}</span>
                        </div>
                        <div>
    
                        </div>
                    </div>
    
                    <div class="header-tools">
                        <div class="left-tools">
                            <button id="btnAddIng" class="btn-adicionar" x-data
                                x-on:click="$dispatch('open-modal',{name : 'cadastrar'})">
                                <i class='bx bx-plus'></i> Adicionar
                            </button>
                            <div class="dropdown btn-adicionar">
                                <button class="dropdown-reset"><i class='bx bx-export'></i> Exportar</button>
                                <div class="dropdown-content">
                                    <a href="#" {{-- wire:click="exportToPDF" --}}>PDF</a>
                                    <a href="#{{-- route('ingrediente.exportsxlsx') --}}">Excel</a>
                                </div>
                            </div>
                        </div>
    
                        <div class="right-tools">
                            <input type="text" placeholder="Pesquisar" class="btn-pesquisar" wire:model.live='search'>
                        </div>
                    </div>
                    
                    
                </div>
                <div class="container-ingredientes">
                    @foreach ($racoes as $key => $racao)
                        <a x-on:click="showModal = true; $dispatch('open-modal', { name: '{{ $racao['nome'] }}' })"
                            class="card-toggle modal-toggle">
                            <div title="{{ $racao['nome'] }}" class="ingredientes-card card-animation">
                                <div class="card-body">
                                    <div class="card-header">
                                        <p class='nome-text'>{{ $racao['nome'] }} - {{ $racao['idade'] }} anos</p>
                                        <div class='tag-label'>
                                            <p class='text'>{{ $racao['tag'] }}</p>
                                        </div>
                                    </div>
                                    <p class='unidade-text text'>{{ $racao['peso'] }} kgs - {{ $racao['idade'] }} anos</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            
            
                
                {{-- $fabricas->links() --}}
            </div>
        </div>
    </div>
    
</div>
