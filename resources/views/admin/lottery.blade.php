<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteo del Carafal</title>
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

        .header h1 {
            font-size: 24px;
            font-weight: 500;
        }

        .content {
            margin: 20px;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            text-align: center;
            font-size: 30px;
            margin-bottom: 20px;
        }

        .participants-list {
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }

        .participant {
            padding: 10px;
            background-color:rgb(147, 52, 236); /* Verde para diferenciarlo */
            color: white;
            font-weight: bold;
            border-radius: 8px;
            text-align: center;
            width: 150px;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(9, 1fr);
            grid-template-rows: repeat(6, 150px);
            gap: 20px;
            justify-items: center;
            align-items: center;
            margin-top: 20px;
        }

        .grid-item {
            width: 100px;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
            border: 1px solid #ddd;
            font-weight: bold;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .grid-item:hover {
            background-color: #d6d6d6;
            transform: scale(1.05);
        }

        .button-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        .sort-button, .back-button {
            padding: 10px 20px;
            background-color: #007BFF; /* Azul */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            text-align: center;
            margin: 5px;
            width: 200px;
        }

        .sort-button:hover, .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<header class="header">
    <div class="logo">
        <img src="logo.jpg">
    </div>
    <h1>Sorteo del Carafal</h1>
</header>

<div class="content">
    <h2>Participantes en el Sorteo</h2>

    <!-- Mostrar la lista de participantes -->
    @if(isset($penyas) && $penyas->count() > 0)
    @foreach ($penyas as $penya)
        <div class="participant">
            {{ $penya->name }}
        </div>
    @endforeach
    @else
        <p>No hay participantes en el sorteo.</p>
    @endif

    <!-- Botón para realizar el sorteo debajo de los participantes -->
    <!-- Mostrar el botón solo si el usuario tiene el rol de 'admin' -->
    @if(auth()->user() && auth()->user()->role_id == \App\Models\Role::ADMIN)
        <form action="{{ route('lottery.draw') }}" method="POST">
            @csrf
            <input type="hidden" name="year" value="{{ $year }}">
            <button type="submit" class="btn btn-primary">Realizar Sorteo</button>
        </form>
    @endif




    <!-- Cuadrícula 9x6 para el sorteo -->
    <div class="grid-container">
        @for ($i = 0; $i < 54; $i++)
            <div class="grid-item">
                @isset($places[$i])
                    {{ $penyas[$i]->name }}
                @endisset
            </div>
        @endfor
    </div>

    <!-- Botón para volver al dashboard, dependiendo del rol del usuario -->
        <!-- Redirigir dependiendo del rol del usuario -->
    <div class="button-container">
        @if(auth()->user()->role_id == \App\Models\Role::ADMIN)
            <a href="{{ route('admin.dashboard') }}" class="back-button">Volver al Panel de Admin</a>
        @else
            <a href="{{ route('user.dashboard') }}" class="back-button">Volver a Mi Perfil</a>
        @endif
    </div>


</div>

</div>

</body>
</html>
