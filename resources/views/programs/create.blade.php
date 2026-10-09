@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow border-0 rounded-4">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">Registrar Programa</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('programs.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label fw-bold">
                                    Nombre del Programa
                                </label>
                                <input type="text" name="name" class="form-control"
                                    placeholder="Ingrese el nombre del programa" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">
                                    Descripción
                                </label>
                                <textarea name="description" class="form-control" rows="3" placeholder="Ingrese la descripción del programa"
                                    required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="type" class="form-label fw-bold">
                                    Tipo de Programa
                                </label>

                                <select name="type" id="type" class="form-select" required>
                                    <option value="">Seleccione el tipo</option>
                                    <option value="Tecnólogo">Tecnólogo</option>
                                    <option value="Técnico">Técnico</option>
                                    <option value="Especialización Tecnológica">Especialización Tecnológica</option>
                                    <option value="Curso Especial">Curso Especial</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">
                                    Duración
                                </label>
                                <input type="text" name="duration" class="form-control" placeholder="Ej. 27 Meses"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="modality" class="form-label fw-bold">
                                    Modalidad
                                </label>

                                <select name="modality" id="modality" class="form-select" required>
                                    <option value="">Seleccione la modalidad</option>
                                    <option value="Presencial">Presencial</option>
                                    <option value="Virtual">Virtual</option>
                                    <option value="Presencial / Virtual">Presencial / Virtual</option>
                                </select>
                            </div>


                            <div class="mb-3">
                                <label for="area_id" class="form-label fw-bold">
                                    Área
                                </label>

                                <select name="area_id" id="area_id" class="form-select" required>
                                    <option value="">Seleccione un área</option>

                                    @foreach ($areas as $area)
                                        <option value="{{ $area['id'] ?? $area->id }}">
                                            {{ $area['name'] ?? $area->id }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">
                                    Adjuntar FOTO
                                </label>
                                <input type="file" name="urlFoto" class="form-control" accept="image/*">
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('programs.index') }}" class="btn btn-secondary">
                                    Cancelar
                                </a>

                                <button type="submit" class="btn btn-success">
                                    Guardar Programa
                                </button>
                            </div>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
