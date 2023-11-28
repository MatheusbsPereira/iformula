<?php

namespace App\Livewire;

use App\Models\Ingrediente;
use Livewire\Component;


class ShowFabricaComponent extends Component
{
    public array $ingredientes_adicionados = [];
    public array $racoes_adicionados = [3, 4];
    public $fabrica;
    public $id;
    public function render()
    {

        $ingredientes_adicionar = Ingrediente::where('user_id', auth()->id())->get();
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
        $ingredientes = Ingrediente::with('nutrientes')->whereIn('id', $this->ingredientes_adicionados)->get();
    
        // Criar um array associativo com os dados relevantes dos ingredientes
        $dados_ingredientes = [];
        foreach ($ingredientes as $ingrediente) {
            $nutrientes = $ingrediente->nutrientes;
            $nutrientes_array = [];
            foreach ($nutrientes as $nutriente) {
                $requisitos[$nutriente->nome] = [
                    'min' => 30, 
                    'max' => 100, 
                ];

                $nutrientes_array[$nutriente->nome] = is_numeric($nutriente->pivot->valor) ? $nutriente->pivot->valor : 0;
            }
    
            $dados_ingredientes[$ingrediente->nome] = [
                'custo' => $ingrediente->preco,
                'nutrientes' => $nutrientes_array,
                'min' => 0,
                'max' => 100,
            ];
        }
    
        // Converte o array de ingredientes em JSON
        $dados_json = json_encode(["ingredientes" => $dados_ingredientes, "requisitos" => $requisitos]);

        $dados_json = str_replace('"', '\"', $dados_json);

        $currentDirectory = getcwd();
        chdir(__DIR__);
        exec("2>&1 python3 Formular.py $dados_json", $output, $e);
        chdir($currentDirectory);
        dd($output);
    
    }
}
