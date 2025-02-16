<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Peña</title>
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

        .main-content {
            padding: 20px;
            max-width: 800px;
            margin: 20px auto;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            font-size: 24px;
            font-weight: 500;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 16px;
            font-weight: bold;
        }

        input[type="text"], input[type="email"], textarea {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            transition: border 0.3s ease;
        }

        input[type="text"]:focus, input[type="email"]:focus, textarea:focus {
            border-color: #007bff;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .submit-button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            align-self: flex-start;
        }

        .submit-button:hover {
            background-color: #218838;
        }

        .cancel-button {
            background-color: #f0f0f0;
            color: #333;
            border: 1px solid #ccc;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            align-self: flex-start;
        }

        .cancel-button:hover {
            background-color: #e0e0e0;
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
            @endauth
        </ul>
    </nav>
</header>

<main class="main-content">
    <h2>Modificar Peña</h2>
    <form action="{{ route('admin.penyas.update', ['id' => $penya->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre de la Peña</label>
            <input type="text" id="name" name="name" value="{{ old('name', $penya->name) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea id="description" name="description" rows="4" required>{{ old('description', $penya->description) }}</textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="submit-button">Guardar Cambios</button>
            <a href="{{ route('admin.penyas') }}" class="cancel-button">Cancelar</a>
        </div>
    </form>
</main>
</body>
</html>
