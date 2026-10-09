@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow border-0 rounded-4">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">Registrar Equipo</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('computer.model') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label fw-bold">Número</label>
                                <input type="number" name="number" class="form-control" value="{{ old('number') }}"
                                    placeholder="Ingrese el número del computador">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Marca</label>
                                <input type="text" name="brand" class="form-control" value="{{ old('brand') }}"
                                    placeholder="Ingrese la marca del computador">
                            </div>

                            <!-- NUEVO CAMPO: Estado del Equipo -->
                            <div class="mb-3">
                                <label for="state" class="form-label fw-bold">Estado del Equipo</label>
                                <select name="state" id="state" class="form-select" required>
                                    <option value="activo" {{ old('state') == 'activo' ? 'selected' : '' }}>
                                        🟢 Activo
                                    </option>
                                    <option value="mantenimiento" {{ old('state') == 'mantenimiento' ? 'selected' : '' }}>
                                        🟡 En Mantenimiento
                                    </option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="environment_id" class="form-label fw-bold">Ambiente Formativo</label>
                                <select name="environment_id" id="environment_id" class="form-select">
                                    <option value="">Seleccione un ambiente...</option>
                                    @foreach ($environments ?? [] as $environment)
                                        <option value="{{ $environment['id'] }}"
                                            {{ old('environment_id') == $environment['id'] ? 'selected' : '' }}>
                                            Ambiente
                                            {{ $environment['name'] ?? ($environment['nombre'] ?? $environment['id']) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('computer.index') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-success">Guardar Computador</button>
                            </div>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
