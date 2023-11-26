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
        <h3 class="titulo">Lista de Nutrientes</h3>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Unidade</th>
                    <th>Tag</th>
                </tr>
            </thead>
            <tbody>
                @foreach (Auth::user()->nutrientes as $nutriente)
                    <tr>
                        <td>{{ $nutriente->nome }}</td>
                        <td>{{ $nutriente->unidade }}</td>
                        <td>{{ $nutriente->tag }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>


    </div>
</body>

</html>
