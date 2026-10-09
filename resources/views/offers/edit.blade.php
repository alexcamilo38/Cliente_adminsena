@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow border-0 rounded-4">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Actualizar Oferta</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('offers.update', $offers['id'] ?? $offers->id ?? $offers) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Jornada --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">Jornada</label>
                            <input
                                type="text"
                                name="shift"
                                class="form-control"
                                value="{{ old('shift', $offers['shift'] ?? $offers['jornada'] ?? $offers->shift ?? '') }}"
                                placeholder="Ingrese la jornada (Ej. Mañana, Tarde, Noche)">
                        </div>

                        {{-- Fecha de Inscripción --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">Fecha de Inscripción</label>
                            <input
                                type="date"
                                name="registration_date"
                                class="form-control"
                                value="{{ old('registration_date', $offers['registration_date'] ?? $offers['fecha_inscripcion'] ?? $offers->registration_date ?? '') }}">
                        </div>

                        {{-- Capacidad / Cupos --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">Capacidad / Cupos</label>
                            <input
                                type="number"
                                name="capacity"
                                class="form-control"
                                value="{{ old('capacity', $offers['capacity'] ?? $offers['cupos'] ?? $offers->capacity ?? '') }}"
                                placeholder="Ingrese la cantidad de cupos disponibles">
                        </div>

                        {{-- Programa de Formación --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">Programa de Formación</label>
                            <select name="program_id" class="form-select">
                                <option value="">Seleccione un programa...</option>

                                @foreach($programs ?? $program ?? [] as $item)
                                    @php
                                        $progId = $item['id'] ?? $item->id ?? $item;
                                        $offerProgId = $offers['program_id'] ?? $offers['id_programa'] ?? $offers->program_id ?? '';
                                    @endphp
                                    <option value="{{ $progId }}"
                                        {{ old('program_id', $offerProgId) == $progId ? 'selected' : '' }}>
                                        {{ $item['name'] ?? $item['nombre'] ?? $item->name ?? $item->nombre ?? 'Programa #' . $progId }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-success">
                                Actualizar Oferta
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection