<?php

namespace App\Livewire;

use App\Models\Ingrediente;
use App\Models\Racao;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class ShowFabricaComponent extends Component
{
    public array $ingredientes_adicionados = [];
    public array $racoes_adicionados = [3, 4];
    public $fabrica;
    public $id;
    public function render()
    {

        $ingredientes_adicionar  = Ingrediente::where('user_id', auth()->id())->get();;
        return view('livewire.show-fabrica-component', ['ingredientes' => $ingredientes_adicionar]);
    }
    public function mount($fabrica)
    {
        $this->fabrica = $fabrica;
        $this->id = $fabrica->id;
    }
    public function adicionar($id)
    {
        $this->ingredientes_adicionados[] = $id;
    }
    public function formular()
    {
        $dados = [];
        $data = [];
        $ingredientes = Ingrediente::with('nutrientes')->whereIn('id', $this->ingredientes_adicionados)->get();
        $racoes = Racao::with('nutrientes')->whereIn('id', $this->racoes_adicionados)->get();
        //dd($racoes);
        foreach ($racoes as $racao) {
            // Codifique seus dados em JSON
            $data = json_encode(['ingredientes' => $ingredientes, 'racao' => $racao]);
            //dd($data);
            // Escreva os dados em um arquivo
            $path = base_path('livewire/arquivo.json');
            file_put_contents(base_path('livewire/arquivo.json'), $data);
            

            // Crie o processo
            $output = shell_exec("python Formular.py");

            $dados[] = $output;
        }
        dd($dados);
    }
}
