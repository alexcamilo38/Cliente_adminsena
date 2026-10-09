@extends('layouts.app')

@section('content')

<div class="container mt-5 mb-5">

    <div class="card shadow-lg border-0 rounded-5">

        <div class="card-header text-white" style="background-color: #39A900;">
            <h3 class="mb-0">Actualizar Área</h3>
        </div>

        <div class="card-body">

            <form action="{{ route('areas.update', $areas['id']) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">
                        Nombre del Área
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        value="{{ old('name', $areas['name']) }}"
                        placeholder="Ingrese el nombre del área">
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">
                        Volver
                    </a>

                    <button type="submit" class="btn text-white" style="background-color: #143084;">
                        Actualizar Área
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>

@endsection