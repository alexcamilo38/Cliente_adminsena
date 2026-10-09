@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold text-dark"> Lista de Áreas</h1>
            <a href="{{ route('areas.create') }}" class="btn btn-success shadow-sm">
                <i class="bi bi-plus-circle"></i> Nueva Área
            </a>
        </div>

        <div class="card shadow-lg border-0 rounded-4">

            <div class="card-header text-white encabezado-tabla" style="background-color: #25c72f;">
                <h5 class="mb-0">Áreas Registradas</h5>
            </div>

            <div class="card-body">

                <table id="idArea" class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th class="text-center">Acciones</th>

                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($areas as $area)
                            <tr>

                                <td>{{ $area['id'] }}</td>

                                <td class="fw-semibold">
                                    {{ $area['name'] }}
                                </td>

                                <td class="text-center">

                                    <a href="{{ route('areas.show', $area['id']) }}" class="btn btn-info btn-sm me-1">
                                        Mostrar
                                    </a>
                                    <a href="{{ route('areas.edit', $area['id']) }}" class="btn btn-warning btn-sm me-1">
                                        Editar
                                    </a>

                                    <form action="{{ route('areas.destroy', $area['id']) }}" method="POST" class="d-inline">

                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Eliminar
                                        </button>

                                    </form>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>
@endsection
