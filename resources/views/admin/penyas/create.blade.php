<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Peña</title>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Caveat', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-image: url('https://img.freepik.com/vector-premium/patron-costuras-ilustracion-toros-color-negro-estilo-arte-linea-sobre-fondo-blanco_460232-1948.jpg');
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            box-shadow: 0 40px 50px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input, textarea {
            font-family: 'Caveat', sans-serif;
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            align-items: center;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #680000;
            font-family: 'Caveat', sans-serif;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #218838;
        }

        .back-button {
            display: block;
            text-align: center;
            margin-top: 20px;
            background-color: #00720b;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
        }

        .back-button:hover {
            background-color: #00971c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Añadir Nueva Peña</h2>
        <form action="{{ route('admin.penyas.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nombre de la Peña" required>
            <textarea name="description" placeholder="Descripción" rows="4" required></textarea>
            <button type="submit">Añadir Peña</button>
        </form>
        <a href="{{ route('admin.dashboard') }}" class="back-button">Volver a Peñas</a>
    </div>
</body>
</html>
