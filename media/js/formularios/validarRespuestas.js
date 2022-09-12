
function validarRespuestas(){

    var total = 5; //Total preguntas
    var puntos = 0; //Total puntos

    var formRes = document.forms["form-eval"];
    var respuestas = ["b","c","d","a","b"]; //Arreglo respuestas

    for(var i = 1; i <= total; i++){
        if(formRes["pregunta" + i].value === null || formRes["pregunta" + i].value === ""){
            Swal.fire({
                title: "Error en la validación",
                icon: 'warning',
                text:'Por favor responda la pregunta' + i,
                confirmButtonText: 'Aceptar'
                });
            return false;
        }
        else if(formRes["pregunta" + i].value === respuestas[i - 1]){
            puntos++;
        }
    }

    var resultado = document.getElementById("resultado");
    resultado.innerHTML = '<h3>Respuestas correctas: <span>'+ puntos +'</span> de <span>'+ total +' preguntas</span></h3>';

    return false;

}