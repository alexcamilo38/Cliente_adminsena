@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold text-dark">Lista de Centros</h1>

            <a href="{{ route('trainingcenters.registrar') }}" class="btn btn-success shadow-sm">
                <i class="bi bi-plus-circle"></i> Nuevo Centro
            </a>
        </div>

        <div class="card shadow-lg border-0 rounded-4">

            <div class="card-header text-white encabezado-tabla" style="background-color: #25c72f;">
                <h5 class="mb-0">Centros Registrados</h5>
            </div>

            <div class="card-body">

                <table id="idcomputer" class="table table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Ubicación</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($Training_centers as $Training_center)

                            <tr>

                                <td>{{ $Training_center['id'] }}</td>

                                <td class="fw-semibold">
                                    {{ $Training_center['name'] }}
                                </td>

                                <td>{{ $Training_center['location']}}</td>

                                <td class="text-center">

                                    <a href="{{ route('trainingcenters.show', $Training_center['id']) }}" class="btn btn-info btn-sm me-1">
                                        Mostrar
                                    </a>

                                    <a href="{{ route('trainingcenters.edit', $Training_center['id']) }}" class="btn btn-warning btn-sm me-1">
                                        Editar
                                    </a>

                                    <form action="{{ route('trainingcenters.destroy', $Training_center['id']) }}" method="POST" class="d-inline">
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