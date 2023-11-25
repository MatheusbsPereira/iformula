<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Fabrica;
use App\Rules\EspecieFabrica;

class CrudFabricaComponent extends Component
{
    public int $id;
    public string $especie;
    public string $first_especie;
    public  $capacidade_do_misturador = '';
    public string $descricao = '';
    public function render()
    {
        return view('livewire.crud-fabrica-component');
    }
    public function mount($id)
    {
        $fabrica = Fabrica::find($id);
        $this->id = $fabrica->id;
        $this->especie = $fabrica->especie;
        $this->first_especie = $this->especie;
        $this->capacidade_do_misturador = $fabrica->capacidade_do_misturador;
        $this->descricao = $fabrica->descricao;
    }
    public function save()
    {
        if ($this->especie != $this->first_especie) {
            $this->validate($this->rulesNewName(), $this->message());
        } else {
            $this->validate($this->rules(), $this->message());
        }
        $fabrica = Fabrica::find($this->id);
        $fabrica->especie = $this->especie;
        $fabrica->tag = $this->tag;
        $fabrica->capacidade_do_misturador = $this->capacidade_do_misturador;
        $fabrica->descricao = $this->descricao;
        $fabrica->save();
        return redirect()->to(route('Fabrica.index'));
    }
    public function rulesNewName()
    {
        return [
            'especie' => ['required', 'max:50', new EspecieFabrica],
            'capacidade_do_misturador' => ['required', 'max:9999.99', 'numeric'],
            'descricao' => ['required', 'max:70'],
        ];
    }
    public function rules()
    {
        return [
            'especie' => ['required', 'max:50',],
            'unidade' => ['required', 'max:6'],
        ];
    }
    public function message()
    {
        return [
            'capacidade_do_misturador.numeric' => 'Valor inválido',
        ];
    }
    public function excluir()
    {
        $fabrica = Fabrica::find($this->id);
        $fabrica->delete();
        return redirect()->to(route('Fabrica.index'));
    }
    public function exibir()
    {
        $fabrica = Fabrica::find($this->id);
        return redirect()->to(route('fabrica.show', ['especie' => $fabrica->especie]));
    }
    public function close()
    {
        $this->dispatch('close-modal');
    }
}
