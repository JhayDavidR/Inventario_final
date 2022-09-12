

function validarContactenos() {
    var nombre, apellido, telefono, email, mensaje;

    nombre = document.getElementById("nombre").value;
    apellido = document.getElementById("apellido").value;
    telefono = document.getElementById("telefono").value;
    email = document.getElementById("email").value;
    mensaje = document.getElementById("mensaje").value;
  
    expresionEmail = /^[A-Za-z0-9._-]+@[a-z]+\.[\w.-]*[a-z][a-z]+$/;
    expresionLetras = /^[A-Za-zñÑáéíóúÁÉÍÓÚ\s]{3,30}$/;
    expresionMensaje = /^[a-zA-Z0-9?$@#()'!,+\-=_:.&€£*%ñÑáéíóúÁÉÍÓÚ\s]+$/;
  
  if(nombre === "" || apellido === "" || telefono === "" || email === "" || mensaje === ""){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'Todos los campos son obligatorios',
      confirmButtonText: 'Aceptar'
      });
    return false
  }
  else if(nombre.length <3 || nombre.length >30){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El campo nombre debe tener mínimo 3 y máximo 30 caracteres entre letras y espacios.',
      confirmButtonText: 'Aceptar'
      });
    return false
  }
  else if(!expresionLetras.test(nombre)){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El campo nombre únicamente debe tener letras mayúsculas o minúsculas, espacios, acentos y su longitud puede estar mínimo de 3 caracteres y máximo de 30 caracteres.',
      confirmButtonText: 'Aceptar'
      });
    return false
  }
  else if(apellido.length <3 || apellido.length >30){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El campo apellido debe tener mínimo 3 y máximo 30 caracteres entre letras y espacios.',
      confirmButtonText: 'Aceptar'
      });
    return false
  }
  else if(!expresionLetras.test(apellido)){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El campo apellido únicamente debe tener letras mayúsculas o minúsculas, espacios, acentos y su longitud puede estar mínimo de 3 caracteres y máximo de 30 caracteres..',
      confirmButtonText: 'Aceptar'
      });
    return false
  }
  else if(telefono.length <7 || telefono.length >10){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El campo teléfono debe tener mínimo 7 y máximo 10 números.',
      confirmButtonText: 'Aceptar'
      });
    return false
  }
  else if(isNaN(telefono)){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El teléfono ingresado no es un número. Intente nuevamente.',
      confirmButtonText: 'Aceptar'
      });
    return false
  }
  else if(!expresionEmail.test(email)){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El correo electrónico ingresado no es válido. Este campo puede tener letras, números, puntos, guiones, seguido de @ y el dominio correspondiente.',
      confirmButtonText: 'Aceptar'
      });
    return false
  }
  else if(mensaje.length <5 || mensaje.length >500){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El campo del mensaje debe tener mínimo 5 caracteres y máximo 500 caracteres.',
      confirmButtonText: 'Aceptar'
      });
    return false
  }
  else if(!expresionMensaje.test(mensaje)){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El campo del mensaje únicamente puede tener letras mayúsculas o minúsculas, números, espacios, acentos y signos de puntuación.',
      confirmButtonText: 'Aceptar'
      });
    return false
  }
  else if(!document.getElementById('acepto').checked){
    Swal.fire({
      title: "Error en la validacións",
      icon: 'warning',
      text:'La casilla de verificación para la política de privacidad no se encuentra seleccionada.',
      confirmButtonText: 'Aceptar'
      });
    return false
  }
  
}