<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Relación</title>
    <!-- Agrega tus estilos aquí -->
</head>
<body>

<h2>Editar Relación de Usuario y Peña</h2>

<form action="{{ route('admin.relations.update', $relation->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="user_id">Usuario:</label>
    <input type="text" id="user_id" name="user_id" value="{{ $relation->user->name }}" disabled>

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

<a href="{{ route('admin.relations') }}">Volver a las relaciones</a>

</body>
</html>
