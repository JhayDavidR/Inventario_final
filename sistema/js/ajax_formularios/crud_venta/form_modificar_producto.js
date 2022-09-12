$(document).ready(function () {
  /* Envio de formulario para crear ticket*/
  $("#form_modificar_producto").on("submit", function (e) {
    e.preventDefault();

    var parametros = new FormData($("#form_modificar_producto")[0]);
    var btnEnviar = $("#btnEnviar_form_modificar_producto");

    // valida si esta vacio, si lo esta envia una alerta y retorna a la pagina del formulario
    var nombreProducto = $("#nombreProducto").val();
    if (
      nombreProducto.length == 0 ||
      nombreProducto == null ||
      /^\s+$/.test(nombreProducto)
    ) {
      Swal.fire({
        icon: "warning",
        title: "Oops...",
        text: "El campo NOMBRE PRODUCTO no puede estar vacio",
      });
      $("#nombreProducto").css("border-color", "red");
      return;
    } else {
      $("#nombreProducto").css("border-color", "#ced4da");
    }

    // valida si esta vacio, si lo esta envia una alerta y retorna a la pagina del formulario
    var referencia = $("#referencia").val();
    if (
      referencia.length == 0 ||
      referencia == null ||
      /^\s+$/.test(referencia)
    ) {
      Swal.fire({
        icon: "warning",
        title: "Oops...",
        text: "El campo REFERENCIA no puede estar vacio",
      });
      $("#referencia").css("border-color", "red");
      return;
    } else {
      $("#referencia").css("border-color", "#ced4da");
    }

    // valida si esta vacio, si lo esta envia una alerta y retorna a la pagina del formulario
    var precio = $("#precio").val();
    if (
      isNaN(precio) ||
      /^\s+$/.test(precio) ||
      precio == null ||
      precio == 0
    ) {
      Swal.fire({
        icon: "warning",
        title: "Oops...",
        text: "El campo PRECIO no puede estar vacio ni contener letras",
      });
      $("#precio").css("border-color", "red");
      return;
    } else {
      $("#precio").css("border-color", "#ced4da");
    }
    // valida si esta vacio, si lo esta envia una alerta y retorna a la pagina del formulario
    var peso = $("#peso").val();
    if (
      isNaN(peso) ||
      /^\s+$/.test(peso) ||
      peso == null ||
      peso == 0
    ) {
      Swal.fire({
        icon: "warning",
        title: "Oops...",
        text: "El campo PESO no puede estar vacio ni contener letras",
      });
      $("#peso").css("border-color", "red");
      return;
    } else {
      $("#peso").css("border-color", "#ced4da");peso
    }

    // valida si esta vacio, si lo esta envia una alerta y retorna a la pagina del formulario
    var categoria = $("#categoria").val();
    if (categoria == null || categoria == 0) {
      Swal.fire({
        icon: "warning",
        title: "Oops...",
        text: "Debe seleccionar alguna opcion en CATEGORIA, no puede estar vacio",
      });
      $("#categoria").css("border-color", "red");
      return;
    } else {
      $("#categoria").css("border-color", "#ced4da");
    }

        // valida si esta vacio, si lo esta envia una alerta y retorna a la pagina del formulario
    var stock = $("#stock").val();
    if (
      isNaN(stock) ||
      /^\s+$/.test(stock) ||
      stock == null ||
      stock == 0
    ) {
      Swal.fire({
        icon: "warning",
        title: "Oops...",
        text: "El campo STOCK no puede estar vacio ni contener letras",
      });
      $("#stock").css("border-color", "red");
      return;
    } else {
      $("#stock").css("border-color", "#ced4da");peso
    }

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
            url: "../sistema/logica/ajax_formularios/crud_venta/form_modificar_producto.php",
            type: "POST",
            contentType: false,
            processData: false,
            success: function (data) {
              btnEnviar.val("Guardando.."); // Para input de tipo button
              btnEnviar.attr("disabled", "disabled");
              btnEnviar.val("Enviado"); // Para input de tipo button
              $("body").append(data);
              // setTimeout(function () {
              //   location.reload("./././crud_usuarios/modificar_producto.php");
              // }, 3000); //hace redireccion despues de 3 segundos
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
