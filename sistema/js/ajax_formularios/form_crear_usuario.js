$(document).ready(function () {

  /* Envio de formulario para crear ticket*/
  $("#form_crear_usuario").on("submit", function (e) {
    e.preventDefault();


    var parametros = new FormData($("#form_crear_usuario")[0]);
    var btnEnviar = $("#btnEnviar_form_crear_usuario");

    // valida si esta vacio, si lo esta envia una alerta y retorna a la pagina del formulario
    var tipDocumento = $("#tipDocumento").val();
    if (tipDocumento == null || tipDocumento == 0) {
      Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'Debe seleccionar alguna opcion en TIPO DOCUMENTO, no puede estar vacio'
      });
      $("#tipDocumento").css("border-color", "red");
      return
    } else {
      $("#tipDocumento").css("border-color", "#ced4da");
    }

    // valida si esta vacio, si lo esta envia una alerta y retorna a la pagina del formulario
    var numDocumento = $("#numDocumento").val();
    if (numDocumento.length == 0 || numDocumento == null || /^\s+$/.test(numDocumento)) {
      Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'El campo NUMERO DOCUMENTO no puede estar vacio'
      });
      $("#numDocumento").css("border-color", "red");
      return
    } else {
      $("#numDocumento").css("border-color", "#ced4da");
    }

    // valida si esta vacio, si lo esta envia una alerta y retorna a la pagina del formulario
    var nit = $("#nit").val();
    if (nit.length == 0 || nit == null || /^\s+$/.test(nit)) {
      Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'El campo NIT no puede estar vacio'
      });
      $("#nit").css("border-color", "red");
      return
    } else {
      $("#nit").css("border-color", "#ced4da");
    }

    // valida si esta vacio, si lo esta envia una alerta y retorna a la pagina del formulario
    var nombres = $("#nombres").val();
    if (nombres.length == 0 || nombres == null || /^\s+$/.test(nombres)) {
      Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'El campo NOMBRES no puede estar vacio'
      });
      $("#nombres").css("border-color", "red");
      return
    } else {
      $("#nombres").css("border-color", "#ced4da");
    }

    // valida si esta vacio, si lo esta envia una alerta y retorna a la pagina del formulario
    var apellidos = $("#apellidos").val();
    if (apellidos.length == 0 || apellidos == null || /^\s+$/.test(apellidos)) {
      Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'El campo APELLIDOS no puede estar vacio'
      });
      $("#apellidos").css("border-color", "red");
      return
    } else {
      $("#apellidos").css("border-color", "#ced4da");
    }

    // valida si esta vacio, si lo esta envia una alerta y retorna a la pagina del formulario
    var direccion = $("#direccion").val();
    if (direccion.length == 0 || direccion == null || /^\s+$/.test(direccion)) {
      Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'El campo DIRECCIÓN no puede estar vacio'
      });
      $("#direccion").css("border-color", "red");
      return
    } else {
      $("#direccion").css("border-color", "#ced4da");
    }

    // valida si esta vacio, si lo esta envia una alerta y retorna a la pagina del formulario
    var telefono = $("#telefono").val();
    if (isNaN(telefono) || /^\s+$/.test(telefono) || telefono == null || telefono == 0) {
      Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'El campo TELEFONO no puede estar vacio ni contener letras'
      });
      $("#telefono").css("border-color", "red");
      return
    } else {
      $("#telefono").css("border-color", "#ced4da");
    }


    // valida si esta vacio, si lo esta envia una alerta y retorna a la pagina del formulario
    var usuario = $("#usuario").val();
    if (usuario.length == 0 || usuario == null || /^\s+$/.test(usuario)) {
      Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'El campo USUARIO no puede estar vacio'
      });
      $("#usuario").css("border-color", "red");
      return
    } else {
      $("#usuario").css("border-color", "#ced4da");
    }


    // valida si esta vacio, si lo esta envia una alerta y retorna a la pagina del formulario
    var contrasena = $("#contrasena").val();
    if (contrasena.length == 0 || contrasena == null || /^\s+$/.test(contrasena)) {
      Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'El campo CLAVE no puede estar vacio'
      });
      $("#contrasena").css("border-color", "red");
      return
    } else {
      $("#contrasena").css("border-color", "#ced4da");
    }


    // valida si esta vacio, si lo esta envia una alerta y retorna a la pagina del formulario
    var rol= $("#rol").val();
    if (rol == null || rol == 0) {
      Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'Debe seleccionar alguna opcion en ROL, no puede estar vacio'
      });
      $("#rol").css("border-color", "red");
      return
    } else {
      $("#rol").css("border-color", "#ced4da");
    }

    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: true
    })

    swalWithBootstrapButtons.fire({
      title: '¿Estas seguro?',
      text: "Despues de guardar no se podra reversar",
      icon: 'warning',
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Guardar',
      showCancelButton: true,
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {

        $.ajax({
          data: parametros,
          url: "../sistema/logica/ajax_formularios/crud_usuarios/form_crear_usuario.php",
          type: "POST",
          contentType: false,
          processData: false,
          success: function (data) {
            btnEnviar.val("Guardando.."); // Para input de tipo button
            btnEnviar.attr("disabled", "disabled");
            btnEnviar.val("Enviado"); // Para input de tipo button
            $("body").append(data);
            // setTimeout(function () {
            //   location.reload("./././crud_usuarios/crear_usuario.php");
            // }, 3000); //hace redireccion despues de 3 segundos
          },
          error: function (jqXHR, textStatus, errorThrown) { // Si el servidor no envia una respuesta se 
            // ejecutara alguna de las siguientes alertas de acuerdo error
            if (jqXHR.status === 0) {

              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Not connect: Verify Network.'
              })

            } else if (jqXHR.status == 404) {

              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'La pagina no fue encontrada[404]'
              })

            } else if (jqXHR.status == 500) {

              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Internal Server Error [500].'
              })

            } else if (textStatus === 'parsererror') {

              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Error de análisis JSON solicitado.'
              })

            } else if (textStatus === 'timeout') {

              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Time out error.'
              })

            } else if (textStatus === 'abort') {

              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ajax request aborted.'
              })

            } else {

              alert('Uncaught Error: ' + jqXHR.responseText);
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Uncaught Error: ' + jqXHR.responseText
              })

            }
          }
        });
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Registro Cancelado',
          'Has Cancelado el envio',
          'error'
        )
      }
    });
  });
});