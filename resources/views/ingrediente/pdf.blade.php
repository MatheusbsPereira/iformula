
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">

    <style>
        .titulo {
            border: 1px;
            text-align: center;
            width: 100%;
            text-transform: uppercase;
            font-weight: bold;
        }

        table {
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }

        th,
        td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div>
        <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
        <h2>Autor: {{ Auth::user()->name }}</h2>
        <h3 class="titulo">Lista de Ingredientes</h3>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Tag</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                @foreach (Auth::user()->ingredientes as $ingrediente)
                    <tr>
                        <td>{{ $ingrediente->nome }}</td>
                        <td>R$ {{ $ingrediente->preco }}</td>
                        <td>{{ $ingrediente->tag }}</td>
                        <td>{{ $ingrediente->descricao }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>


    </div>
</body>

</html>
