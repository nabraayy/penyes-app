<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relaciones entre Usuarios y Peñas</title>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Caveat', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-image: url('https://img.freepik.com/vector-premium/patron-costuras-ilustracion-toros-color-negro-estilo-arte-linea-sobre-fondo-blanco_460232-1948.jpg');
        }
        .nav-links {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 20px;
            justify-content: center;
        }

        .nav-item {
            display: inline;
        }

        .nav-link {
            text-decoration: none;
            color: #000000;
            font-weight: bold;
            font-size: 16px;
        }

        .nav-link:hover {
            color: #A9A9A9;
        }

        .main-content {
            padding: 20px;
            max-width: 1000px;
            margin: 20px auto;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            font-size: 24px;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .admin-table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .admin-table th, .admin-table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #dddddd;
        }

        .admin-table th {
            background-color: #6f0000;
            font-weight: bold;
            color:white;
        }

        .admin-table td {
            background-color: #ffffff;
        }

        .admin-table tr:hover td {
            background-color: #f9f9f9;
        }

        .action-button {
            text-decoration: none;
            color: white;
            background-color: #720000;
            padding: 6px 12px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .action-button:hover {
            background-color: #0056b3;
        }

        .delete-button {
            background-color: #820000;
            color:white;
            border-radius:5px;
            padding: 6px 12px;
            font-family: 'Caveat', sans-serif;
        }

        .delete-button:hover {
            background-color: #c9302c;
        }

        .edit-button {
            background-color: #006b19;
            color:white;
            border-radius:5px;
            font-family: 'Caveat', sans-serif;
            padding: 6px 12px;
        }

        .edit-button:hover {
            background-color: #218838;
        }

        .back-button {
            background-color: #760000;
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            transition: background-color 0.3s ease, transform 0.3s ease;
            display: inline-block;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .back-button:hover {
            background-color: #005512;
            transform: scale(1.05);
        }
        
    </style>
</head>
<body>


<main class="main-content">
    <h2>Relaciones entre Usuarios y Peñas</h2>
    <table class="admin-table">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Peña</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($relations as $relation)
                <tr>
                <td>{{ $relation->name  ?? 'Usuario no encontrado'}}</td>
                <td>{{ $relation->penya->name  ?? 'Peña no encontrada'}}</td>

                    <td class="buttons-container">
                        <a href="{{ route('admin.relations.edit', ['id' => $relation->id]) }}" class="edit-button">Modificar</a>
                        <form action="{{ route('admin.relations.delete', ['id' => $relation->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button  type="submit" class="delete-button">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin.dashboard') }}" class="back-button">Volver al Panel de Administración</a>
</main>
</body>
</html>
