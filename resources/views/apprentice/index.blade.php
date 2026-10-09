@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold text-dark"> Lista de Aprendices</h1>
            <a href="{{ route('apprentice.registro') }}" class="btn btn-success shadow-sm">
                <i class="bi bi-plus-circle"></i> Nuevo Aprendiz
            </a>
        </div>

        <div class="card shadow-lg border-0 rounded-4">

            <div class="card-header text-white encabezado-tabla" style="background-color: #25c72f;">
                <h5 class="mb-0">Aprendices Registrados</h5>
            </div>

            <div class="card-body">

                <table id="idApprentice" class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Número de Celular</th>
                            <th>Curso</th>
                            <th>Computador</th>
                            <th class="text-center">Acciones</th>

                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($apprentices as $apprentice)
                            <tr>

                                <td>{{ $apprentice['id'] }}</td>

                                <td class="fw-semibold">
                                    {{ $apprentice['name'] }}
                                </td>

                                <td>{{ $apprentice['email'] }}</td>

                                <td>{{ $apprentice['cell_number'] }}</td>

                                {{-- Leemos directamente las llaves que responde la API --}}
                                <td>{{ $apprentice['course_id'] ?? 'N/A' }}</td>

                                <td>{{ $apprentice['computer_id'] ?? 'N/A' }}</td>

                                <td class="text-center">

                                    <a href="{{ route('apprentice.show', $apprentice['id']) }}" class="btn btn-info btn-sm me-1">
                                        Mostrar
                                    </a>
                                    <a href="{{ route('apprentice.edit', $apprentice['id']) }}" class="btn btn-warning btn-sm me-1">
                                        Editar
                                    </a>

                                    <form action="{{ route('apprentice.destroy', $apprentice['id']) }}" method="POST" class="d-inline">
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