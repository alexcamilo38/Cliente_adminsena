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
                        <form action="{{ route('course.update', $courses['id'] ?? ($courses->id ?? '')) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- Campo Número del Curso --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Número del Curso</label>
                                <input type="number" name="course_number" class="form-control"
                                    value="{{ old('course_number', $courses['course_number'] ?? ($courses['numero_curso'] ?? ($courses->course_number ?? ($courses->numero_curso ?? '')))) }}"
                                    placeholder="Ingrese el número del curso">
                            </div>

                            {{-- Campo Fecha --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Fecha</label>
                                <input type="date" name="day" class="form-control"
                                    value="{{ old('day', $courses['day'] ?? ($courses['fecha'] ?? ($courses->day ?? ($courses->fecha ?? '')))) }}">
                            </div>

                            {{-- Desplegable Centro de Formación --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Centro de Formación</label>
                                <select name="training_center_id" class="form-select">
                                    <option value="">Seleccione un centro...</option>

                                    @foreach ($training_centers ?? [] as $center)
                                        @php
                                            $centerId = $center['id'] ?? ($center->id ?? $center);
                                            $courseCenterId =
                                                $courses['training_center_id'] ??
                                                ($courses['id_training_center'] ??
                                                    ($courses['centro_id'] ??
                                                        ($courses->training_center_id ??
                                                            ($courses->id_training_center ?? ''))));
                                        @endphp
                                        <option value="{{ $centerId }}"
                                            {{ old('training_center_id', $courseCenterId) == $centerId ? 'selected' : '' }}>
                                            {{ $center['name'] ?? ($center['nombre'] ?? ($center->name ?? ($center->nombre ?? $center))) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Desplegable Cohorte / Ficha --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Cohorte / Ficha</label>
                                <select name="cohort_id" class="form-select">
                                    <option value="">Seleccione una cohorte...</option>

                                    @foreach ($cohorts ?? [] as $cohort)
                                        @php
                                            $cohortId = $cohort['id'] ?? ($cohort->id ?? $cohort);
                                            $courseCohortId =
                                                $courses['cohort_id'] ??
                                                ($courses['id_cohort'] ??
                                                    ($courses->cohort_id ?? ($courses->id_cohort ?? '')));
                                            $cohortName =
                                                $cohort['name'] ??
                                                ($cohort['code'] ??
                                                    ($cohort['nombre'] ??
                                                        ($cohort->name ??
                                                            ($cohort->code ??
                                                                ($cohort->nombre ?? 'Cohorte #' . $cohortId)))));
                                        @endphp
                                        <option value="{{ $cohortId }}"
                                            {{ old('cohort_id', $courseCohortId) == $cohortId ? 'selected' : '' }}>
                                            {{ $cohortName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Desplegable Ambiente Formativo --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Ambiente Formativo</label>
                                <select name="environment_id" class="form-select">
                                    <option value="">Seleccione un ambiente...</option>

                                    @foreach ($environments ?? [] as $environment)
                                        @php
                                            $environmentId = $environment['id'] ?? ($environment->id ?? $environment);
                                            $courseEnvironmentId =
                                                $courses['environment_id'] ??
                                                ($courses['id_environment'] ??
                                                    ($courses->environment_id ?? ($courses->id_environment ?? '')));
                                            $environmentName =
                                                $environment['name'] ??
                                                ($environment['nombre'] ??
                                                    ($environment->name ?? ($environment->nombre ?? $environmentId)));
                                        @endphp
                                        <option value="{{ $environmentId }}"
                                            {{ old('environment_id', $courseEnvironmentId) == $environmentId ? 'selected' : '' }}>
                                            Ambiente {{ $environmentName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
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
