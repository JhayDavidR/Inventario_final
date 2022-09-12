

function validarMantenimiento() {
    var Idequipo, descripcion;
    Idequipo = document.getElementById("Idequipo").value;
    descripcion = document.getElementById("descripcion").value;
    expresionLetras = /^[A-Za-zñÑáéíóúÁÉÍÓÚ\s]{20,250}$/;
    // expresionMensaje = /^[a-zA-Z0-9?$@#()'!,+\-=_:.&€£*%ñÑáéíóúÁÉÍÓÚ\s]+$/;
  
  if( Idequipo === ""  || descripcion === ""){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'Todos los campos son obligatorios',
      confirmButtonText: 'Aceptar'
      });
    return false
  }


  else if(descripcion.length <20 || descripcion .length >250){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El campo descripción debe tener mínimo 20 y máximo 250 caracteres entre letras y espacios.',
      confirmButtonText: 'Aceptar'
      });
    return false
  }
  
 
}