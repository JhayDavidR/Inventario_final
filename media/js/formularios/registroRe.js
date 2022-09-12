

function validarRepuestos() {
    var repuesto, NombreRe, tipoRe;
    repuesto = document.getElementById("repuesto").value;
    NombreRe = document.getElementById("NombreRe").value;
    tipoRe = document.getElementById("tipoRe").value;
    expresionLetras = /^[A-Za-zñÑáéíóúÁÉÍÓÚ\s]{3,50}$/;
    // expresionMensaje = /^[a-zA-Z0-9?$@#()'!,+\-=_:.&€£*%ñÑáéíóúÁÉÍÓÚ\s]+$/;
  
  if( repuesto === ""  || NombreRe === ""  || tipoRe === ""){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'Todos los campos son obligatorios',
      confirmButtonText: 'Aceptar'
      });
    return false
  }
  
// Validaciones repuesto
else if(!isNaN(repuesto)){
  Swal.fire({
    title: "Error en la validación",
    icon: 'warning',
    text:'El Documento ingresado no es un número. Intente nuevamente.',
    confirmButtonText: 'Aceptar'
    });
  return false
}

else if(repuesto.length <9 || repuesto.length >10){
  Swal.fire({
    title: "Error en la validación",
    icon: 'warning',
    text:'El campo repuesto debe tener mínimo 9 y máximo 10 números.',
    confirmButtonText: 'Aceptar'
    });
  return false
}


  else if(NombreRe.length <3 || NombreRe .length >50){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El campo nombre de equipo debe tener mínimo 3 y máximo 50 caracteres entre letras y espacios.',
      confirmButtonText: 'Aceptar'
      });
    return false
  }
  else if(!expresionLetras.test(NombreRe)){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El campo Nombre Equipo únicamente debe tener letras mayúsculas o minúsculas, espacios, acentos y su longitud puede estar mínimo de 3 caracteres y máximo de 30 caracteres.',
      confirmButtonText: 'Aceptar'
      });
    return false
  }
  else if(tipoRe .length <3 || tipoRe .length >30){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El campo tipo de equipo debe tener mínimo 3 y máximo 30 caracteres entre letras y espacios.',
      confirmButtonText: 'Aceptar'
      });
    return false
  }
  else if(!expresionLetras.test(tipoRe )){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El campo Tipo únicamente debe tener letras mayúsculas o minúsculas, espacios, acentos y su longitud puede estar mínimo de 3 caracteres y máximo de 30 caracteres.',
      confirmButtonText: 'Aceptar'
      });
    return false
  }

 
}