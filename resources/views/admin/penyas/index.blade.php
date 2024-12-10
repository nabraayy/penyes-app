@extends('dashboard')

@section('content')
<h1>Lista de Peñas</h1>

<a href="{{ route('penyas.create') }}" class="btn btn-primary">Crear Peña</a>

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
                <a href="{{ route('penyas.edit', $penya->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('penyas.destroy', $penya->id) }}" method="POST" style="display:inline;">
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
