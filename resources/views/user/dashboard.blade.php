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
            background-color:rgb(127, 0, 0);
            padding: 10px 20px;
            color:white;
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
            background-color:rgb(5, 90, 0);
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
            background-color:rgb(0, 114, 0);
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

    </style>
</head>
<body>

<header class="header">
    <div class="logo">
        <img src="log.jpg" alt="Logo">
    </div>
    <nav>
        <ul class="nav-links">
            @auth
                <li><span>{{ Auth::user()->name }}</span></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
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
<body>
<!-- Navigation Bar below the header with request status -->
<div class="navbar">
    @auth
        <a href="{{ route('dashboard') }}">Home</a>
        <a href="{{ route('user.listado') }}">Listado de Peñas</a>
        <a href="{{ route('user.request') }}">Solicitar Unión a Peña</a>
        <a href="{{ route('admin.lottery') }}">Ver Sorteo</a>
        <a href="{{ route('user.profile') }}">Perfil</a>
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

<section class="photos-section">
            <h2>Fotos de las penyas</h2>
            <div class="carousel">
                <button class="carousel-btn left">&lt;</button> 
                <div class="carousel-images">
                    <img src="https://www.elheraldo.com.ec/wp-content/uploads/2024/03/FOTO-100.jpg" alt="Photo 1">
                    <img src="https://s3.ppllstatics.com/lasprovincias/www/multimedia/201809/28/media/cortadas/129454301--624x415.jpg" alt="Photo 2">
                    <img src="https://torogestion.com/wp-content/uploads/2024/05/277790319_3175403629453207_1787865433349977677_n-1080x675.jpg" alt="Photo 3">
                    <img src="https://s2.ppllstatics.com/lasprovincias/www/multimedia/202011/05/media/cortadas/154984790--1248x772.jpg" alt="Photo 4">
                    <img src="https://nules.org/wp-content/uploads/2023/08/1er-PREMI-MILLOR-DISFRESSA-PENYA-XUPLIT-scaled.jpg">
                    <img src="https://estaticos-cdn.prensaiberica.es/clip/03d88057-8e0f-4b3e-905c-96c0876b4221_16-9-discover-aspect-ratio_default_0.jpg">
                    <img src="https://www.burladero.tv/u/fotografias/m/2020/7/18/f1280x720-165617_297292_5050.jpeg">
                    <img src="https://s1.elespanol.com/2023/08/13/castilla-y-leon/region/salamanca/786431535_235332176_1706x1280.jpg">
                    <img src="https://www.elperiodic.com/archivos/imagenes/noticias/2022/09/16/snm-0421.JPG">
                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhjMco-2O6_LsHfm11_l5s2Fb30sgYmANqio-kJiOhgAjnSfZndjD07_VvuRjRWeuk7f8BywgBEDAc2W1v5e8ekyzJVdGCGFnR6IeN3z4t1TaFKeLu4Oa25kvtQ4epfq_k9l0frkLAHtPvE/s1600/TORO+PALHA+N%25C2%25BA+598+G-2+SANT+XOTXIM+2016++NULES+%2528CASTELL%25C3%2593N%2529.jpg">
                    <img src="https://www.elperiodic.com/archivos/imagenes/noticias/2022/09/16/snm-0631.JPG">
                </div>
                <button class="carousel-btn right">&gt;</button>
            </div>
        </section>
</body>


<footer class="footer">
    <p>&copy; 2025 PenyApp. Todos los derechos reservados.</p>
</footer>

</body>
</html>
<script>
document.addEventListener("DOMContentLoaded", () => {
    const carouselImages = document.querySelector(".carousel-images");
    const leftButton = document.querySelector(".carousel-btn.left");
    const rightButton = document.querySelector(".carousel-btn.right");

    let index = 0;

    function updateCarousel() {
        const imageWidth = carouselImages.children[0].clientWidth + 20;
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

    // Pase automático
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
