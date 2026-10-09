@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow border-0 rounded-4">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Actualizar Curso</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('course.update', $courses) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Número del Curso
                            </label>
                            <input
                                type="number"
                                name="course_number"
                                class="form-control"
                                value="{{ old('course_number', $courses->course_number) }}"
                                placeholder="Ingrese el número del curso">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Fecha
                            </label>
                            <input
                                type="date"
                                name="day"
                                class="form-control"
                                value="{{ old('day', $courses->day) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Centro de Formación
                            </label>

                            <select name="training_center_id" class="form-select">
                                <option value="">Seleccione un centro...</option>

                                @foreach($training_centers as $center)
                                    <option value="{{ $center->id }}"
                                        {{ old('training_center_id', $courses->training_center_id) == $center->id ? 'selected' : '' }}>
                                        {{ $center->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Cohorte / Ficha
                            </label>

                            <select name="cohort_id" class="form-select">
                                <option value="">Seleccione una cohorte...</option>

                                @foreach($cohorts as $cohort)
                                    <option value="{{ $cohort->id }}"
                                        {{ old('cohort_id', $courses->cohort_id) == $cohort->id ? 'selected' : '' }}>
                                        {{ $cohort->name ?? $cohort->code ?? 'Cohorte #' . $cohort->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Ambiente Formativo
                            </label>

                            <select name="environment_id" class="form-select">
                                <option value="">Seleccione un ambiente...</option>

                                @foreach($environments as $environment)
                                    <option value="{{ $environment->id }}"
                                        {{ old('environment_id', $courses->environment_id) == $environment->id ? 'selected' : '' }}>
                                        Ambiente {{ $environment->name ?? $environment->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                                Cancelar
                            </a>

                            <button type="submit" class="btn btn-success">
                                Actualizar Curso
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection