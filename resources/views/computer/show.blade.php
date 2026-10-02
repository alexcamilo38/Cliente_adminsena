@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">

    <div class="card shadow-lg border-0 rounded-4">

        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0">
                Computador #{{ $computer->number }} - {{ $computer->brand }}
            </h3>

            <!-- Badge de Estado en el Encabezado -->
            @if(strtolower($computer->state) == 'activo')
                <span class="badge bg-light text-success fs-6 px-3 py-2">
                    🟢 Activo
                </span>
            @elseif(strtolower($computer->state) == 'mantenimiento')
                <span class="badge bg-warning text-dark fs-6 px-3 py-2">
                    🟡 En Mantenimiento
                </span>
            @else
                <span class="badge bg-secondary fs-6 px-3 py-2">
                    {{ ucfirst($computer->state ?? 'N/A') }}
                </span>
            @endif
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-4 mb-3">
                    <label class="fw-bold">ID</label>
                    <div class="form-control bg-light">
                        {{ $computer->id }}
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="fw-bold">Número</label>
                    <div class="form-control">
                        {{ $computer->number }}
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="fw-bold">Marca</label>
                    <div class="form-control">
                        {{ $computer->brand }}
                    </div>
                </div>

            </div>

            <div class="row">

                <!-- CAMPO DE ESTADO DETALLADO -->
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Estado del Equipo</label>
                    <div class="form-control d-flex align-items-center">
                        @if(strtolower($computer->state) == 'activo')
                            <span class="badge bg-success px-3 py-2 me-2">🟢 Activo</span>
                            <small class="text-muted">Equipo disponible para uso</small>
                        @elseif(strtolower($computer->state) == 'mantenimiento')
                            <span class="badge bg-warning text-dark px-3 py-2 me-2">🟡 En Mantenimiento</span>
                            <small class="text-muted">Equipo en revisión técnica</small>
                        @else
                            <span class="badge bg-secondary px-3 py-2 me-2">{{ ucfirst($computer->state ?? 'N/A') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Ambiente Formativo</label>
                    <div class="form-control">
                        {{ $computer->environment?->name ?? ($computer->environment_id ? 'Ambiente #' . $computer->environment_id : 'Sin ambiente asignado') }}
                    </div>
                </div>

            </div>

            <hr class="my-4">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Fecha de creación</label>
                    <div class="form-control text-muted bg-light">
                        {{ \Carbon\Carbon::parse($computer->created_at)->format('d/m/Y H:i') }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Última actualización</label>
                    <div class="form-control text-muted bg-light">
                        {{ \Carbon\Carbon::parse($computer->updated_at)->format('d/m/Y H:i') }}
                    </div>
                </div>

            </div>

            <div class="mt-4 d-flex justify-content-between">
                <a href="{{ route('computer.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Volver a la lista
                </a>

                <a href="{{ route('computer.edit', $computer->id) }}" class="btn btn-warning">
                    Editar Computador
                </a>
            </div>

        </div>

    </div>

</div>
@endsection