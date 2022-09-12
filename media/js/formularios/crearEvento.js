function crearEventos() {
    var NombreAg, correo, celular, tpCapacitacion, fechafinal, fechainicial,NombreEv ;
    NombreAg = document.getElementById("NombreAg").value;
    correo = document.getElementById("correo").value;
    celular = document.getElementById("celular").value;
    tpCapacitacion = document.getElementById("tpCapacitacion").value;
    fechafinal = document.getElementById("fechafinal").value;
    fechainicial = document.getElementById("fechainicial").value;
    NombreEv = document.getElementById("NombreEv").value;
    expresionEmail = /^[A-Za-z0-9._-]+@[a-z]+\.[\w.-]*[a-z][a-z]+$/;
    expresionLetras = /^[A-Za-zñÑáéíóúÁÉÍÓÚ\s]{20,250}$/;
    // expresionMensaje = /^[a-zA-Z0-9?$@#()'!,+\-=_:.&€£*%ñÑáéíóúÁÉÍÓÚ\s]+$/;
  
  if( NombreAg === ""  ||  correo === "" ||  celular === "" ||  tpCapacitacion  === "" ||  fechafinal  === "" ||  fechainicial === "" || NombreEv   === ""){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'Todos los campos son obligatorios',
      confirmButtonText: 'Aceptar'
      });
    return false
  }
  else if(celular.length < 9){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El campo Celular debe tener 9 números.',
      confirmButtonText: 'Aceptar'
      });
    return false
  }
  else if(isNaN(celular)){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El Celular ingresado no es un número. Intente nuevamente.',
      confirmButtonText: 'Aceptar'
      });
    return false
  }
  else if(!expresionEmail.test(correo)){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El correo electrónico ingresado no es válido. Este campo puede tener letras, números, puntos, guiones, seguido de @ y el dominio correspondiente.',
      confirmButtonText: 'Aceptar'
      });
    return false
  }
}