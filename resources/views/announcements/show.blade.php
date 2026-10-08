@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">

    <div class="card shadow-lg border-0">

        <div class="card-header bg-success text-white">
            <h3 class="mb-0">
                {{ $announcement['title'] }}
            </h3>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">ID</label>
                    <div class="form-control bg-light">
                        {{ $announcement['id'] }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Título del Anuncio</label>
                    <div class="form-control">
                        {{ $announcement['title'] }}
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="fw-bold">Contenido</label>
                    <div class="form-control" style="height: auto; min-height: 80px;">
                        {{ $announcement['content'] }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Fecha de Publicación</label>
                    <div class="form-control">
                        {{ \Carbon\Carbon::parse($announcement['publish_date'] ?? $announcement['created_at'])->format('d/m/Y') }}
                    </div>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Centro de Formación</label>
                    <div class="form-control">
                        {{ $announcement['training_center_id'] }}
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="fw-bold d-block">Foto del Anuncio</label>
                    @if(!empty($announcement['urlFoto']))
                        <img 
                            src="{{ asset('storage/images/' . $announcement['urlFoto']) }}" 
                            alt="Foto del anuncio" 
                            class="img-thumbnail mt-2"
                            style="max-width: 200px; height: auto;"
                        >
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
                        {{ \Carbon\Carbon::parse($announcement['created_at'])->format('d/m/Y H:i') }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Última actualización</label>
                    <div class="form-control text-muted bg-light">
                        {{ \Carbon\Carbon::parse($announcement['updated_at'])->format('d/m/Y H:i') }}
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