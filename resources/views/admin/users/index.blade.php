<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Caveat', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f9;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
        }

        h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .user-table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .user-table th, .user-table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #dddddd;
        }

        .user-table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .user-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .action-buttons a, .action-buttons button {
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            margin-right: 5px;
            border: none;
            cursor: pointer;
        }

        .edit-button {
            background-color: #28a745;
            color: white;
        }

        .edit-button:hover {
            background-color: #218838;
        }

        .delete-button {
            background-color: #d9534f;
            color: white;
        }

        .delete-button:hover {
            background-color: #c9302c;
        }

        .add-button, .back-button {
            display: block;
            text-align: center;
            font-weight: bold;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
        }

        .add-button {
            background-color: #ffc107;
            color: black;
        }

        .add-button:hover {
            background-color: #e0a800;
        }

        .back-button {
            background-color: #007bff;
            color: white;
        }

        .back-button:hover {
            background-color: #0056b3;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .modal-buttons {
            margin-top: 20px;
        }

        .confirm-button {
            background-color: #d9534f;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .confirm-button:hover {
            background-color: #c9302c;
        }

        .cancel-button {
            background-color: #6c757d;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .cancel-button:hover {
            background-color: #545b62;
        }
    </style>
    <script>
        function confirmDelete(event, form) {
            event.preventDefault();
            document.getElementById('confirmModal').style.display = 'flex';
            document.getElementById('confirmButton').onclick = function() {
                form.submit();
            };
        }

        function closeModal() {
            document.getElementById('confirmModal').style.display = 'none';
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Lista de Usuarios</h2>
        <table class="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="action-buttons">
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="edit-button">Editar</a>
                        <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" style="display:inline;" onsubmit="confirmDelete(event, this)">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('admin.users.create') }}" class="add-button">Añadir Usuario</a>
        <a href="{{ route('admin.dashboard') }}" class="back-button">Volver al Administrador</a>
    </div>

    <div id="confirmModal" class="modal">
        <div class="modal-content">
            <p>¿Estás seguro de que deseas eliminar este usuario?</p>
            <div class="modal-buttons">
                <button id="confirmButton" class="confirm-button">Eliminar</button>
                <button onclick="closeModal()" class="cancel-button">Cancelar</button>
            </div>
        </div>
    </div>
</body>
</html>
