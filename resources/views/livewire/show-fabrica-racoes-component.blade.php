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
                            <span class="title-painel">Painel da Fábrica</span>
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
    
                
                {{-- $fabricas->links() --}}
            </div>
        </div>
    </div>
    
</div>
