@extends('dashboard')

@section('content')
<h1>Lista de Peñas</h1>

<a href="{{ route('admin.penyas.create') }}" class="btn btn-primary">Crear Peña</a>

<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($penyas as $penya)
        <tr>
            <td>{{ $penya->name }}</td>
            <td>
                <a href="{{ route('admin.penyas.edit', $penya->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('admin.penyas.delete', $penya->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
