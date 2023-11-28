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
    public array $racoes_adicionados = [];
    public $fabrica;
    public function render()
    {

        $ingredientes_adicionar  = Ingrediente::where('user_id', auth()->id())->get();;
        return view('livewire.show-fabrica-component', ['ingredientes' => $ingredientes_adicionar]);
    }
    public function mount($fabrica)
    {
        $this->fabrica = $fabrica;
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
        foreach ($racoes as $racao) {
            // Codifique seus dados em JSON
            $data = json_encode(['ingredientes' => $ingredientes, 'racao' => $racao]);

            // Escreva os dados em um arquivo
            file_put_contents('data.json', $data);

            // Crie o processo
            $process = new Process(['python', 'Formular.py']);

            // Execute o processo e retorne a saída
            try {
                $process->mustRun();

                echo $process->getOutput();
                $dados[] = $process->getOutput();
            } catch (ProcessFailedException $exception) {
                echo $exception->getMessage();
            }
        }
        dd($dados);
    }
}
