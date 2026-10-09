@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow border-0 rounded-4">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Actualizar Aprendiz</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('apprentice.update', $apprentices['id'] ?? $apprentices->id ?? $apprentices) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Nombre --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Nombre
                            </label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name', $apprentices['name'] ?? $apprentices['nombre'] ?? $apprentices->name ?? $apprentices->nombre ?? '') }}"
                                placeholder="Ingrese el nombre del aprendiz">
                        </div>

                        {{-- Correo Electrónico --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Correo Electrónico
                            </label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email', $apprentices['email'] ?? $apprentices['correo'] ?? $apprentices->email ?? $apprentices->correo ?? '') }}"
                                placeholder="Ingrese el correo electrónico">
                        </div>

                        {{-- Número de Celular --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Número de Celular
                            </label>
                            <input
                                type="tel"
                                name="cell_number"
                                class="form-control"
                                value="{{ old('cell_number', $apprentices['cell_number'] ?? $apprentices['celular'] ?? $apprentices->cell_number ?? '') }}"
                                placeholder="Ingrese el número de celular">
                        </div>

                        {{-- Curso --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Curso
                            </label>

                            <select name="course_id" class="form-select">
                                <option value="">Seleccione un curso...</option>

                                @foreach($courses ?? [] as $course)
                                    @php
                                        $courseId = $course['id'] ?? $course->id ?? $course;
                                        $appCourseId = $apprentices['course_id'] ?? $apprentices['id_curso'] ?? $apprentices->course_id ?? '';
                                        $courseNum = $course['course_number'] ?? $course['numero_curso'] ?? $course->course_number ?? $courseId;
                                    @endphp
                                    <option value="{{ $courseId }}"
                                        {{ old('course_id', $appCourseId) == $courseId ? 'selected' : '' }}>
                                        Curso #{{ $courseNum }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Computador --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Computador
                            </label>

                            <select name="computer_id" class="form-select">
                                <option value="">Seleccione un computador...</option>

                                @foreach($computers ?? [] as $computer)
                                    @php
                                        $compId = $computer['id'] ?? $computer->id ?? $computer;
                                        $appCompId = $apprentices['computer_id'] ?? $apprentices['id_computador'] ?? $apprentices->computer_id ?? '';
                                        $compNum = $computer['number'] ?? $computer['numero'] ?? $computer->number ?? $compId;
                                    @endphp
                                    <option value="{{ $compId }}"
                                        {{ old('computer_id', $appCompId) == $compId ? 'selected' : '' }}>
                                        Equipo #{{ $compNum }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                                Cancelar
                            </a>

                            <button type="submit" class="btn btn-success">
                                Actualizar Aprendiz
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection