@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow border-0 rounded-4">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Actualizar Profesor</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('teacher.update', $teachers['id'] ?? $teachers->id ?? '') }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Campo Nombre --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nombre</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name', $teachers['name'] ?? $teachers['nombre'] ?? $teachers->name ?? $teachers->nombre ?? '') }}"
                                placeholder="Ingrese el nombre del profesor">
                        </div>

                        {{-- Campo Correo --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">Correo Electrónico</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email', $teachers['email'] ?? $teachers['correo'] ?? $teachers->email ?? $teachers->correo ?? '') }}"
                                placeholder="Ingrese el correo electrónico">
                        </div>

                        {{-- Desplegable Área --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">Área</label>
                            <select name="area_id" class="form-select">
                                <option value="">Seleccione un área...</option>

                                @foreach($areas ?? [] as $area)
                                    @php
                                        $areaId = $area['id'] ?? $area->id ?? $area;
                                        $teacherAreaId = $teachers['area_id'] ?? $teachers['id_area'] ?? $teachers->area_id ?? $teachers->id_area ?? '';
                                    @endphp
                                    <option value="{{ $areaId }}"
                                        {{ old('area_id', $teacherAreaId) == $areaId ? 'selected' : '' }}>
                                        {{ $area['name'] ?? $area['nombre'] ?? $area->name ?? $area->nombre ?? $area }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Desplegable Centro de Formación --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">Centro de Formación</label>
                            <select name="training_center_id" class="form-select">
                                <option value="">Seleccione un centro...</option>

                                @foreach($training_centers ?? [] as $center)
                                    @php
                                        $centerId = $center['id'] ?? $center->id ?? $center;
                                        $teacherCenterId = $teachers['training_center_id'] ?? $teachers['id_training_center'] ?? $teachers['centro_id'] ?? $teachers->training_center_id ?? $teachers->id_training_center ?? '';
                                    @endphp
                                    <option value="{{ $centerId }}"
                                        {{ old('training_center_id', $teacherCenterId) == $centerId ? 'selected' : '' }}>
                                        {{ $center['name'] ?? $center['nombre'] ?? $center->name ?? $center->nombre ?? $center }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-success">
                                Actualizar Profesor
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection