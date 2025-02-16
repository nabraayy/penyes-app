<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Caveat', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f9;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #f0f0f0;
            padding: 10px 20px;
            border-bottom: 1px solid #050505;
        }

        .header .logo img {
            max-width: 140px;
            max-height: 140px;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .header .logo img:hover {
            transform: scale(1.1);
        }

        .header h1 {
            font-size: 24px;
            font-weight: 500;
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
        }

        .logout-button {
            background-color: #d9534f;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
        }

        .logout-button:hover {
            background-color: #c9302c;
        }

        .admin-table {
            width: 100%;
            max-width: 1000px;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .admin-table th, .admin-table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #dddddd;
        }

        .admin-table th {
            background-color: #f0f0f0;
            font-weight: bold;
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
            background-color: #007bff;
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
            background-color: #d9534f;
        }

        .delete-button:hover {
            background-color: #c9302c;
        }

        .edit-button {
            background-color: #28a745;
        }

        .edit-button:hover {
            background-color: #218838;
        }

        .add-button {
            background-color: #ffc107;
        }

        .add-button:hover {
            background-color: #e0a800;
        }
    </style>
</head>
<body>
<header class="header">
    <div class="logo">
        <img src="logo.jpg" alt="Logo">
    </div>
    <h1>ADMIN CONTROL</h1>
    <nav class="home">
        <ul class="nav-links">
            @auth
            <li class="nav-item user-name">{{Auth::user()->name}}</li>
            <li class="nav-item">
                <form action="{{route('logout')}}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="logout-button">Logout</button>
                </form>
            </li>

            @endauth
        </ul>
    </nav>
</header>

<main class="main-content">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Acción</th>
                <th>Descripción</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- Usuarios -->
            <tr>
                <td>Gestionar Usuarios</td>
                <td>Ver, añadir, modificar o eliminar usuarios registrados.</td>
                <td>
                    <a href="{{route('admin.users')}}" class="action-button">Ver Usuarios</a>
                </td>
            </tr>
            <!-- Peñas -->
            <tr>
                <td>Gestionar Peñas</td>
                <td>Ver, añadir, modificar o eliminar peñas creadas.</td>
                <td>
                    <a href="{{route('admin.penyas')}}" class="action-button">Ver Peñas</a>
                </td>
            </tr>
            <!-- Relación Usuarios-Peñas -->
            <tr>
                <td>Ver Usuarios ,sus Peñas </td>
                <td>Consulta a qué peña pertenece cada usuario registrado.</td>
                <td><a href="{{route('admin.relations.index')}}" class="action-button">Ver Relaciones</a></td>
            </tr>
            <!-- Solicitudes -->
            <tr>
                <td>Solicitudes</td>
                <td>Solicitudes de los usuarios a unirse a peñas</td>
                <td><a href="{{route('admin.requests')}}" class="action-button">Ver Solicitudes</a></td>
            </tr>
        </tbody>
    </table>
</main>
</body>
</html>
