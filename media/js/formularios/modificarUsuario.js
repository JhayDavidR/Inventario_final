function validarCrearUser() {
    var primer_nombre, segundo_nombre, primer_apellido , segundo_apellido, documento, celular,  telefono , correo,  ciudad, usuario, contrasena;

    primer_nombre = document.getElementById("primer_nombre").value;
    segundo_nombre = document.getElementById("segundo_nombre").value;
    primer_apellido = document.getElementById("primer_apellido").value;
    segundo_apellido = document.getElementById("segundo_apellido").value;
    documento = document.getElementById("documento").value;
    celular = document.getElementById("celular").value;
    telefono = document.getElementById("telefono").value;
    correo = document.getElementById("correo").value;
    ciudad = document.getElementById("ciudad").value;
    usuario = document.getElementById("usuario").value;
    contrasena = document.getElementById("contrasena").value;
  
    expresionEmail = /^[A-Za-z0-9._-]+@[a-z]+\.[\w.-]*[a-z][a-z]+$/;
    expresionCamposNom = /^[A-Za-zñÑáéíóúÁÉÍÓÚ\s]{3,50}$/;
    expresionCamposCiu = /^[A-Za-zñÑáéíóúÁÉÍÓÚ\s]{5,30}$/;
    expresionMensaje = /^[a-zA-Z0-9?$@#()'!,+\-=_:.&€£*%ñÑáéíóúÁÉÍÓÚ\s]+$/;
  
  if( primer_nombre === "" || segundo_nombre === "" ||  primer_apellido === "" || segundo_apellido === "" || segundo_apellido === "" ||
        documento === "" || celular === "" || telefono === "" || correo === "" || ciudad === "" || usuario === ""){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'Todos los campos son obligatorios',
      confirmButtonText: 'Aceptar'
      });
    return false
  }
  // Validaciones Nombres y Apellidos
  else if(primer_nombre.length <3 ||primer_nombre.length >50){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El campo primer nombre debe tener mínimo 3 y máximo 50 caracteres entre letras y espacios.',
      confirmButtonText: 'Aceptar'
      });
    return false
  }
  else if(!expresionCamposNom.test(primer_nombre)){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El campo primer nombre únicamente debe tener letras mayúsculas o minúsculas, espacios, acentos y su longitud puede estar mínimo de 3 caracteres y máximo de 30 caracteres.',
      confirmButtonText: 'Aceptar'
      });
    return false
  }
  else if(segundo_nombre.length <3 ||segundo_nombre.length >50){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El campo segundo nombre debe tener mínimo 3 y máximo 50 caracteres entre letras y espacios.',
      confirmButtonText: 'Aceptar'
      });
    return false
  }

  else if(!expresionCamposNom.test(segundo_nombre)){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El campo segundo nombre únicamente debe tener letras mayúsculas o minúsculas, espacios, acentos y su longitud puede estar mínimo de 3 caracteres y máximo de 30 caracteres.',
      confirmButtonText: 'Aceptar'
      });
    return false
  }
  else if(primer_apellido.length <3 ||primer_apellido.length >50){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El campo primer apellido debe tener mínimo 3 y máximo 50 caracteres entre letras y espacios.',
      confirmButtonText: 'Aceptar'
      });
    return false
  }

  else if(!expresionCamposNom.test(primer_apellido)){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El primer apellido únicamente debe tener letras mayúsculas o minúsculas, espacios, acentos y su longitud puede estar mínimo de 3 caracteres y máximo de 30 caracteres.',
      confirmButtonText: 'Aceptar'
      });
    return false
  }

  else if(segundo_apellido.length <3 ||segundo_apellido.length >50){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El campo segundo apellido debe tener mínimo 3 y máximo 50 caracteres entre letras y espacios.',
      confirmButtonText: 'Aceptar'
      });
    return false
  }
  else if(!expresionCamposNom.test(segundo_apellido)){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El segundo apellido únicamente debe tener letras mayúsculas o minúsculas, espacios, acentos y su longitud puede estar mínimo de 3 caracteres y máximo de 30 caracteres.',
      confirmButtonText: 'Aceptar'
      });
    return false
  }
// Fin validaciones Nombres y Apellido

// Validaciones Documento, Telefono y Celular
else if(documento.length <9 || documento.length >10){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El campo Documento debe tener mínimo 9 y máximo 10 números.',
      confirmButtonText: 'Aceptar'
      });
    return false
  }
  else if(isNaN(documento)){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El Documento ingresado no es un número. Intente nuevamente.',
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

  else if(telefono.length > 7 ){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El campo teléfono debe maximo 7',
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
  // Fin Validaciones  Documento, Telefono y Celular

  // Validaciones Correo Eléctronico
  else if(!expresionEmail.test(correo)){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El correo electrónico ingresado no es válido. Este campo puede tener letras, números, puntos, guiones, seguido de @ y el dominio correspondiente.',
      confirmButtonText: 'Aceptar'
      });
    return false
  }
  // Fin Validaciones Correo Eléctronico

  // Validaciones Ciudad
  else if(ciudad.length <3 ||ciudad.length >30){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El campo ciudad debe tener mínimo 3 y máximo 30 caracteres entre letras y espacios.',
      confirmButtonText: 'Aceptar'
      });
    return false
  }
  else if(!expresionCamposCiu.test(ciudad)){
    Swal.fire({
      title: "Error en la validación",
      icon: 'warning',
      text:'El campo ciudad  únicamente debe tener letras mayúsculas o minúsculas, espacios, acentos y su longitud puede estar mínimo de 3 caracteres y máximo de 30 caracteres.',
      confirmButtonText: 'Aceptar'
      });
    return false
  }
  // Fin Validaciones Correo Eléctronico

}