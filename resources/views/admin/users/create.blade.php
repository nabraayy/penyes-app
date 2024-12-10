@extends('dashboard')

@section('content')
<h1>Crear Usuario</h1>

<form action="{{ route('admin.users.create') }}" method="POST">
    @csrf
    <label for="name">Nombre:</label>
    <input type="text" name="name" id="name" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password" required>

    <button type="submit">Guardar</button>
</form>
@endsection
