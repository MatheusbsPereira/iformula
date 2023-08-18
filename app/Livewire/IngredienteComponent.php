<?php

namespace App\Livewire;

use App\Livewire\Forms\IngredienteCreateform;
use App\Models\Formacao;
use App\Models\Ingrediente;
use App\Models\Nutriente;
use Livewire\Component;
use Livewire\WithPagination;

class IngredienteComponent extends Component
{
    use WithPagination;
    public IngredienteCreateform $form;
    public $valores = [];
    public function render()
    {
        return view('livewire.ingrediente-component', ['nutrientes' => Nutriente::get(),'ingredientes'=>Ingrediente::orderByDesc('id')->paginate(6)]);
    }
    public function save()
    {

        $this->validate();
        $rules = [];
        $messages = [];
        foreach ($this->form->nutrientes as $key => $nutriente) {
            $rules["valores.$nutriente"] = 'required|numeric';
            $messages["valores.$nutriente.required"] = "O valor do nutriente escolhido é obrigatório.";
            $messages["valores.$nutriente.numeric"] = "O valor do nutriente escolhido deve ser numérico.";
        }
        $this->validate($rules,$messages);
        

        Ingrediente::create([
            'nome' => $this->form->nome,
            'preco' => $this->form->preco
        ]);
        $ingrediente = Ingrediente::orderByDesc('id')->first();
        foreach ($this->form->nutrientes as $key => $nutriente) {
            Formacao::create([
                'valor' => $this->valores[$nutriente],
                'nutriente_id' => $nutriente,
                'ingrediente_id' => $ingrediente->id
            ]);
        }
    }
}
