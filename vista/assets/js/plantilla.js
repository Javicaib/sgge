$(document).ready(function () {
    listar_usuarios();
    listar_combo_raza();
    listar_combo_sexo();
    listar_combo_grupo()

})
    function listar_usuarios() {
    var table = $('#estudiantes').DataTable(
        {
            "sort" : false,
            "ajax":{
                "url" : "../controlador/ajax_estudiantes.php",
                type: 'POST',
                data:{
                    accion:1
                }

            },
            "language":{
                "zeroRecords": "No hay resultados para mostrar",
                "paginate": {
                    "first": "Primera página",
                    "last" :  "Ultima página",
                    "next" : "Siguiente",
                    "previous": "Anterior",
                },
                "emptyTable":  "No hay datos que mostrar en la tabla",
                "loadingRecords":  "Por favor espere - cargando...",
                "sProcessing": "Procesando...",
                "sSearch": "Buscar:",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "No hay registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)"

            },
            "columns":[
                {data:'pos'},
                {data:"ci"},
                {data:"nombre"},
                {data:"grupo"},
                {data:"raza"},
                {data:"sexo"},
                {"defaultContent": "<button type=button class='btn-sm btn m-2 btnEditar btn-warning' data-toggle='modal' data-target='#actualizar_estudiante'><i class='fa fa-edit'> Editar</i></button>" +
                        "<button type=button class='btn-sm btn btn-danger btnEliminar'><i class='fa fa-trash'> Eliminar</i></button>",

                }
            ],





        }
    );
}
    function listar_combo_grupo() {
    $.ajax({
        "url": "../controlador/ajax_estudiantes.php",
        type: 'POST',
        data: {
            accion: 5
        }
    }).done(function (resp) {

        var data = JSON.parse(resp);
        var cadena = "<option value='0'>--SELECIONO EL GRUPO--</option>";
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                cadena += "<option value='" + data[i].id + "'>" + data[i].descripcion + "</option>";
            }
            $(".grupo").html(cadena);
        } else {
            cadena += "<option value=''>No se encontraron registros</option>";
        }

    });}
    function listar_combo_raza() {
    $.ajax({
        "url": "../controlador/ajax_estudiantes.php",
        type: 'POST',
        data: {
            accion: 3
        }
    }).done(function (resp) {

        var data = JSON.parse(resp);
        var cadena = "<option value='0'>--SELECIONO LA RAZA--</option>";
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                cadena += "<option value='" + data[i].id + "'>" + data[i].descripcion + "</option>";
            }
            $(".raza").html(cadena);
        } else {
            cadena += "<option value=''>No se encontraron registros</option>";
        }

    });}
    function listar_combo_sexo() {
        $.ajax({
            "url": "../controlador/ajax_estudiantes.php",
            type: 'POST',
            data: {
                accion: 4
            }
        }).done(function (resp) {

            var data = JSON.parse(resp);
            var cadena = "<option value='0'>--SELECIONO EL SEXO--</option>";
            if (data.length > 0) {
                for (var i = 0; i < data.length; i++) {
                    cadena += "<option value='" + data[i].id + "'>" + data[i].descripcion + "</option>";
                }
                $(".sexo").html(cadena);
            } else {
                cadena += "<option value=''>No se encontraron registros</option>";
            }

        });
    }
    function registrar_estudiante() {
    var nombre = $('#nombre').val();
    var grupo = $('#grupo').val();
    var ci = $('#ci').val();
    var sexo = $('#sexo').val();
    var raza = $('#raza').val();

    /** --Validaciones al formulario de insertar-- **/

    if (nombre.length==0 | sexo==0 | raza==0|grupo==0|ci==0){
        return Swal.fire("Mensaje de advertencia","Llene los campos vacios","warning");
    }

    if($.isNumeric(ci)==false){
        return Swal.fire("Mensaje de advertencia","El CI solo debe tener numeros y tener 11 digitos","warning");
    }

   /** -Ajax **/
    $.ajax({
        url:'../controlador/ajax_estudiantes.php',
        type:'POST',
        data: {
            accion:2,
            ci:ci,
            nombre:nombre,
            raza:raza,
            sexo:sexo,
            grupo:grupo
        }
    }).done(function (resp) {

        if (resp[3]==1){
        $('#agregar_estudiante').modal('hide');
        return Swal.fire("Mensaje de confirmacion","Usuario Registrado","success").then((value) =>{
            $("#estudiantes").DataTable().ajax.reload();
        } )
         }else {
             return Swal.fire("Mensaje de advertencia","El CI ya esta registrado en la base de datos","warning");
         }
    })



}
    $("#nombre,#nombre_editar").on("keyup",function () {
        this.value = (this.value + '').replace(/[^A-zÑ-ñÁ-Ú ]/g, '');
    });

    /** PASAR LOS DATOS AL MODAL DE EDITAR **/
    $(document).on("click", ".btnEditar", function(){
        var fila;
    fila = $(this).closest("tr");
    var ci = fila.find('td:eq(1)').text();
    var nombre = fila.find('td:eq(2)').text();
    var grupo = fila.find('td:eq(3)').text();
    var raza = fila.find('td:eq(4)').text();
    var sexo = fila.find('td:eq(5)').text();
    var grupo_id;
    var raza_id;
    var sexo_id;
    $("#id").val(ci);
    $("#nombre_editar").val(nombre);
    $("#grupo_editar").find('option').each(function () {
        if($(this).text() == grupo){
            grupo_id = $(this).val();
        }
    })
    $("#raza_editar").find('option').each(function () {
        if($(this).text() == raza){
            raza_id = $(this).val();
        }
    })
    $("#sexo_editar").find('option').each(function () {
        if($(this).text() == sexo){
            sexo_id = $(this).val();
        }
    })
    $("#grupo_editar").val(grupo_id);
    $("#sexo_editar").val(sexo_id);
    $("#raza_editar").val(raza_id);



});
    function actualizar_estudiante() {
        var nombre = $('#nombre_editar').val();
        var grupo = $('#grupo_editar').val();
        var ci = $('#id').val();
        var sexo = $('#sexo_editar').val();
        var raza = $('#raza_editar').val();

        /** --Validaciones al formulario de actualizar-- **/

        if (nombre.length==0 | sexo==0 | raza==0|grupo==0){
            return Swal.fire("Mensaje de advertencia","Llene los campos vacios","warning");
        }

        $.ajax({
            url:'../controlador/ajax_estudiantes.php',
            type:'POST',
            data: {
                accion:6,
                ci:ci,
                nombre:nombre,
                raza:raza,
                sexo:sexo,
                grupo:grupo
            }
        }).done(function (resp) {

            $('#actualizar_estudiante').modal('hide');
                return Swal.fire("Mensaje de confirmacion","Usuario Actualizado","success").then((value) =>{
                    $("#estudiantes").DataTable().ajax.reload();
                } )

        })

    }
    $(document).on("click", ".btnEliminar", function() {
        var fila;
        fila = $(this).closest("tr");
        var ci = fila.find('td:eq(1)').text();

        Swal.fire({
            title: 'Estas seguro que quieres eliminar este estudiante?',
            text: "Los cambios no son reversibles!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url:'../controlador/ajax_estudiantes.php',
                    type:'POST',
                    data: {
                        accion:7,
                        ci:ci,
                    }
                }).done(function (resp) {

                    Swal.fire(
                        'Eliminado!',
                        'El estudiante ha sido eliminado.',
                        'success'
                    )
                    $("#estudiantes").DataTable().ajax.reload();
                })


            }
        })








        })
