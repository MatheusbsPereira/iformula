<?php

namespace App\Livewire;

use App\Models\Formacao;
use App\Models\Nutriente;
use Livewire\Component;

class ShowIngrdienteComponent extends Component
{
    public $ingrediente;
    public $valores = [];
    public function render()
    {
        $nutrientesNaoRelacionados = Nutriente::whereDoesntHave('ingredientes', function ($query) {
            $query->where('ingrediente_id', $this->ingrediente->id);
        })->get();
        return view('livewire.show-ingrdiente-component', ['nutrientes_adicionar' => $nutrientesNaoRelacionados]);
    }
    public function mount($ingrediente)
    {
        $this->ingrediente = $ingrediente;
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
            'ingrediente_id' => $this->ingrediente->id
        ]);
    }
}
