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
            align-items: center;
            justify-content: space-between;
            background-color: #f0f0f0;
            padding: 10px 20px;
            border-bottom: 1px solid #050505;
        }

        .header .logo img {
            max-width: 120px;
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

        .logout-button {
            background-color: #d9534f;
            color: white;
            padding: 5px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .logout-button:hover {
            background-color: #c9302c;
        }

        /* Hero section */
        .hero {
            text-align: center;
            margin: 20px 0;
        }

        .hero img {
            width: 90%;
            border-radius: 10px;
        }
        /* photos*/
        .photos-section {
            text-align: center;
            padding: 40px;
        }

        .carousel {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            width: 80%;
            margin: 0 auto;
        }

        .carousel-btn {
            background-color: #ddd;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 50%;
            font-size: 18px;
            z-index: 10;
        }

        .carousel-images {
            display: flex;
            transition: transform 0.5s ease-in-out;
            width: 100%;
        }

        .carousel-images img {
            width: 500px;
            height: auto;
            border-radius: 10px;
            border: 1px solid #ccc;
            margin-right: 20px;
        }

        /* Program section */
        .program {
            text-align: center;
            position: relative;
            padding: 20px;
        }

        .program_pdf {
            position: relative;
            display: inline-block;
            width: 80%;
            max-width: 800px;
            height: 400px;
            overflow: hidden;
            transition: all 0.3s ease-in-out;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background: #f9f9f9;
        }

        .program_pdf.expanded {
            position: fixed;
            top: 50%;
            left: 50%;
            width: 90%;
            height: 90vh;
            transform: translate(-50%, -50%);
            z-index: 9999;
            background: #fff;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .pdf-frame {
            width: 100%;
            height: 100%;
            border: none;
        }

        .program_button {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.2s;
        }

        .program_button:hover {
            background-color: #0056b3;
        }
        /* Buttons Section */
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 20px 0;
        }

        .action-button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .action-button:hover {
            background-color: #0056b3;
        }

        /* About us section */
        .about-us {
            text-align: center;
            padding: 20px;
            background-color: #f0f0f0;
            border-radius: 10px;
            margin: 20px auto;
            width: 90%;
        }

        .about-us p {
            font-size: 1rem;
            line-height: 1.6;
            color: #333;
        }

        /* Map Section */
        .location {
            text-align: center;
            padding: 20px;
        }

        .map-container iframe {
            width: 90%;
            height: 400px;
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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

<main>
    

    @auth
    <div class="action-buttons">
        <a href="{{ route('user.listado') }}" class="action-button">Listado de Peñas</a>
        <a href=" {{route('user.request')}} " class="action-button">Solicitar Unión a Peña</a>
        <a href=" {{route('user.lottery')}} " class="action-button">Ver sorteo</a>
    </div>
    @endauth
    
    <div>
    <h3>Estado de tus Solicitudes</h3>
    @if(auth()->user()->requests->isNotEmpty())
        <ul>
            @foreach(auth()->user()->requests as $request)
                <li>
                    Tu solicitud para "<strong>{{ $request->penya->name }}</strong>" está:
                    <strong>
                        @if($request->status == 'pending')
                            <span style="color: orange;">Pendiente</span>
                        @elseif($request->status == 'accepted')
                            <span style="color: green;">Aceptada</span>
                        @else
                            <span style="color: red;">Rechazada</span>
                        @endif
                    </strong>
                </li>
            @endforeach
        </ul>
    @else
        <p>No tienes solicitudes pendientes.</p>
    @endif
</div>

        

    
</main>

<footer class="footer">
    <p>&copy; 2025 PenyApp. Todos los derechos reservados.</p>
</footer>

</body>
</html>
