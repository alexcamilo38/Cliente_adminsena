@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">

        <div class="card shadow-lg border-0">

            <div class="card-header bg-success text-white">
                <h3 class="mb-0">
                    {{ $program['name'] }}
                </h3>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">ID</label>
                        <div class="form-control bg-light">
                            {{ $program['id'] }}
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Nombre del Programa</label>
                        <div class="form-control">
                            {{ $program['name'] }}
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="fw-bold">Descripción</label>
                        <div class="form-control" style="height: auto; min-height: 80px;">
                            {{ $program['description'] }}
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Tipo de Programa</label>
                        <div class="form-control">
                            {{ $program['type'] }}
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Duración</label>
                        <div class="form-control">
                            {{ $program['duration'] }}
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Modalidad</label>
                        <div class="form-control">
                            {{ $program['modality'] }}
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Área</label>
                        <div class="form-control">
                            {{ $program['area_id'] }}
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="fw-bold d-block">Foto del Programa</label>
                        @if (!empty($program['urlFoto']))
                            <img src="{{ asset('storage/images/' . $program['urlFoto']) }}" alt="Foto del programa"
                                class="img-thumbnail mt-2" style="max-width: 200px; height: auto;">
                        @else
                            <div class="form-control text-muted">Sin foto asignada</div>
                        @endif
                    </div>

                </div>

                <hr class="my-4">

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Fecha de creación</label>
                        <div class="form-control text-muted bg-light">
                            {{ \Carbon\Carbon::parse($program['created_at'])->format('d/m/Y H:i') }}
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Última actualización</label>
                        <div class="form-control text-muted bg-light">
                            {{ \Carbon\Carbon::parse($program['updated_at'])->format('d/m/Y H:i') }}
                        </div>
                    </div>

                </div>

                <div class="mt-4 text-end">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Volver</a>
                </div>

            </div>

        </div>

    </div>
@endsection
