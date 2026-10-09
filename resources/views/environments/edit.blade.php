@extends('layouts.app') 

@section('content') 

<div class="container mt-5 mb-5"> 

    <div class="card shadow-lg border-0 rounded-5"> 

        <div class="card-header text-white" style="background-color: #39A900;"> 
            <h3 class="mb-0">Actualizar Ambiente</h3> 
        </div> 

        <div class="card-body"> 

            <form action="{{ route('environments.update', $environments['id'] ?? $environments->id ?? $environments) }}" method="POST" enctype="multipart/form-data"> 
                @csrf 
                @method('PUT') 

                {{-- Nombre del Ambiente --}}
                <div class="mb-3"> 
                    <label for="name" class="form-label fw-bold"> 
                        Nombre del Ambiente 
                    </label> 

                    <input 
                        type="text" 
                        class="form-control" 
                        id="name" 
                        name="name" 
                        value="{{ old('name', $environments['name'] ?? $environments['nombre'] ?? $environments->name ?? $environments->nombre ?? '') }}" 
                        placeholder="Ingrese el nombre del ambiente"> 
                </div> 

                {{-- Ubicación --}}
                <div class="mb-3"> 
                    <label for="location" class="form-label fw-bold"> 
                        Ubicación 
                    </label> 

                    <input 
                        type="text" 
                        class="form-control" 
                        id="location" 
                        name="location" 
                        value="{{ old('location', $environments['location'] ?? $environments['ubicacion'] ?? $environments->location ?? $environments->ubicacion ?? '') }}" 
                        placeholder="Ingrese la ubicación del ambiente"> 
                </div> 

                {{-- Centro de Formación --}}
                <div class="mb-3"> 
                    <label for="training_center_id" class="form-label fw-bold"> 
                        Centro de Formación 
                    </label> 

                    <select 
                        name="training_center_id" 
                        id="training_center_id" 
                        class="form-select"> 

                        <option value="">Seleccione un centro de formación</option> 

                        @foreach ($training_centers ?? [] as $training_center) 
                            @php
                                $centerId = $training_center['id'] ?? $training_center->id ?? $training_center;
                                $envCenterId = $environments['training_center_id'] ?? $environments['id_training_center'] ?? $environments->training_center_id ?? '';
                            @endphp
                            <option 
                                value="{{ $centerId }}" 
                                {{ old('training_center_id', $envCenterId) == $centerId ? 'selected' : '' }}> 
                                {{ $training_center['name'] ?? $training_center['nombre'] ?? $training_center->name ?? $training_center->nombre ?? $centerId }} 
                            </option> 
                        @endforeach 

                    </select> 
                </div> 

                {{-- Foto del Ambiente --}}
                <div class="mb-3">
                    <label class="form-label fw-bold d-block">
                        Foto del Ambiente
                    </label>

                    <div class="p-3 bg-light rounded border">
                        <div class="row align-items-center">

                            <div class="col-md-3 text-center mb-3 mb-md-0">
                                <span class="d-block small text-muted mb-2 fw-semibold">Imagen actual:</span>

                                @php
                                    $foto = $environments['urlFoto'] ?? $environments->urlFoto ?? '';
                                @endphp

                                @if(!empty($foto))
                                    <img src="{{ asset('storage/images/' . $foto) }}" 
                                         alt="Foto del ambiente" 
                                         class="img-thumbnail rounded shadow-sm" 
                                         style="max-height: 110px; object-fit: cover;">
                                @else
                                    <span class="badge bg-secondary">Sin imagen cargada</span>
                                @endif
                            </div>

                            <div class="col-md-9">
                                <label for="urlFoto" class="form-label fw-bold text-secondary small">
                                    Cambiar Imagen (opcional)
                                </label>
                                <input
                                    type="file"
                                    class="form-control"
                                    id="urlFoto"
                                    name="urlFoto"
                                    accept="image/*">
                                <small class="text-muted d-block mt-1">
                                    Si no selecciona ningún archivo, se mantendrá la imagen que está guardada actualmente.
                                </small>
                            </div>

                        </div>
                    </div>
                </div> 

                <div class="d-flex justify-content-between mt-4"> 

                    <a href="{{ url()->previous() }}" class="btn btn-secondary"> 
                        Volver 
                    </a> 

                    <button type="submit" class="btn text-white" style="background-color: #143084;"> 
                        Actualizar Ambiente 
                    </button> 

                </div> 

            </form> 

        </div> 

    </div> 

</div> 

@endsection