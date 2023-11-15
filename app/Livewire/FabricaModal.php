<?php

namespace App\Livewire;

use App\Models\Fabrica;
use App\Rules\EspecieFabrica;
use Livewire\Component;

class FabricaModal extends Component
{
    public string $especie;
    public  $capacidade_do_misturador = '';
    public string $descricao ='';
    public function render()
    {
        return view('livewire.fabrica-modal');
    }
    public function close()
    {
        $this->especie='';
        $this->capacidade_do_misturador='';
        $this->descricao='';
        $this->dispatch('close-modal');
    }
    public function save()
    {
        $rules = [
            'especie' => ['required', 'max:50', new EspecieFabrica],
            'capacidade_do_misturador' => ['required', 'max: 999999.999999', 'numeric'],
            'descricao' => ['max:70'],
        ];
        $message = [
            'capacidade_do_misturador.numeric' => 'Valor inválido',
        ];
        $this->validate($rules, $message);
        Fabrica::query()->create([
            'especie' => $this->especie,
            'capacidade_do_misturador' => $this->capacidade_do_misturador,
            'descricao'=> $this->descricao,
            'user_id' => auth()->id()
        ]);
        return redirect()->to(route('fabrica.index'));
    }
}
