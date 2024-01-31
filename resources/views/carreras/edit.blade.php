@extends('layouts.app')

@section('contenido')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Editar Carrera
                    </div>
                    <div class="card-body">
                        <form action="{{ route('carreras.update', $carrera->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" required class="form-control" value="{{ $carrera->nombre }}">
                            </div>
                            <div class="form-group">
                                <label for="decanatura_id">Decanatura</label>
                                <select name="decanatura_id" class="form-control">
                                    <option value="">{{ $carrera->decanaturas->nombre }}</option>
                                    @foreach ($decanaturas as $decanatura)
                                        <option value="{{ $decanatura->id }}">{{ $decanatura->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="justify-content-end">
                                <input type="submit" value="Actualizar" class="btn btn-success">
                                <a href="{{ route('carreras.index') }}" class="btn btn-info">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
