<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Relación</title>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Caveat', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-image: url('https://img.freepik.com/vector-premium/patron-costuras-ilustracion-toros-color-negro-estilo-arte-linea-sobre-fondo-blanco_460232-1948.jpg');
        }
        .main-content {
            padding: 20px;
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }
        h2 {
            font-size: 24px;
            font-weight: 500;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input, select {
            font-family: 'Caveat', sans-serif;
            width: 95%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            background-color: #720000;
            font-family: 'Caveat', sans-serif;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            margin-top: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #b60d0d;
        }
        .back-button {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            background-color: #760000;
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .back-button:hover {
            background-color: #005512;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <main class="main-content">
        <h2>Editar Relación de Usuario y Peña</h2>
        <form action="{{ route('admin.relations.update', $relation->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <label for="user_id">Usuario:</label>
            <input type="text" id="user_id" name="user_id" value="{{ $relation->user->name ?? 'Usuario no encontrado' }}" disabled>
            
            <label for="penya_id">Peña:</label>
            <select id="penya_id" name="penya_id">
                @foreach($penyas as $penya)
                    <option value="{{ $penya->id }}" {{ $relation->penya_id == $penya->id ? 'selected' : '' }}>
                        {{ $penya->name }}
                    </option>
                @endforeach
            </select>
            
            <button type="submit">Actualizar Relación</button>
        </form>
        <a href="{{ route('admin.relations.index') }}" class="back-button">Volver a las relaciones</a>
    </main>
</body>
</html>
