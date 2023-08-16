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
        return view('livewire.ingrediente-component',['nutrientes'=>Nutriente::get()]);
    }
    public function save(){
        //dd($this->valores);
        
        $this->validate();
        Ingrediente::create([
            'nome' => $this->form->nome,
            'preco' => $this->form->preco
        ]);
        $ingrediente = Ingrediente::orderByDesc('id')->first();
        //dd($ingrediente);
        //dd($this->form->nutrientes);
        foreach ($this->form->nutrientes as $key => $nutriente) {
            Formacao::create([
                'valor' =>$this->valores[$nutriente],
                'nutriente_id' => $nutriente, 
                'ingrediente_id' => $ingrediente->id 
            ]);
        }
    }
}
