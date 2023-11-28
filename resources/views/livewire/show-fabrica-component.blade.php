<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div style="height: 100%;">
        <div style="display: flex;flex-direction: column;justify-content: space-between;">
            <x-my-modal name="cadastrar">
                <livewire:racao_modal :id=$id > 
            </x-my-modal>
            <div class="container">
                <div class="title-container">
                    <div class="page-title">
                        <span class="title-painel">Painel de Controle</span>
                        <span class="subtitle-painel">Fábrica {{ $fabrica->especie }}</span>
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

            <div class="">
                <table>
                    <thead>
                        <tr>
                            <th>Ingredientes</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th><select wire:change="adicionar($event.target.value)">
                                    <option value="0">Adicionar</option>
                                    @foreach ($ingredientes as $ingrediente)
                                        @if (!in_array($ingrediente->id, $ingredientes_adicionados))
                                            <option value="{{ $ingrediente->id }}">{{ $ingrediente->nome }}</option>
                                        @endif
                                    @endforeach
                                </select></th>
                            <th><button class="btn-adicionar" wire:click='formular'>Formular</button></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ingredientes as $ingrediente)
                            @if (in_array($ingrediente->id, $ingredientes_adicionados))
                                <tr>
                                    <td>{{ $ingrediente->nome }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                <th><button class="btn-adicionar" wire:click='formular'>Formular</button></th>
            </div>
            {{-- $fabricas->links() --}}
        </div>
    </div>
</div>
