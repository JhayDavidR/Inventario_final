$(document).ready(function () {
  /* Envio de formulario para crear ticket*/
  $("#form_registrar_venta").on("submit", function (e) {
    e.preventDefault();

    var parametros = new FormData($("#form_registrar_venta")[0]);
    var btnEnviar = $("#btnEnviar_form_registrar_venta");


    // valida si esta vacio, si lo esta envia una alerta y retorna a la pagina del formulario
    var cantidad = $("#cantidad").val();
    if (
      isNaN(cantidad) ||
      /^\s+$/.test(cantidad) ||
      cantidad == null ||
      cantidad == 0
    ) {
      Swal.fire({
        icon: "warning",
        title: "Oops...",
        text: "El campo CANTIDAD no puede estar vacio ni contener letras",
      });
      $("#cantidad").css("border-color", "red");
      return;
    } else {
      $("#cantidad").css("border-color", "#ced4da");
    }
    // valida si esta vacio, si lo esta envia una alerta y retorna a la pagina del formulario
    
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: "btn btn-success",
        cancelButton: "btn btn-danger",
      },
      buttonsStyling: true,
    });

    swalWithBootstrapButtons
      .fire({
        title: "¿Estas seguro?",
        text: "Despues de guardar no se podra reversar",
        icon: "warning",
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Guardar",
        showCancelButton: true,
        cancelButtonText: "Cancelar",
      })
      .then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            data: parametros,
            url: "../sistema/logica/ajax_formularios/crud_venta/form_registrar_venta.php",
            type: "POST",
            contentType: false,
            processData: false,
            success: function (data) {
              btnEnviar.val("Guardando.."); // Para input de tipo button
              btnEnviar.attr("disabled", "disabled");
              btnEnviar.val("Enviado"); // Para input de tipo button
              $("body").append(data);
              setTimeout(function () {
                window.location.href = "../principal/principal.php";
              }, 7000); //hace redireccion despues de 3 segundos
            },
            error: function (jqXHR, textStatus, errorThrown) {
              // Si el servidor no envia una respuesta se
              // ejecutara alguna de las siguientes alertas de acuerdo error
              if (jqXHR.status === 0) {
                Swal.fire({
                  icon: "error",
                  title: "Oops...",
                  text: "Not connect: Verify Network.",
                });
              } else if (jqXHR.status == 404) {
                Swal.fire({
                  icon: "error",
                  title: "Oops...",
                  text: "La pagina no fue encontrada[404]",
                });
              } else if (jqXHR.status == 500) {
                Swal.fire({
                  icon: "error",
                  title: "Oops...",
                  text: "Internal Server Error [500].",
                });
              } else if (textStatus === "parsererror") {
                Swal.fire({
                  icon: "error",
                  title: "Oops...",
                  text: "Error de análisis JSON solicitado.",
                });
              } else if (textStatus === "timeout") {
                Swal.fire({
                  icon: "error",
                  title: "Oops...",
                  text: "Time out error.",
                });
              } else if (textStatus === "abort") {
                Swal.fire({
                  icon: "error",
                  title: "Oops...",
                  text: "Ajax request aborted.",
                });
              } else {
                alert("Uncaught Error: " + jqXHR.responseText);
                Swal.fire({
                  icon: "error",
                  title: "Oops...",
                  text: "Uncaught Error: " + jqXHR.responseText,
                });
              }
            },
          });
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            "Registro Cancelado",
            "Has Cancelado el envio",
            "error"
          );
        }
      });
  });
});
