<?php

namespace App\Livewire;

use App\Models\Formacao;
use App\Models\Nutriente;
use Livewire\Component;

class ShowIngredienteComponent extends Component
{

    public $ingrediente;
    public $valoreseditar = [];
    public $editarforms = [];
    
    public function render()
    {
        
        
        return view('livewire.show-ingrediente-component');
    }
    public function mount($ingrediente)
    {
        $this->ingrediente = $ingrediente;
        $this->resetarEditar();
    }
    public function resetarEditar(){
        foreach ($this->ingrediente->nutrientes as $nutriente) {
            $this->editarforms[$nutriente->pivot->id] = false;
            $this->valoreseditar[$nutriente->pivot->id] = $nutriente->pivot->valor;
        }
    }
    
    public function deletarNutrienter($id)
    {
        $formacao = Formacao::find($id);
        $formacao->delete();
        return redirect()->to(route('ingrediente.show',['nome'=>$this->ingrediente->nome]));    }
    public function editarValor($id)
    {
        $this->editarforms[$id] = true;
        $this->render();
    }
    public function atualizarValor($id)
    {
        $rules = [
            "valoreseditar.$id" => 'required|numeric|max:999999.99'
        ];
        $messages = [
            "valoreseditar.$id.required" => "O valor do nutriente escolhido é obrigatório.",
            "valoreseditar.$id.numeric" => "O valor do nutriente escolhido deve ser numérico.",
        ];
        $this->validate($rules, $messages);
        $formacao = Formacao::find($id);
        $formacao->valor = $this->valoreseditar[$id];
        $formacao->save();
        $this->editarforms[$id] = false;
        return redirect()->to(route('ingrediente.show',['nome'=>$this->ingrediente->nome]));
    }
    
    
}
