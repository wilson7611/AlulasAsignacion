@extends('layouts.app')

@section('contenido')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              Editar Decanatura
            </div>
            <div class="card-body">
              <form action="{{ route('decanaturas.update', $decanatura->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                  <label for="name">Nombre</label>
                  <input type="text" name="nombre" required class="form-control" value="{{ $decanatura->nombre }}">
                </div>
              
               <br>
               
                <div class="justify-content-end">
                  <input type="submit" value="Actualizar" class="btn btn-success">
                  <a href="{{route('decanaturas.index')}}" class="btn btn-info">Cancelar</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection