<?php

namespace App\Livewire;

use App\Models\Formacao;
use App\Models\Nutriente;
use Livewire\Component;

class ShowIngrdienteComponent extends Component
{

    public $ingrediente;
    public $valores = [];
    public $valoreseditar = [];
    public $editarforms = [];
    public function render()
    {
        $nutrientesNaoRelacionados = Nutriente::whereDoesntHave('ingredientes', function ($query) {
            $query->where('ingrediente_id', $this->ingrediente->id)->where('ingredientes.user_id',auth()->id());
        })->where('nutrientes.user_id',auth()->id())->get();
        
        return view('livewire.show-ingrdiente-component', ['nutrientes_adicionar' => $nutrientesNaoRelacionados]);
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
    public function adicionarNutriente($id)
    {
        $rules = [
            "valores.$id" => 'required|numeric|max:999999.99'
        ];
        $messages = [
            "valores.$id.required" => "O valor do nutriente escolhido é obrigatório.",
            "valores.$id.numeric" => "O valor do nutriente escolhido deve ser numérico.",
        ];
        $this->validate($rules, $messages);
        Formacao::create([
            'valor' => $this->valores[$id],
            'nutriente_id' => $id,
            'ingrediente_id' => $this->ingrediente->id,
            'user_id' => auth()->id()
        ]);
        
        return redirect()->to(route('ingrediente.show',['nome'=>$this->ingrediente->nome]));


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
        $this->render();
    }
}
