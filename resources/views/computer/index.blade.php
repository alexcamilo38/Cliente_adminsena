@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold text-dark">Lista de Computadores</h1>
        </div>

        <div class="card shadow-lg border-0 rounded-4">

            <div class="card-header text-white encabezado-tabla" style="background-color: #25c72f;">
                <h5 class="mb-0">Computadores Registrados</h5>
            </div>

            <div class="card-body">

                <table id="idcomputer" class="table table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th>Número</th>
                            <th>Marca</th>
                            <th>Estado</th> <!-- COLUMNA AGREGADA -->
                            <th>Ambiente</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($computer as $item)

                            <tr>

                                <td>{{ $item['id'] }}</td>

                                <td class="fw-semibold">
                                    {{ $item['number']}}
                                </td>

                                <td>{{ $item['brand']}}</td>

                                <!-- VISUALIZACIÓN DEL ESTADO -->
                                <td>
                                    @if(strtolower($item->state) == 'activo')
                                        <span class="badge bg-success px-3 py-2">
                                            🟢 Activo
                                        </span>
                                    @elseif(strtolower($item->state) == 'mantenimiento')
                                        <span class="badge bg-warning text-dark px-3 py-2">
                                            🟡 En Mantenimiento
                                        </span>
                                    @else
                                        <span class="badge bg-secondary px-3 py-2">
                                            {{ ucfirst($item->state ?? 'N/A') }}
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    {{ $item->environment?->name ?? ($item->environment_id ? 'Ambiente #' . $item->environment_id : 'Sin asignar') }}
                                </td>

                                <td class="text-center">

                                    <a href="{{ route('computer.show', $item->id) }}" class="btn btn-info btn-sm text-white me-1">
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
@endsection