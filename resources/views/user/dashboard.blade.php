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
            background-image: url('https://img.freepik.com/vector-premium/patron-costuras-ilustracion-toros-color-negro-estilo-arte-linea-sobre-fondo-blanco_460232-1948.jpg');
        }

        /* Header styles */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgb(127, 0, 0);
            padding: 10px 20px;
            color:white;
            border-bottom: 3px solid #050505;
        }

        .header .logo img {
            max-width: 100px; 
            max-height: 100px; 
            border-radius: 10%; 
            box-shadow: 0 8px 12px rgba(4, 3, 3, 0.2);
            transition: transform 0.3s ease; 
        }

        .header .logo img:hover {
            transform: scale(1.1);
        }

        .header h1 {
            font-size: 24px;
            font-weight: bold;
            color: #fff;
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
            color: #fff;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #ddd;
        }

        .navbar {
            display: flex;
            justify-content: center;
            gap: 15px;
            background-color: rgb(5, 90, 0);
            padding: 10px;
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
            background-color: rgb(0, 114, 0);
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

        /* Footer styles */
        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 20px;
        }

        /* New section styles */
        .history-section, .events-section, .testimonials-section, .gallery-section, .contact-section {
            background-color: #ffffff;
            padding: 40px 20px;
            margin-top: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .history-section h2, .events-section h2, .testimonials-section h2, .gallery-section h2, .contact-section h2 {
            font-size: 26px;
            margin-bottom: 20px;
            font-weight: bold;
            color: #333;
        }

        .history-section p, .testimonials-section p {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
        }

        .event-card {
            background-color: #fff;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .event-card h3 {
            font-size: 18px;
            margin: 0;
        }

        .event-card p {
            font-size: 14px;
            color: #777;
        }

        .testimonials-section blockquote {
            border-left: 4px solid #888;
            padding-left: 15px;
            font-style: italic;
            color: #555;
        }

        .gallery-section img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }

        .contact-section form {
            display: flex;
            flex-direction: column;
        }

        .contact-section input, .contact-section textarea {
            padding: 12px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .contact-section button {
            background-color: #127B00;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .contact-section button:hover {
            background-color: #0a5c00;
        }

        /* Carousel styles */
        .carousel-container {
            position: relative;
            width: 100%;
            overflow: hidden;
            margin: 40px 0;
        }

        .carousel-images {
            display: flex;
            transition: transform 0.5s ease;
        }

        .carousel-images img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            z-index: 10;
            font-size: 24px;
        }

        .carousel-btn.left {
            left: 10px;
        }

        .carousel-btn.right {
            right: 10px;
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
        <img src="{{asset('img/log.jpg')}}" alt="Logo">
    </div>
    <nav>
        <ul class="nav-links">
            @auth
                <li><span>{{ Auth::user()->name }}</span></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="logout-form">
                        @csrf
                        <button type="submit" class="logout-button"><span>Logout</span></button>
                    </form>
                </li>
            @else
                <li><a href="/register" class="nav-link">Register</a></li>
                <li><a href="/login" class="nav-link">Login</a></li>
            @endauth
        </ul>
    </nav>
</header>

<div class="navbar">
    @auth
        <a href="{{ route('dashboard') }}">Home</a>
        <a href="{{ route('user.listado') }}">Listado de Peñas</a>
        <a href="{{ route('user.request') }}">Solicitar Unión a Peña</a>
        <a href="{{ route('admin.lottery') }}">Ver Sorteo</a>
        <a href="{{ route('user.profile') }}">Perfil</a>
        <?php $request=auth()->user()->requests->last(); ?>
        @if(!is_null($request))
            <div class="request-status 
                {{ $request->status == 'pending' ? 'pending' : '' }}
                {{ $request->status == 'accepted' ? 'accepted' : '' }}
                {{ $request->status == 'rejected' ? 'rejected' : '' }}">
                Solicitud {{ $request->status == 'pending' ? 'Pendiente' : ($request->status == 'accepted' ? 'Aceptada' : 'Rechazada') }}
            </div>
        @else
            <div class="request-status">No tienes solicitudes pendientes</div>
        @endif
    @endauth
</div>

<section class="history-section">
    <h2>Historia de las Peñas Taurinas</h2>
    <p>Las peñas taurinas han jugado un papel fundamental en la cultura taurina, reuniendo a aficionados para celebrar la tradición de las corridas de toros y otros eventos relacionados. A lo largo de los años, las peñas se han convertido en puntos de encuentro donde los amantes del toro disfrutan de momentos únicos y comparten su pasión.</p>
</section>

<section class="events-section">
    <h2>Calendario de Eventos</h2>
    <div class="event-card">
        <h3>Fiesta Taurina de Primavera</h3>
        <p>Fecha: 10 de marzo, 2025</p>
        <p>Descripción: Una fiesta que reúne a las mejores peñas para una tarde de festejos taurinos.</p>
    </div>
    <div class="event-card">
        <h3>Gran Corrida de Toros</h3>
        <p>Fecha: 25 de abril, 2025</p>
        <p>Descripción: La mayor corrida del año, con toreros de renombre y una gran celebración.</p>
    </div>
</section>

<section class="testimonials-section">
    <h2>Testimonios de los Miembros</h2>
    <blockquote>
        "Unirme a la Peña Taurina fue una de las mejores decisiones de mi vida. He hecho grandes amigos y vivido experiencias únicas." - Juan Pérez
    </blockquote>
    <blockquote>
        "La tradición de las peñas me ha dado una conexión más profunda con la cultura taurina. ¡Es un ambiente increíble!" - María Rodríguez
    </blockquote>
</section>

<section class="gallery-section">
    <h2>Galería de Imágenes</h2>
    <div class="carousel-container">
        <div class="carousel-images">
            <img src="https://www.elheraldo.com.ec/wp-content/uploads/2024/03/FOTO-100.jpg" alt="Evento 1">
            <img src="https://s3.ppllstatics.com/lasprovincias/www/multimedia/201809/28/media/cortadas/129454301--624x415.jpg" alt="Evento 2">
            <img src="https://torogestion.com/wp-content/uploads/2024/05/277790319_3175403629453207_1787865433349977677_n-1080x675.jpg" alt="Evento 3">
        </div>
        <button class="carousel-btn left">&#10094;</button>
        <button class="carousel-btn right">&#10095;</button>
    </div>
</section>

<footer class="footer">
    <p>&copy; 2025 PenyApp. Todos los derechos reservados.</p>
</footer>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const carouselImages = document.querySelector(".carousel-images");
    const leftButton = document.querySelector(".carousel-btn.left");
    const rightButton = document.querySelector(".carousel-btn.right");

    let index = 0;

    function updateCarousel() {
        const imageWidth = carouselImages.children[0].clientWidth;
        carouselImages.style.transform = `translateX(${-index * imageWidth}px)`;
    }

    rightButton.addEventListener("click", () => {
        if (index < carouselImages.children.length - 1) {
            index++;
        } else {
            index = 0;
        }
        updateCarousel();
    });

    leftButton.addEventListener("click", () => {
        if (index > 0) {
            index--;
        } else {
            index = carouselImages.children.length - 1;
        }
        updateCarousel();
    });

    // Auto-slide every 3 seconds
    setInterval(() => {
        if (index < carouselImages.children.length - 1) {
            index++;
        } else {
            index = 0;
        }
        updateCarousel();
    }, 3000);
});
</script>

</body>
</html>
