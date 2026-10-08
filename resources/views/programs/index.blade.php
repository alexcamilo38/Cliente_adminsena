@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold text-dark">Lista de Programas</h1>
        </div>

        <div class="card shadow-lg border-0 rounded-4">

            <div class="card-header text-white encabezado-tabla" style="background-color: #25c72f;">
                <h5 class="mb-0">Programas Registrados</h5>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table id="idProgram" class="table table-hover align-middle mb-0">

                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Tipo</th>
                                <th>Duración</th>
                                <th>Modalidad</th>
                                <th>Área</th>
                                <th>Imagen</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($programs as $program)
                                <tr>

                                    <td>{{ $program['id'] }}</td>

                                    <td class="fw-semibold">
                                        {{ $program['name'] }}
                                    </td>

                                    <td class="small text-muted"
                                        style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        {{ $program['description'] }}
                                    </td>

                                    <!-- Campo Tipo Resaltado -->
                                    <td>
                                        <span class="badge bg-light text-dark border shadow-sm px-2 py-1 fs-6 fw-normal">
                                            <i class="bi bi-award-fill text-primary me-1"></i>{{ $program['type'] }}
                                        </span>
                                    </td>

                                    <td>{{ $program['duration'] }}</td>

                                    <td>{{ $program['modality'] }}</td>

                                    <td>{{ $program['area_id'] ?? 'N/A' }}</td>

                                    <td>
                                        @if (!empty($program['urlFoto']))
                                            <img src="{{ asset('storage/images/' . $program['urlFoto']) }}"
                                                alt="Imagen del programa" width="50" height="50"
                                                style="object-fit: cover; border-radius: 5px;">
                                        @else
                                            <span class="text-muted small">Sin foto</span>
                                        @endif
                                    </td>

                                    <td class="text-center">

                                        <a href="{{ route('programs.show', $program['id']) }}"
                                            class="btn btn-info btn-sm me-1 text-white">
                                            Mostrar
                                        </a>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>

            </div>

        </div>

    </div>
@endsection
