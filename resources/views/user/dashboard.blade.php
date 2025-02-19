<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penyas App</title>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* General styles */
        body {
            font-family: 'Caveat', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f9;
        }

        /* Header styles */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f0f0f0;
            padding: 10px 20px;
            border-bottom: 1px solid #050505;
        }

        .header .logo img {
            max-width: 70px;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .header .logo img:hover {
            transform: scale(1.1);
        }

        .header h1 {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .nav-links {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 15px;
        }

        .nav-link {
            text-decoration: none;
            color: #000;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #666;
        }

        /* Navbar section */
        .navbar {
            display: flex;
            justify-content: center;
            gap: 15px;
            background-color: #007bff;
            padding: 10px;
            border-radius: 8px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .navbar a:hover {
            background-color: #0056b3;
        }

        .navbar .request-status {
            color: white;
            font-weight: bold;
            padding: 8px 16px;
            border-radius: 5px;
        }

        .request-status.pending {
            background-color: orange;
        }

        .request-status.accepted {
            background-color: green;
        }

        .request-status.rejected {
            background-color: red;
        }

        /* Footer */
        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: 20px;
        }

    </style>
</head>
<body>

<header class="header">
    <div class="logo">
        <img src="logo.jpg" alt="Logo">
    </div>
    <h1>Penyas App</h1>
    <nav>
        <ul class="nav-links">
            @auth
                <li><span>{{ Auth::user()->name }}</span></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="logout-button">Logout</button>
                    </form>
                </li>
            @else
                <li><a href="/register" class="nav-link">Register</a></li>
                <li><a href="/login" class="nav-link">Login</a></li>
            @endauth
        </ul>
    </nav>
</header>

<!-- Navigation Bar below the header with request status -->
<div class="navbar">
    @auth
        <a href="{{ route('user.listado') }}">Listado de Peñas</a>
        <a href="{{ route('user.request') }}">Solicitar Unión a Peña</a>
        <a href="{{ route('admin.lottery') }}">Ver Sorteo</a>
        <!-- Display the request status here -->
        @if(auth()->user()->requests->isNotEmpty())
            @foreach(auth()->user()->requests as $request)
                <div class="request-status 
                    {{ $request->status == 'pending' ? 'pending' : '' }}
                    {{ $request->status == 'accepted' ? 'accepted' : '' }}
                    {{ $request->status == 'rejected' ? 'rejected' : '' }}">
                    Solicitud {{ $request->status == 'pending' ? 'Pendiente' : ($request->status == 'accepted' ? 'Aceptada' : 'Rechazada') }}
                </div>
            @endforeach
        @else
            <div class="request-status">No tienes solicitudes pendientes</div>
        @endif
    @endauth
</div>



<footer class="footer">
    <p>&copy; 2025 PenyApp. Todos los derechos reservados.</p>
</footer>

</body>
</html>
