$(document).ready(function () {


    $('#login').on('click',function verificar_usario(event) {
        event.preventDefault();
        var usuario  = $('#usuario').val();
        var contrasena = $('#contrasena').val();

        if(usuario.length ==0 || contrasena.length == 0){
            return Swal.fire("Mensaje de advertencia","Llene los campos","warning");
        }
        $.ajax({
                   url : '../controlador/ajax_usuario.php',
                   type: 'POST',
                   data: {usuario,contrasena,accion:1},

            }).done(function (resp) {
                    if(resp==0){
                        return Swal.fire("Mensaje de advertencia","Usuario y/o Contrase\u00f1a incorrectos","error")

                    }else
                        {
                            var     data = JSON.parse(resp);
                            $.ajax({
                                url:'../controlador/ajax_usuario.php',
                                type:'POST',
                                data:{
                                    accion:2,
                                    id_usuario: data[0].id_usuario,
                                    usuario:data[0].usuario,
                                    rol:data[0].rol
                                }
                            }).done(function (resp) {
                                location.reload();
                            })



                        }
            });



        })




});
