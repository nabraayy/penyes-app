<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Peñas</title>
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

        .nav-link {
            text-decoration: none;
            color: #000000;
            font-weight: bold;
            font-size: 16px;
        }

        .nav-link:hover {
            color: #A9A9A9;
        }

        .content {
            margin: 20px;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table-container {
            margin-top: 20px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color:rgb(123, 11, 11);
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .back-button {
            padding: 10px 20px;
            background-color:rgb(0, 143, 57);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color:rgb(123, 11, 11);
        }
        .logout-button{
            font-family: canveat;
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
         <img src="{{asset('log.jpg')}}"/>
        </div>
    <nav class="home">
        <ul class="nav-links">
            @auth
                <li class="nav-item user-name">{{ Auth::user()->name }}</li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="logout-form">
                        @csrf
                        <button type="submit" class="logout-button"><span>Logout</span></button>
                    </form>
                </li>
            @endauth
        </ul>
    </nav>
</header>

<div class="content">
    <h2>Peñas y sus Miembros</h2>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Nombre de la Peña</th>
                    <th>Descripcion</th>
                    <th>Miembros</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penyas as $penya)
                <tr>
                    <td><strong>{{ $penya->name }}</strong></td>
                    <td>{{ $penya->description}}</td>
                    <td>{{ $penya->members }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ route('user.dashboard') }}" class="back-button">Volver</a>
</div>
</body>
</html>
