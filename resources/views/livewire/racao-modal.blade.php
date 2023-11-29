<div style="height: 99%">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button @click="showModal = false; $dispatch('modal-close')" type="button" class="btn-close" data
                    jn-bs-dismiss="modal" wire:click='close' aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($this->etapa == 1)
                    <!-- Step Navigation -->
                    <div class="d-flex align-items-start mb-3 sm:mb-5 progress-form__tabs" role="tablist">
                        <button id="progress-form__tab-1" class="flex-1 px-0 pt-2 progress-form__tabs-item"
                            type="button" role="tab" aria-controls="progress-form__panel-1" aria-selected="true">
                            <span class="d-block step" aria-hidden="true">Etapa 1 <span class="sm:d-none">de
                                    3</span></span>
                            Informações
                        </button>
                        <button id="progress-form__tab-2" class="flex-1 px-0 pt-2 progress-form__tabs-item"
                            type="button" role="tab" aria-controls="progress-form__panel-2" aria-selected="false"
                            tabindex="-1" aria-disabled="true">
                            <span class="d-block step" aria-hidden="true">Etapa 2 <span class="sm:d-none">de
                                    3</span></span>
                            Exigência nutricional
                        </button>
                    </div>
                    <!-- / End Step Navigation -->

                    <div class="modal-title">
                        <h1>Adicionar Ração</h1>
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
                                    <label for="preco" class="col-mb-2 col-form-label">Peso</label>
                                    <div class="col-sm-12">
                                        <input type="tex" maxlength="10"
                                            class="form-control real @error('peso')erro @enderror"
                                            wire:model.live="peso">
                                    </div>
                                    <label for="preco" class="col-mb-2 col-form-label">Idade</label>
                                    <div class="col-sm-12">
                                        <input type="idade" maxlength="10"
                                            class="form-control real @error('idade')erro @enderror"
                                            wire:model.live="idade">
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
                                <button type="button" class="btn btn-primary btnProximo" wire:click='primeiraEtapa'>
                                    Próximo
                                </button>
                            </div>
                        </form>
                    </div>
                @endif
                @if ($this->etapa == 2)
                    <!-- Step Navigation -->
                    <div class="d-flex align-items-start mb-3 sm:mb-5 progress-form__tabs" role="tablist">
                        <button id="progress-form__tab-1" class="flex-1 px-0 pt-2 progress-form__tabs-item"
                            type="button" role="tab" aria-controls="progress-form__panel-1" aria-selected="false"
                            data-complete="true">
                            <span class="d-block step" aria-hidden="true">Etapa 1 <span class="sm:d-none">de
                                    3</span></span>
                            Informações
                        </button>
                        <button id="progress-form__tab-2" class="flex-1 px-0 pt-2 progress-form__tabs-item"
                            type="button" role="tab" aria-controls="progress-form__panel-2" aria-selected="true"
                            tabindex="-1" aria-disabled="false">
                            <span class="d-block step" aria-hidden="true">Etapa 2 <span class="sm:d-none">de
                                    3</span></span>
                            Exigência nutricional
                        </button>
                    </div>
                    <!-- / End Step Navigation -->

                    <div class="modal-title">
                        <h1>Adicionar Ração</h1>
                    </div>
                    <div class="form-container">
                        <form>
                            <select wire:change="adicionar($event.target.value)" class="form-select ">
                                <option value="0">Adicionar</option>
                                @foreach ($nutrientes as $nutriente)
                                    @if (!in_array($nutriente->id, $nutrientes_adicionados))
                                        <option value="{{ $nutriente->id }}">{{ $nutriente->nome }}</option>
                                    @endif
                                @endforeach
                            </select>

                            <div class="cards">
                                <div class="wrapper faded right">
                                    @foreach ($nutrientes as $nutriente)
                                        @if (in_array($nutriente->id, $nutrientes_adicionados))
                                            <div class="item">
                                                <div class="row">
                                                    <button type="button" class="btn-remover" wire:click="tirar({{$nutriente->id}})"><i class='bx bx-x'></i></button>
                                                </div>
                                                <div class="input-container">
                                                    <p class="nome-text">{{$nutriente->nome}}</p>
                                                    Min:<input type="text" maxlength="70"
                                                        class="form-control @error("valoresmin.$nutriente->id")erro @enderror text-center" wire:model.live="valoresmin.{{$nutriente->id}}">

                                                </div>
                                                <p class="nome-text">{{ $nutriente->nome }}</p>
                                                <p class="sub-label">{{ $nutriente->unidade }}</p>
                                               

                                                    <input type="number" maxlength="70" placeholder="Mínimo"
                                                        class="form-control @error("valoresmin.$nutriente->id")erro @enderror text-center"
                                                        wire:model.live="valoresmin.{{ $nutriente->id }}">

                                           
                        
                                                    <input type="number" maxlength="70" placeholder="Máximo"
                                                        class="form-control @error("valoresmax.$nutriente->id")erro @enderror text-center"
                                                        wire:model.live="valoresmax.{{ $nutriente->id }}">

                                                
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                            <div class="">
                                @if ($isMobile)
                                    <p id="alerta-dispositivo" style="margin: 0" class="align-center">Navegue
                                        deslizando o ecrã<i class='bx bxs-hand-left' style="margin-left: 5px"></i></p>
                                @else
                                    <p id="alerta-dispositivo" style="margin: 0" class="align-center">Navegue com
                                        o scroll do
                                        mouse<i class='bx bx-mouse' style="margin-left: 5px"></i></p>
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btnBack" wire:click='anterior'>
                                    Voltar
                                </button>
                                <button type="button" class="btn btn-primary btnProximo" wire:click='segundaEtapa'>
                                    Finalizar
                                </button>
                            </div>
                        </form>
                    </div>
                    <style>
                        p {
                            margin: 0 !important;
                        }
                        .container-fim {
                            height: 150px;
                            max-width: 400px;
                        }

                        .form-container.etapa-fim {
                            flex-direction: column;
                        }

                        input[type='number']::-webkit-inner-spin-button,
                        input[type='number']::-webkit-outer-spin-button {
                            opacity: 1;
                        }

                        input[type='number'] {
                            margin: 3px;
                        }

                        .btn-remover i {
                            font-size: 23px;
                        }



                        .btn-remover {
                            width: 10px;
                            display: flex;
                            align-items: center;
                            justify-content: center
                        }

                        .item .row {
                            width: 100%;
                            display: flex;
                            flex-direction: row;
                            justify-content: flex-end;
                            margin-top: -5px;
                            margin-right: -23px;
                        }

                        .btn-remover {
                            top: 5px;
                            right: 5px;
                            background-color: transparent;
                            /* ou a cor desejada */
                            color: white;
                            border: none;
                            border-radius: 50%;
                            cursor: pointer;
                            font-size: 14px;
                        }

                        #alerta-dispositivo {
                            white-space: nowrap;
                            line-height: 20px;
                        }

                        .sub-label {
                            margin: -25px 0 0 0;
                        }

                        .input-container {
                            display: flex;
                            flex-direction: column;
                            width: 100%;
                            justify-content: center;
                            align-items: center;
                        }

                        .form-container {
                            height: 376px;
                            width: 100%;
                        }

                        .cards {
                            overflow: hidden;

                        }

                        .form-container form {
                            height: 376px;
                            display: flex;
                            flex-direction: column;
                            justify-content: space-between;
                            max-width: 400px;
                            width: 100%;

                        }

                        .wrapper {
                            max-width: 400px;
                            width: 100%;
                            display: flex;
                            height: 193px;
                            overflow-x: auto !important;
                            background-color: rgb(245, 245, 245);
                            border-radius: 10px;
                            padding: 20px
                        }



                        .wrapper::-webkit-scrollbar {
                            width: 0;
                            height: 0;
                        }

                        .wrapper .item {
                            min-width: 150px;
                            max-width: 150px;
                            height: 153px;

                            text-align: center;
                            background-color: var(--primary-color-light);
                            margin-right: 10px;
                            box-shadow: 0px 10px 15px -3px rgba(0, 0, 0, 0);
                            border-radius: 10px;
                            display: flex;
                            flex-direction: column;
                            justify-content: space-between;
                            align-items: center;

                            padding: 10px
                        }

                        .item .form-control {
                            max-width: 90%;
                            height: 30px;
                        }

                        .btnBack {
                            margin-right: 15px;
                        }

                        .modal-content {
                            height: 625px;
                        }

                        .faded {
                            overflow: auto;
                            --mask: linear-gradient(to right,
                                    rgba(0, 0, 0, 0) -5%,
                                    rgba(0, 0, 0, 1) 15%,
                                    rgba(0, 0, 0, 1) 85%,
                                    rgba(0, 0, 0, 0) 105%,
                                    rgba(0, 0, 0, 0) 0) 100% 50% / 100% 100% repeat-x;
                            -webkit-mask: var(--mask);
                            mask: var(--mask);
                        }

                        .left {
                            --mask: linear-gradient(to right,
                                    rgba(0, 0, 0, 0) -5%,
                                    rgba(0, 0, 0, 1) 15%,
                                    rgba(0, 0, 0, 1) 100%,
                                    rgba(0, 0, 0, 0) 0) 100% 50% / 100% 100% repeat-x;

                        }

                        .right {
                            --mask: linear-gradient(to right,
                                    rgba(0, 0, 0, 1) 85%,
                                    rgba(0, 0, 0, 0) 105%,
                                    rgba(0, 0, 0, 0) 0) 100% 50% / 100% 100% repeat-x;
                        }

                        .modal-footer {
                            margin: 0;
                        }
                    </style>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('wheel', (event) => {
            const scrollContainer = document.getElementsByClassName("wrapper")[0];

            if (scrollContainer) {
                scrollContainer.scrollBy({
                    left: event.deltaY < 0 ? -30 : 30,
                });

                const scrollLeft = scrollContainer.scrollLeft;
                const scrollWidth = scrollContainer.scrollWidth;
                const clientWidth = scrollContainer.clientWidth;

                if (scrollLeft === 0) {
                    scrollContainer.classList.remove('left');
                    scrollContainer.classList.add('right');
                } else if (scrollLeft + clientWidth === scrollWidth) {
                    scrollContainer.classList.remove('right');
                    scrollContainer.classList.add('left');
                } else {
                    scrollContainer.classList.remove('left', 'right');
                    scrollContainer.classList.add('faded');
                }
            }
        });
        document.addEventListener('touchmove', (event) => {
            const scrollContainer = document.getElementsByClassName("wrapper")[0];

            if (scrollContainer) {

                const scrollLeft = scrollContainer.scrollLeft;
                const scrollWidth = scrollContainer.scrollWidth;
                const clientWidth = scrollContainer.clientWidth;

                if (scrollLeft === 0) {
                    scrollContainer.classList.remove('left');
                    scrollContainer.classList.add('right');
                } else if (scrollLeft + clientWidth >= scrollWidth) {
                    scrollContainer.classList.remove('right');
                    scrollContainer.classList.add('left');
                } else {
                    scrollContainer.classList.remove('left', 'right');
                    scrollContainer.classList.add('faded');
                }
            }
        });
    </script>
    <Script>
        $(document).ready(function() {
            $('#preco').mask('0000.00', {
                reverse: true
            });
        });
        document.addEventListener('etapaMudou', function() {
            setTimeout(() => {
                $('#preco').mask('0000.00', {
                    reverse: true
                });
            }, 0);
        });
    </script>
</div>
