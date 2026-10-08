@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">

        <div class="card shadow-lg border-0">

            <div class="card-header bg-success text-white">
                <h3 class="mb-0">
                    Curso #{{ $course['course_number'] }}
                </h3>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">ID</label>
                        <div class="form-control bg-light">
                            {{ $course['id'] }}
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Número de Curso</label>
                        <div class="form-control">
                            {{ $course['course_number'] }}
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Fecha programada (Día)</label>
                        <div class="form-control">
                            {{ \Carbon\Carbon::parse($course['day'])->format('d/m/Y') }}
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Centro de Formación</label>
                        <div class="form-control">
                            {{ $course['training_center_id'] }}
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Cohorte / Ficha</label>
                        <div class="form-control">
                            {{ $course['cohort_id'] }}
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Ambiente Formativo</label>
                        <div class="form-control">
                            {{ $course['environment_id'] }}
                        </div>
                    </div>

                </div>

                <hr class="my-4">

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Fecha de creación</label>
                        <div class="form-control text-muted bg-light">
                            {{ \Carbon\Carbon::parse($course['created_at'])->format('d/m/Y H:i') }}
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Última actualización</label>
                        <div class="form-control text-muted bg-light">
                            {{ \Carbon\Carbon::parse($course['updated_at'])->format('d/m/Y H:i') }}
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
