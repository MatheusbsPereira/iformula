<?php

namespace App\Livewire;

use App\Models\Nutriente;
use App\Rules\NomeNutriente;
use Livewire\Component;

class NutrienteModal extends Component
{
    public string $nome = '';
    public string $unidade = '';
    public string $tag = '';
    public int $vezesSalvar = 0;
    public function render()
    {
        return view('livewire.nutriente-modal');
    }
    public function save()
    {
        $this->validate($this->rules());
        Nutriente::query()->create([
            'nome' => $this->nome,
            'unidade' => $this->unidade,
            'tag' => $this->tag,
            'user_id' => auth()->id()
        ]);
        $this->nome = "";
        $this->unidade = "";
        $this->tag = "";
        $this->vezesSalvar ++;
        /**
         * Quando o usuario adiciona seu segundo nutriente em sequencia ele recarrega a pagina
         */
        if($this->vezesSalvar == 1) {
            return redirect()->to(route('nutriente.index'));
        }
        $this->close();
    }

    public function rules()
    {
        return [
            'nome' => ['required', 'max:50', new NomeNutriente],
            'unidade' => ['required', 'max:6'],
            'tag' => ['required', 'max:10'],
        ];
    }

    public function close()
    {
        $this->dispatch('close-modal');
    }
    public function resetar()
    {
        $this->nome = '';
        $this->unidade = '';
        $this->tag = '';
    }
}
