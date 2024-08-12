class Mensajes {

    static mensajesGlobales(des){
        var salida;
        if(des === 0){
            salida = "";
        }
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
            salida = "No puedes agregar más cantidades.";
        }
        if(des === 109){
            salida = "No puedes eliminar más cantidades.";
        }
        if(des === 110){
            salida = "Debes aceptar los términos y condiciones para continuar.";
        }
        if(des === 111){
            salida = "Cargando comentario...";
        }
        if(des === 112){
            salida = "EL comentario se cargo exitisamente";
        }
        if(des === 113){
            salida = "No hay nada escrito, escribe algo por favor";
        }
        if(des === 114){
            salida = "Cargando Respuesta";
        }
        if(des === 115){
            salida = "Respuesta cargada";
        }
        if(des === 116){
            salida = "No puedes dejar el comentario vacio";
        }
        if(des === 117){
            salida = "Cargando actualizacion de comentario";
        }
        if(des === 118){
            salida = "El comentario se actualizo correctamente";
        }
        if(des === 119){
            salida = "Su correo está siendo enviado......";
        }
        if(des === 120){
            salida = "Su correo fue enviado exitosamente. Verifica su bandeja de entradas o spam.";
        }
        if(des === 121){
            salida = "El correo que ingresaste no se ha podido encontrar. Verifica si está bien escrito.";
        }
        if(des === 122){
            salida = "Creando oferta";
        }
        if(des === 123){
            salida = "Oferta creada";
        }
        if(des === 124){
            salida = "La oferta ya existe";
        }
        if(des === 125){
            salida = "No se puede encotrar el codigo";
        }
        if(des === 126){
            salida = "Actualizando..";
        }
        if(des === 127){
            salida = "Oferta actualizada";
        }
        if(des === 128){
            salida = "Eliminando...";
        }
        if(des === 129){
            salida = "Oferta Eliminada";
        }
        if(des === 130){
            salida = "Esta oferta no existe";
        }
        if(des === 131){
            salida = "Esta oferta no existe";
        }
        if(des === 132){
            salida = "Eliminar";
        }
        if(des === 133){
            salida = "Presiona OK para confirmar";
        }
        if(des === 134){
            salida = "La Categoria se a creado correctamente.";
        }
        if(des === 135){
            salida = "La Categoria ya existe.";
        }
        if(des === 136){
            salida = "A continuacion enviaremos  un correo para recuperar su contraseñe";
        }
        if(des === 137){
            salida = "A continuacion enviaremos un correo para cambiar su correo";
        }
        if(des === 138){
            salida = "Eilimar foto";
        }
        if(des === 139){
            salida = "¿Estas seguro de eliminar tu foto?";
        }
        if(des === 140){
            salida = "Presiona OK para confirmar";
        }
        if(des === 141){
            salida = "Foto eliminada";
        }
        if(des === 142){
            salida = "Su foto de perfil se a eliminado";
        }
        if(des === 143){
            salida = "Algo ha fallado";
        }
        if(des === 144){
            salida = "Vaciando historial...";
        }
        if(des === 145){
            salida = "Historial Eliminado";
        }
        if(des === 146){
            salida = "Ve productos para ampliar tu historial";
        }
        if(des === 147){
            salida = "Tu historial ya esta vacio";
        }
        if(des === 148){
            salida = "La categoria se actualiza correctamente.";
        }
        if(des === 149){
            salida = "No existe es categoria";
        }
        if(des === 150){
            salida = "La categoria se elimino correctamnete";
        }
        if(des === 151){
            salida = "No se puede eliminar esta categoria por que contiene productos";
        }
        if(des === 152){
            salida = "El producto se actualizo correctamente";
        }
        if(des === 153){
            salida = "Cuenta creada correctamente";
        }
        if(des === 154){
            salida = "No se puedo crear la cuenta";
        }if(des === 155){
            salida = "Estas seguro de eliminar esta cuenta?";
        }
        if(des === 156){
            salida = "El usuario se actualizo correctamente";
        }
        if(des === 157){
            salida = "tienes que seleccionar un rango primero";
        }
        if(des === 158){
            salida = "No puedes actualizar este perfil";
        }
        if(des === 159){
            salida = "No se puedo actualizar el rango intenta mas tarde";
        }
        if(des === 160){
            salida = "Rango actualizado ";
        }
        if(des === 161){
            salida = "El codigo no coincide intenta mas tarde ";
        }
        if(des === 162){
            salida = "Verificando los datos ";
        }
        if(des === 163){
            salida = "Esto puede tardar unos segundos ";
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
        if(des === 206){
            salida = "No se encontro una direccion";
        }
        
        return salida;
    }

    static mensajesProductos(des,text = null,categoria = null){
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
        if(des === 307){
            salida = "No se pudo encontrar "+ text;
        }
        if(des === 308){
            salida = "No se puedo encontrar "+text+" En la seccion "+categoria;
        }
        if(des === 309){
            salida = "!Borrar producto¡";
        }
        if(des === 310){
            salida = "¿Estas seguro de eliminar el producto?";
        }
        if(des === 311){
            salida = "La imagen no cumple los estandares (formato y/o tamaño)";
        }if(des === 312){
            salida = "El porducto "+text+" no Contiene una oferta";
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
        if(des === 404){
            salida = "warning";
        }
        return salida;
    }

}