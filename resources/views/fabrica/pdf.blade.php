
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
        <h3 class="titulo">Lista de Fábricas</h3>
        <table>
            <thead>
                <tr>
                    <th>Espécie</th>
                    <th>Capacidade do misturador</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                @foreach (Auth::user()->fabricas as $fabrica)
                    <tr>
                        <td>{{ $fabrica->especie }}</td>
                        <td>{{ $fabrica->capacidade_do_misturador }} /Kg</td>
                        <td>{{ $fabrica->descricao }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>


    </div>
</body>

</html>
