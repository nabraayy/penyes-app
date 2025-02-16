<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitar Unión a Peña</title>
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

        .content {
            margin: 20px;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container {
            margin-top: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
        }

        input, select, textarea, button {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        button {
            background-color: #007BFF;
            color: white;
            border: none;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .back-button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
        }

        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<header class="header">
    <div class="logo">
        <img src="logo.jpg" alt="Logo">
    </div>
    <h1>Solicitar Unión a Peña</h1>
    <nav class="home">
        <ul class="nav-links">
            @auth
                <li class="nav-item user-name">{{ Auth::user()->name }}</li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="logout-form">
                        @csrf
                        <button type="submit" class="logout-button">Logout</button>
                    </form>
                </li>
            @endauth
        </ul>
    </nav>
</header>

<div class="content">
    <h2>Formulario de Solicitud</h2>
    <div class="form-container">
        <form action="{{ route('user.request') }}" method="POST">
            @csrf
            <label for="penya">Elige la Peña</label>
            @if ($penyas->isEmpty())
                <p>No hay peñas disponibles</p>
            @else
            <select name="penya_id" id="penya" required>
                <option value="">Seleccionar una Peña</option>
                @foreach ($penyas as $penya)
                    <option value="{{ $penya->id }}">{{ $penya->name }}</option>
                @endforeach
            </select>
            @endif

            <label for="description">Mensaje</label>
            <textarea id="description" name="description" rows="4" placeholder="Escribe un mensaje para los administradores..."></textarea>

            <button type="submit">Enviar Solicitud</button>
        </form>
    </div>
    <a href="{{ route('user.dashboard') }}" class="back-button">Volver</a>
</div>
</body>
</html>
