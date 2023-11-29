<div style="height: 99%">
    {{-- Because she competes with no one, no one can compete with her. --}}
    <style>
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

        .btn-remover i {
            font-size: 23px;
        }

        .item .nome-text {
            margin-top: -7px;
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
            height: 316px;
            width: 100%;
        }

        .cards {
            overflow: hidden;

        }

        .form-container form {
            height: 316px;
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
            height: 150px;
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
            height: 110px;

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
            height: 556px;
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
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button @click="showModal = false; $dispatch('modal-close')" type="button" class="btn-close" data
                    jn-bs-dismiss="modal" wire:click='close' aria-label="Close"></button>
            </div>
            <div class="form-container">
                <div class="modal-title">
                    <h1>Adicionar Ingrediente</h1>
                </div>
                <form>
                    <select wire:change="adicionar($event.target.value)" class="form-select">
                        <option value="0">Selecione nutrientes</option>
                        @foreach ($nutrientes_adicionar as $nutriente)
                            @if (!in_array($nutriente->id, $nutrientes_adicionados))
                                <option value="{{ $nutriente->id }}">{{ $nutriente->nome }}</option>
                            @endif
                        @endforeach
                    </select>
                    <div class="cards">
                        <div class="wrapper faded right">
                            @foreach ($nutrientes_adicionar as $nutriente)
                                @if (in_array($nutriente->id, $nutrientes_adicionados))
                                    <div class="item">
                                        <div class="row">
                                            <button type="button" class="btn-remover"
                                                wire:click="tirar({{ $nutriente->id }})"><i class='bx bx-x'></i></button>
                                        </div>
                                        <p class="nome-text">{{ $nutriente->nome }}</p>
                                        <p class="sub-label">{{ $nutriente->unidade }}/kg</p>
                                        <div class="input-container">
                                            <input type="number" maxlength="70"
                                                class="form-control @error("valores.$nutriente->id")erro @enderror text-center"
                                                wire:model.live="valores.{{ $nutriente->id }}">
                                        </div>
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
                        <button type="button" class="btn btn-primary btnProximo" wire:click='save'>
                            Salvar
                        </button>
                    </div>
                </form>
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
</div>
