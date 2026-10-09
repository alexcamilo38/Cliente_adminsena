@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold text-dark">Lista de Cursos</h1>
            <a href="{{ route('course.registro') }}" class="btn btn-success shadow-sm">
                <i class="bi bi-plus-circle"></i> Nuevo Curso
            </a>
        </div>

        <div class="card shadow-lg border-0 rounded-4">

            <div class="card-header text-white encabezado-tabla" style="background-color: #25c72f;">
                <h5 class="mb-0">Cursos Registrados</h5>
            </div>

            <div class="card-body">

                <table id="idCourse" class="table table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th>Número de curso</th>
                            <th>Día</th>
                            <th>Centro de Formación</th>
                            <th>Ficha</th>
                            <th>Ambiente</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($courses as $course)

                            <tr>

                                <td>{{ $course['id'] }}</td>

                                <td class="fw-semibold">
                                    {{ $course['course_number'] }}
                                </td>

                                <td>{{ $course['day'] }}</td>

                                <td>{{ $course['training_center_id'] }}</td>

                                <td>{{ $course['cohort_id'] }}</td>

                                <td>{{ $course['environment_id'] }}</td>

                                <td class="text-center">

                                    <a href="{{ route('course.show', $course['id']) }}" class="btn btn-info btn-sm me-1">
                                        Mostrar
                                    </a>
                                    <a href="{{ route('course.edit', $course['id']) }}" class="btn btn-warning btn-sm me-1">
                                        Editar
                                    </a>

                                    <form action="{{ route('course.destroy', $course['id']) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Eliminar
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>
@endsection