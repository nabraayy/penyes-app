<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Enlace a la fuente de Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

    <header class="header">
        <div class="logo">
            <img src="log.jpg" alt="Logo">
        </div>
        <h1>PENYAS APP</h1>
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
                    
                    <div class="menu-container"> 
                        <button class="menu-button" onclick="toggleMenu()"><img width="30" height="30" src="https://img.icons8.com/sf-black/64/bull.png" alt="bull"/></button>
                        <div class="menu" id="menu">
                        <li class="nav-item"><a href="/register" class="nav-link">Register</a></li>
                        <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
                            <a href="#">Fotos</a>
                            <a href="#">Programa</a>
                            <a href="#">Sobre Nosotros</a>
                            <a href="#">Ubicación</a>

                        </div>
                    </div>
                   
                @endauth
            </ul>
        </nav>
       
    </header>

    <main>
        <section class="hero">
            <img src="https://i.pinimg.com/550x/2b/50/54/2b5054e746634ef536e983cda46db5fd.jpg" class="hero-image">
            <div class="hero-text">
                <h1>Bienvenido a las penyas!</h1>
            </div>
        </section>


        <section class="photos-section">
            <h2>Fotos tradicionales</h2>
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
                <div class="action-buttons">
           
        </div>
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

<style>
/* General styles */
body {
    font-family: 'Caveat', sans-serif;  /* Usando la fuente Roboto */
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background-color: #f4f4f9;  /* Fondo suave */
}
/* menu */
.menu-container{
    position: relative
    display:inline-block;
}
.menu-button{
    color:black;
    padding:5px 5px;
    cursor: pointer;
    border-radius: 6px; 
}
.menu{
    display:none;
    position:absolute;
    background-color: #f4f4f4;
    min-width: 50px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    overflow: hidden;
}
.menu a {
    color: black;
    padding: 10px;
    text-decoration: none;
    display: block;
}
.menu a:hover {
    background-color: #f1f1f1;
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
    max-width: 100px; /* Ajustamos el tamaño máximo */
    max-height: 100px; /* Ajustamos la altura máxima */
    border-radius: 10%; /* Hacemos la imagen redonda */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Agregamos una sombra suave */
    transition: transform 0.3s ease; /* Animación para el hover */
}

.header .logo img:hover {
    transform: scale(1.1); /* Efecto al hacer hover: aumenta el tamaño */
}

/* Header title */
.hero-text {
    font-size: 35px;
    font-weight: 500;
    position: absolute;
    bottom: -110px;
    right:20px;
    text-align: right;
      /* Peso medio */
}

/* Navigation styles */
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

.user-name {
    font-size: 18px;
    font-weight: 600;
    color: #333;
}

.logout-button {
    background-color: #DCDCDC;
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

.logout-button:hover {
    background-color: #c82333;
}

.logout-form {
    display: inline;
}

/* Hero section */
.hero {
    text-align: center;
    padding: 20px;
}

.hero-image {
    width: 90%;
    max-width: 100%;
    border-radius: 10px;
}

/* Photos section */
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

/* About Us section */
.about-us {
    padding: 20px;
    text-align: center;
    width: 100%;
}

.about-content {
    background-color: #f0f0f0;
    padding: 20px;
    border-radius: 10px;
    width: 90%;
    max-width: 900px;
    margin: 0 auto;
    box-sizing: border-box;
}

.about-us h3 {
    margin-bottom: 20px;
    font-size: 1.8rem;
    color: #333;
}

.about-content p {
    font-size: 1rem;
    line-height: 1.6;
    color: #555;
    word-wrap: break-word;
    text-align: justify;
}

/* Location section */
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



#map {
    width: 90%;
    max-width: 1200px;
    height: 500px; /* Ajusta la altura del mapa */
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background-color: #f0f0f0;
}

/* Footer */
.footer {
    background-color: #d3eaff;
    text-align: center;
    padding: 10px;
}
</style>

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


document.addEventListener('DOMContentLoaded', () => {
    const programPdf = document.querySelector('.program_pdf');
    const programButton = document.querySelector('.program_button');

    programButton.addEventListener('click', () => {
        programPdf.classList.toggle('expanded');
        if (programPdf.classList.contains('expanded')) {
            programButton.textContent = 'Cerrar Visor Completo';
        } else {
            programButton.textContent = 'Ver en Pantalla Completa';
        }
    });
});

function initMap() {
        // Coordenadas de ejemplo (puedes cambiar estas por las que desees)
        const mapLocation = { lat: 39.8536, lng: -0.1564 };  // Coordenadas de ejemplo (Nueva York)

        // Crear el mapa dentro del div con id="map"
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 12,  // Nivel de zoom
            center: mapLocation  // Centro del mapa
        });

        // Crear un marcador en el mapa
        new google.maps.Marker({
            position: mapLocation,  // Ubicación del marcador
            map: map,  // Mapa donde se coloca el marcador
            title: "Sant Juaquin"  // Título del marcador
        });
    }

    //funcion menu
    function toggleMenu(){
        var menu =document.getElementById("menu");
        menu.style.display=(menu.style.display === "block") ? "none" :"block";
    }
   
    
</script>
