<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="logo1.jpg" alt="Logo">
        </div>
        <h1>HOME PAGE</h1>
<nav class="home">
    <ul>
        @auth
            
            <ol>{{ Auth::user()->name }}</ol>
            
            
            <ol>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a href="/logout">Logout</button>
                </form>
            </ol>
        @else
            
            <ol><a href="/register">Register</a></ol>
            <ol><a href="/login">Login</a></ol>
        @endauth
    </ul>
</nav>

    </header>

    <main>
        <section class="hero">
            <h2 class="slogan">Hero Slogan</h2>
            <img src="group-placeholder.png" alt="Group of people" class="hero-image">
        </section>

        <section class="photos-section">
            <h3>Photos about this tradition</h3>
            <div class="carousel">
                <button class="carousel-btn left">&lt;</button>
                <div class="carousel-images">
                    <img src="photo1-placeholder.png" alt="Photo 1">
                    <img src="photo2-placeholder.png" alt="Photo 2">
                </div>
                <button class="carousel-btn right">&gt;</button>
            </div>
        </section>

        <section class="program">
            <h3>Program</h3>
            <table>
                <tr>
                    <td>Program 1</td>
                    <td>Program 2</td>
                    <td>Program 3</td>
                </tr>
            </table>
        </section>

        <section class="about-us">
            <h3>About Us</h3>
            <div class="about-content">
                <p>Information about us...</p>
            </div>
        </section>

        <section class="location">
            <h3>Localization</h3>
            <div class="map-container">
                <div class="map-placeholder">
                    <span>Map Placeholder</span>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <p>FOOTER</p>
    </footer>
</body>
</html>
<style>
    a{
        color: #333;
    }
    
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

h1, h2, h3 {
    margin: 0;
    color: #333;
}

p {
    margin: 0;
}


.header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #f0f0f0;
    padding: 10px 20px;
    border-bottom: 1px solid #ccc;
}

.header .logo img {
    width: 40px;
    height: 40px;
}

.header h1 {
    font-size: 24px;
}


.hero {
    text-align: center;
    padding: 20px;
}

.hero .slogan {
    font-size: 18px;
    margin-bottom: 10px;
}

.hero-image {
    width: 80%;
    max-width: 400px;
    border-radius: 10px;
}


.photos-section {
    text-align: center;
    padding: 20px;
}

.carousel {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.carousel-btn {
    background-color: #ddd;
    border: none;
    padding: 10px;
    cursor: pointer;
    border-radius: 50%;
    font-size: 18px;
}

.carousel-images img {
    width: 100px;
    height: auto;
    border-radius: 10px;
    border: 1px solid #ccc;
}


.program {
    text-align: center;
    padding: 20px;
}

.program table {
    width: 80%;
    margin: 0 auto;
    border-collapse: collapse;
}

.program td {
    border: 1px solid #ccc;
    padding: 20px;
    text-align: center;
    background-color: #f9f9f9;
}


.about-us {
    padding: 20px;
    text-align: center;
}

.about-content {
    background-color: #f0f0f0;
    padding: 20px;
    border-radius: 10px;
    height: 100px;
    width: 80%;
    margin: 0 auto;
}


.location {
    text-align: center;
    padding: 20px;
}

.map-container {
    display: flex;
    justify-content: center;
    align-items: center;
}

.map-placeholder {
    width: 300px;
    height: 150px;
    border: 2px dashed #ccc;
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f9f9f9;
}
.logo{
    margin: 10px;
    padding: 10px;
    width: 50px;
    height: 50px;
}


.footer {
    background-color: #d3eaff;
    text-align: center;
    padding: 10px;
}

</style>