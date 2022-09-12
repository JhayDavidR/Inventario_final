

function validarRepuestosEq() {
  var NombreEq, Noserie, modelo, tipo, NumPla, mantenimiento, registroS, alimentacion, calibracion;

  NombreEq = document.getElementById("NombreEq").value;
  Noserie = document.getElementById("Noserie").value;
  modelo = document.getElementById("modelo").value;
  tipo = document.getElementById("tipo").value;
  NumPla = document.getElementById("NumPla").value;
  mantenimiento = document.getElementById("mantenimiento").value;
  registroS = document.getElementById("registroS").value;
  alimentacion = document.getElementById("alimentacion").value;
  calibracion = document.getElementById("calibracion").value;

  expresionLetras = /^[A-Za-zñÑáéíóúÁÉÍÓÚ\s]{3,100}$/;
  // expresionMensaje = /^[a-zA-Z0-9?$@#()'!,+\-=_:.&€£*%ñÑáéíóúÁÉÍÓÚ\s]+$/;

if( NombreEq === "" || Noserie === "" || modelo === "" || tipo === "" || NumPla === "" || mantenimiento === "" || registroS === "" || alimentacion === "" || calibracion  === ""){
  Swal.fire({
    title: "Error de validación",
    icon: 'warning',
    text:'Todos los campos son obligatorios',
    confirmButtonText: 'Aceptar'
    });
  return false
}
else if(NombreEq .length <3 || NombreEq .length >100){
  Swal.fire({
    title: "Error de validación",
    icon: 'warning',
    text:'El campo nombre de equipo debe tener mínimo 3 y máximo 100 caracteres entre letras y espacios.',
    confirmButtonText: 'Aceptar'
    });
  return false
}
else if(!expresionLetras.test(NombreEq)){
  Swal.fire({
    title: "Error de validación",
    icon: 'warning',
    text:'El campo Nombre Equipo únicamente debe tener letras mayúsculas o minúsculas, espacios, acentos y su longitud puede estar mínimo de 3 caracteres y máximo de 30 caracteres.',
    confirmButtonText: 'Aceptar'
    });
  return false
}



}