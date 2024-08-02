class Mensajes {

    static mensajesGlobales(des){
        var salida;
        if(des === 101){
            salida = "Error";
        }
        if(des === 102){
            salida = "Oops...";
        }
        if(des === 103){
            salida = "¡Cargado!";
        }
        if(des === 104){
            salida = "El Usuario y contraseña no coinciden.";
        }
        if(des === 105){
            salida = "Ups ocurrio un error al momento de verificar los datos, intenta más tarde.";
        }
        if(des === 106){
            salida = "Estos datos ya le pertenecen a un usuario, verifica nuevamente";
        }
        if(des === 107){
            salida = "Ups ah ocurrido un erro al crear el usuario, verifca que los datos sean correctos";
        }
        if(des === 108){
            salida = "No puedes comprar con esta cuenta";
        }
        if(des === 109){
            salida = "No puedes comprar con esta cuenta";
        }
        if(des === 110){
            salida = "No puedes comprar con esta cuenta";
        }
        if(des === 111){
            salida = "No puedes comprar con esta cuenta";
        }
        if(des === 112){
            salida = "No puedes comprar con esta cuenta";
        }
        if(des === 113){
            salida = "No puedes comprar con esta cuenta";
        }
        if(des === 114){
            salida = "No puedes comprar con esta cuenta";
        }
        if(des === 115){
            salida = "No puedes comprar con esta cuenta";
        }
        return salida;
    }

    static mensajesCarrito(des){
        var salida;
        if(des === 201){
            salida = "Su producto se cargo exitosamente";
        }
        if(des === 202){
            salida = "No tienes un carrito para agregar productos";
        }
        if(des === 203){
            salida = "Este producto ya esta agregado en el carrito.";
        }
        if(des === 204){
            salida = "No hay cantidades disponibles";
        }
        if(des === 205){
            salida = "No puedes comprar con esta cuenta";
        }
        return salida;
    }

    static mensajesProductos(des){
        var salida;
        if(des === 301){
            salida = "El codigo de este producto ya se encuntra creado";
        }
        if(des === 302){
            salida = "El producto se ha cardo exitosamente";
        }
        if(des === 303){
            salida = "Ocurrio un error al crear el producto";
        }
        if(des === 304){
            salida = "El producto no cumple los estandares (codigo,nombre,imagen)";
        }
        if(des === 305){
            salida = "La imagen no cumple los estandares (formato y/o tamaño)";
        }
        if(des === 306){
            salida = "La imagen no cumple los estandares (formato y/o tamaño)";
        }
        return salida;
    }

    static mensajesSeewalert(des){
        var salida;
        if(des === 401){
            salida = "error";
        }
        if(des === 402){
            salida = "success";
        }
        if(des === 403){
            salida = "question";
        }
        return salida;
    }

}