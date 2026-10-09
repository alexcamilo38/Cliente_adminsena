@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow border-0 rounded-4">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Registrar Área</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('areas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Nombre
                            </label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                placeholder="Ingrese el nombre del área">
                        </div>
                          
                        <button type="submit" class="btn btn-success">
                            Enviar Formulario
                        </button>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection