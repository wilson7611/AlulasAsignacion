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
                        <form action="{{ route('semestres.update', $semestre->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Numero</label>
                                <input type="text" name="numero" required class="form-control" value="{{ $semestre->numero }}">
                            </div>
                            <div class="form-group">
                                <label for="decanatura_id">Carera</label>
                                <select name="carrera_id" class="form-control">
                                    <option value="">{{ $semestre->carreras->nombre }}</option>
                                    @foreach ($carreras as $carrera)
                                        <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="justify-content-end">
                                <input type="submit" value="Actualizar" class="btn btn-success">
                                <a href="{{ route('semestres.index') }}" class="btn btn-info">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
