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
            background-image: url('https://img.freepik.com/vector-premium/patron-costuras-ilustracion-toros-color-negro-estilo-arte-linea-sobre-fondo-blanco_460232-1948.jpg');
        }

        .header {
            display: flex;
            color:white;
            align-items: center;
            justify-content: space-between;
            background-color:rgb(113, 0, 0);
            background-size: contain; 
            padding: 10px 20px;
            border-bottom: 1px solid #050505;
        }

        .header .logo img {
            max-width: 100px; 
            max-height: 100px; 
            border-radius: 10%; 
            box-shadow: 0 8px 12px rgba(4, 3, 3, 0.1); /* Agregamos una sombra suave */
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
            font-family: 'Caveat', cursive;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        button {
            background-color: #780000;
            color: white;
            border: none;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0e7a00;
        }

        .back-button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #017001;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
        }

        .back-button:hover {
            background-color: #008c1c;
        }
         .logout-button{
            font-family: 'Caveat', cursive;
            border-radius:4px;
            background-color:rgb(0, 103, 14);
            color:white;
            border: none;
            text-align: center;
            font-size: 18px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 10px;
        }
        .logout-button span{
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }
        .logout-button span:after{
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }
        .logout-button:hover span{
            padding-right: 25px;
        }
        .logout-button:hover span:after{
            opacity: 1;
             right: 0;
        }
    </style>
</head>
<body>
<header class="header">
    <div class="logo">
        <img src="{{asset('log.jpg')}}" alt="Logo">
    </div>
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
