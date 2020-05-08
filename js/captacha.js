var verify = false; /* Variable global de verificacion */

function captacha() { /* Función para verificar datos */
    var captacha = prompt("Introduzca los siguientes numeros para continuar: 123789", ""); /* Alerta con campo de texto */
    if (captacha == "123789") { /* Si los datos ingresados por el usuario son los mismo que la alerta, ejecutar */
        alert("Verificado");
        verify = true;
    }else{ /* En caso contrario ejecutar */
        alert("No se ha podido comprobar su identidad");
    }
}

function requiredLogin(){ /* Funcion para verificar la creacion del usuario */
    if(verify == true){ /* Si se completo el captacha ejecutar */
        var crear = confirm("¿Esta de acuerdo con proporcionar estas credenciales?"); /* Enviar una pregunta y responder true o false */
        if(crear == true){ /* Si se dio true, ejecutar */
            document.Login.submit(); /* Enviar los datos requeridos del formulario a la conexion de la BD */
        }
    }else{ /* En caso contrario */
        alert("Verifique que no es un robot"); /* Indicar que se verifique el captacha */
    }
}