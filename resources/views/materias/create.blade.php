
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalgridLabel">Nuevo Registro</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
    <form action="{{route('materias.store')}}" method="POST" >
        @csrf
    <div class="row g-3">
        <div class="col-xxl-12">
            <div>
                <label for="firstName" class="form-label">Nombre Materia</label>
                <input type="text" name="nombre" class="form-control" id="firstName" placeholder="Introducir Nombre">
            </div>
        </div><!--end col-->
        
        <div class="col-xxl-12">
            <div>
                <label for="emailInput" class="form-label">Semestre</label>
                <select name="semestre_id" id="" class="form-select">
                    <option value="">Elige un Semestre</option>
                    @foreach ($semestres as $semestre)
                        <option value="{{$semestre->id}}">Semestre {{$semestre->numero}}</option>
                    @endforeach
                </select>
            </div>
        </div><!--end col-->
      
        <div class="col-lg-12">
            <div class="hstack gap-2 justify-content-end">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button id="add_user_btn"  type="submit" class="btn btn-success">Registrar</button>
            </div>
        </div><!--end col-->
    </div><!--end row-->
    </form>
    </div>
    </div>
    </div>
    </div>