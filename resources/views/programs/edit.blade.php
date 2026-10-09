@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow border-0 rounded-4">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Actualizar Programa</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('programs.update', $program['id'] ?? $program->id ?? '') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Campo Nombre --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nombre del Programa</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name', $program['name'] ?? $program['nombre'] ?? $program->name ?? $program->nombre ?? '') }}"
                                placeholder="Ingrese el nombre del programa">
                        </div>

                        {{-- Campo Descripción --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">Descripción</label>
                            <textarea
                                name="description"
                                class="form-control"
                                rows="3"
                                placeholder="Ingrese la descripción">{{ old('description', $program['description'] ?? $program['descripcion'] ?? $program->description ?? $program->descripcion ?? '') }}</textarea>
                        </div>

                        {{-- Tipo de Programa --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">Tipo de Programa</label>
                            @php
                                $typeVal = old('type', $program['type'] ?? $program['tipo'] ?? $program->type ?? $program->tipo ?? '');
                            @endphp
                            <select name="type" class="form-select">
                                <option value="">Seleccione el tipo...</option>
                                <option value="Tecnólogo" {{ $typeVal == 'Tecnólogo' ? 'selected' : '' }}>Tecnólogo</option>
                                <option value="Técnico" {{ $typeVal == 'Técnico' ? 'selected' : '' }}>Técnico</option>
                                <option value="Especialización Tecnológica" {{ $typeVal == 'Especialización Tecnológica' ? 'selected' : '' }}>Especialización Tecnológica</option>
                                <option value="Curso Especial" {{ $typeVal == 'Curso Especial' ? 'selected' : '' }}>Curso Especial</option>
                            </select>
                        </div>

                        {{-- Campo Duración --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">Duración</label>
                            <input
                                type="text"
                                name="duration"
                                class="form-control"
                                value="{{ old('duration', $program['duration'] ?? $program['duracion'] ?? $program->duration ?? $program->duracion ?? '') }}"
                                placeholder="Ingrese la duración">
                        </div>

                        {{-- Modalidad --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">Modalidad</label>
                            @php
                                $modalityVal = old('modality', $program['modality'] ?? $program['modalidad'] ?? $program->modality ?? $program->modalidad ?? '');
                            @endphp
                            <select name="modality" class="form-select">
                                <option value="">Seleccione la modalidad...</option>
                                <option value="Presencial" {{ $modalityVal == 'Presencial' ? 'selected' : '' }}>Presencial</option>
                                <option value="Virtual" {{ $modalityVal == 'Virtual' ? 'selected' : '' }}>Virtual</option>
                                <option value="Presencial / Virtual" {{ $modalityVal == 'Presencial / Virtual' ? 'selected' : '' }}>Presencial / Virtual</option>
                            </select>
                        </div>

                        {{-- Desplegable Área --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">Área</label>
                            <select name="area_id" class="form-select">
                                <option value="">Seleccione un área...</option>

                                @foreach($areas ?? [] as $area)
                                    @php
                                        $areaId = $area['id'] ?? $area->id ?? $area;
                                        $programAreaId = $program['area_id'] ?? $program['id_area'] ?? $program->area_id ?? $program->id_area ?? '';
                                    @endphp
                                    <option value="{{ $areaId }}"
                                        {{ old('area_id', $programAreaId) == $areaId ? 'selected' : '' }}>
                                        {{ $area['name'] ?? $area['nombre'] ?? $area->name ?? $area->nombre ?? $area }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Campo Foto --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">Cambiar Imagen (opcional)</label>
                            <input type="file" name="urlFoto" class="form-control" accept="image/*">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-success">
                                Actualizar Programa
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection