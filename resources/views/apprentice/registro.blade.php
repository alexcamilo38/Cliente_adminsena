@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow border-0 rounded-4">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Registrar Aprendiz</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('apprentice.admin') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Nombre
                            </label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                placeholder="Ingrese el nombre del aprendiz">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Correo Electrónico
                            </label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                placeholder="Ingrese el correo electrónico">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Número de Celular
                            </label>
                            <input
                                type="number"
                                name="cell_number"
                                class="form-control"
                                placeholder="Ingrese el número de celular">
                        </div>

                        <div class="mb-3">
                            <label for="course_id" class="form-label fw-bold">
                                Curso
                            </label>

                            <select name="course_id" id="course_id" class="form-select">
                                <option value="">Seleccione un curso</option>

                                @foreach ($courses ?? [] as $course)
                                    <option value="{{$course['id'] ?? $course->id }}">
                                        {{$course['course_number'] ??  $course->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="computer_id" class="form-label fw-bold">
                                Computador
                            </label>

                            <select name="computer_id" id="computer_id" class="form-select">
                                <option value="">Seleccione un computador</option>

                                @foreach ($computers ?? [] as $computer)
                                    <option value="{{$computer['id'] ?? $computer->id }}">
                                        {{ $computer['number'] ?? $computer->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                                Cancelar
                            </a>

                            <button type="submit" class="btn btn-success">
                                Guardar Aprendiz
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection