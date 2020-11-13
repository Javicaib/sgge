<?php
if($_SESSION['S_IDROL']=='Usuario'){

    require 'layouts/403.php';

}
else{
?>
<div class="card">
    <div class="card-header">Lista de Estudiantes</div>

    <div class="card-body">
        <button class="btn-primary float-right btn btn-sm" data-toggle="modal" data-target="#agregar_estudiante">
            <i class="fa fa-plus"  >Agregar</i></button>
        <table id="estudiantes" class="col-12 table-striped ">
            <thead>
            <tr>
                <th >#</th>
                <th >CI</th>
                <th >Nombre</th>
                <th >Grupo</th>
                <th >Raza</th>
                <th >Sexo</th>
                <th >Acciones</th>
            </tr>
            </thead>
            <tbody>


            </tbody>
        </table>
    </div>
</div>
<!-- Modal Insertar -->
<div class="modal fade" id="agregar_estudiante" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Nuevo registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre del estudiante">
                        <small id="passwordHelpBlock" class="form-text text-muted">
                        El nombre solo debe contener letras y tener un tamño entre 10 y 50 caracteres
                        </small>
                    </div>

                    <div class="form-group">
                        <label for="ci">CI</label>
                        <input type="text" class="form-control" id="ci" maxlength="11" minlength="11" placeholder="Ingrese el CI del estudiante">
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            El CI solo debe tener numeros y tener 11 digitos
                        </small>

                    </div>
                    <div class="form-group">
                        <label for="grupo">Grupo</label>
                        <select class="form-control select-js grupo"style="width: 100%;"  id="grupo">

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="raza">Raza</label>
                        <select class="form-control select-js raza"style="width: 100%;"  id="raza">

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sexo">Sexo</label>
                        <select class="form-control select-js sexo" style="width: 100%;" id="sexo">

                        </select>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" onclick="registrar_estudiante()" class="btn btn-primary"><i class="fa fa-check"></i> Añadir</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Actualizar -->
<div class="modal fade" id="actualizar_estudiante" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Actualizar Estudiante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editar_estudiante">

                    <div class="form-group">
                        <input type="text" id="id" disabled class="d-none">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre_editar" placeholder="Ingrese el nombre del estudiante">
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            El nombre solo debe contener letras y tener un tamño entre 10 y 50 caracteres
                        </small>
                    </div>


                    <div class="form-group">
                        <label for="grupo">Grupo</label>
                        <select class="form-control select-js grupo"style="width: 100%;"  id="grupo_editar">

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="raza">Raza</label>
                        <select class="form-control select-js raza"style="width: 100%;"  id="raza_editar">

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sexo">Sexo</label>
                        <select class="form-control select-js sexo" style="width: 100%;" id="sexo_editar">

                        </select>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" onclick="actualizar_estudiante()" class="btn btn-primary"><i class="fa fa-check"></i> Actualizar</button>
            </div>
        </div>
    </div>
</div>
<?php
}
?>