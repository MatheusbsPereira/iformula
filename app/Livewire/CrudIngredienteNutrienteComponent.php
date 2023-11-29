<?php

namespace App\Livewire;

use App\Models\Formacao;
use App\Models\Nutriente;
use Jenssegers\Agent\Agent;
use Livewire\Component;

class CrudIngredienteNutrienteComponent extends Component
{
    public $ingrediente;
    public $valores = [];
    public $editarforms = [];
    public array $nutrientes_adicionados = [];
    public $isMobile;
    public function render()
    {
        $nutrientesNaoRelacionados = Nutriente::whereDoesntHave('ingredientes', function ($query) {
            $query->where('ingrediente_id', $this->ingrediente->id)->where('ingredientes.user_id', auth()->id());
        })->where('nutrientes.user_id', auth()->id())->get();

        return view('livewire.crud-ingrediente-nutriente-component', ['nutrientes_adicionar' => $nutrientesNaoRelacionados]);
    }
    public function mount($ingrediente)
    {
        $this->ingrediente = $ingrediente;
        $agent = new Agent();
        $this->isMobile = $agent->isMobile();
    }
    public function adicionar($id)
    {
        $this->nutrientes_adicionados[] = $id;
    }
    public function tirar($id)
    {
        $key = array_search($id, $this->nutrientes_adicionados);
        unset($this->nutrientes_adicionados[$key]);
        unset($this->valores[$key]);
    }
    public function save()
    {
        $rules = [];
        foreach ($this->nutrientes_adicionados as $nutriente) {
            $rules["valores.$nutriente"] = 'required|numeric|max:999999.99';
        }

        $this->validate($rules);
        foreach ($this->nutrientes_adicionados as $nutriente) {
            # code...
            Formacao::create([
                'valor' => $this->valores[$nutriente],
                'nutriente_id' => $nutriente,
                'ingrediente_id' => $this->ingrediente->id,
                'user_id' => auth()->id()
            ]);
        }
        return redirect()->to(route('ingrediente.show',['nome'=>$this->ingrediente->nome]));
    }
    
    public function close()
    {
        unset($this->nutrientes_adicionados);
        unset($this->valores);
        $this->dispatch('close-modal');
        $this->resetErrorBag();
    }
}
