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
    <section class="hero">
        <img src="https://i.pinimg.com/550x/2b/50/54/2b5054e746634ef536e983cda46db5fd.jpg" alt="Hero Image">
    </section>

    @auth
    <div class="action-buttons">
        <a href="{{ route('admin.penyas.listas') }}" class="action-button">Listado de Peñas</a>
        <a href="{{ route('admin.penyas.create') }}" class="action-button">Solicitar Unión a Peña</a>
    </div>
    @endauth
    <section class="photos-section">
            <h2>Fotos tradicionales</h2>
            <div class="carousel">
                <button class="carousel-btn left">&lt;</button>
                <div class="carousel-images">
                    <img src="https://www.elheraldo.com.ec/wp-content/uploads/2024/03/FOTO-100.jpg" alt="Photo 1">
                    <img src="https://s3.ppllstatics.com/lasprovincias/www/multimedia/201809/28/media/cortadas/129454301--624x415.jpg" alt="Photo 2">
                    <img src="https://torogestion.com/wp-content/uploads/2024/05/277790319_3175403629453207_1787865433349977677_n-1080x675.jpg" alt="Photo 1">
                    <img src="https://s2.ppllstatics.com/lasprovincias/www/multimedia/202011/05/media/cortadas/154984790--1248x772.jpg" alt="Photo 2">
                </div>
                <button class="carousel-btn right">&gt;</button>
            </div>
        </section>
        <section class="program">
            <h2>Programa de fiestas</h2>
            <div class="program_pdf">
                <iframe
                    src="{{ asset('pdf/libro.pdf') }}"

                    class="pdf-frame">
                </iframe>
                <button class="program_button">Ver en Pantalla Completa</button>
            </div>
        </section>
        <section class="about-us">
            <h2>Sobre nosotros</h2>
            <div class="about-content">
                <p>Somos un grupo de peñas del pueblo, unidos por la pasión de mantener vivas nuestras tradiciones. En cada fiesta, nos encargamos de organizar actividades que fomentan la alegría, la unión y el orgullo de nuestra cultura.

                Uno de los momentos más esperados es el sorteo de carafales, donde se asignan de manera justa los espacios para disfrutar de los eventos taurinos. Este sorteo no solo es una tradición, sino también un símbolo de igualdad y convivencia en nuestra comunidad.

                Nuestro objetivo es seguir celebrando y transmitiendo estas tradiciones a las futuras generaciones, manteniendo el espíritu de nuestras fiestas vivas.
                </p>
            </div>
        </section>

    <section class="location">
        <h2>Donde Encontrarnos</h2>
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3062.9881997197826!2d-0.16296322348409323!3d39.852097489810674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd600f9b68a12811%3A0x9276403b60cb4465!2sC.%20San%20Joaquin%2C%2012520%20Nules%2C%20Castell%C3%B3n!5e0!3m2!1ses!2ses!4v1733766858957!5m2!1ses!2ses"
                allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>
</main>

<footer class="footer">
    <p>&copy; 2025 PenyApp. Todos los derechos reservados.</p>
</footer>

</body>
</html>
