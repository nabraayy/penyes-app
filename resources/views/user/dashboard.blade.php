<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&display=swap" rel="stylesheet">
    <style>
       body {
        font-family: 'Caveat', sans-serif;  /* Usando la fuente Roboto */
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-color: #f4f4f9;  /* Fondo suave */
        }

        /* Header styles */
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #f0f0f0;
            padding: 10px 20px;
            border-bottom: 1px solid #050505;
        }

        .header .logo img {
            max-width: 140px; /* Ajustamos el tamaño máximo */
            max-height: 140px; /* Ajustamos la altura máxima */
            border-radius: 50%; /* Hacemos la imagen redonda */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Agregamos una sombra suave */
            transition: transform 0.3s ease; /* Animación para el hover */
        }

        .header .logo img:hover {
            transform: scale(1.1); /* Efecto al hacer hover: aumenta el tamaño */
        }

        /* Header title */
        .header h1 {
            font-size: 24px;
            font-weight: 500;  /* Peso medio */
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
                    <li class="nav-item user-name">{{ Auth::user()->name }}</li>

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="logout-form">
                            @csrf
                            <button type="submit" class="logout-button">Logout</button>
                        </form>
                    </li>
                @else

                @endauth
            </ul>
        </nav>
    </header>
</body>
</html>
