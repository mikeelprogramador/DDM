

function alertPro(mensaje){
    if(mensaje === "0" ){
        alertUrl(Mensajes.mensajesSeewalert(401),Mensajes.mensajesGlobales(102),Mensajes.mensajesProductos(301),'admin.php?seccion=seccion-ag-pro'); 
    }
    //Mensaje de error del producto
    if( mensaje == "1" ){
        alertUrl(Mensajes.mensajesSeewalert(402),Mensajes.mensajesGlobales(103),Mensajes.mensajesProductos(302),'admin.php?');  
    }
    if( mensaje == "2" ){
        alertUrl(Mensajes.mensajesSeewalert(401),Mensajes.mensajesGlobales(102),Mensajes.mensajesProductos(303),'admin.php?seccion=seccion-ag-pro'); 
    }
    //Mensaje de error de la imagen 
    if( mensaje == "img0" ){
        alertUrl(Mensajes.mensajesSeewalert(401),Mensajes.mensajesGlobales(102),Mensajes.mensajesProductos(304),'admin.php?seccion=seccion-ag-pro'); 
    }
    if( mensaje == "img1" ){
        alertUrl(Mensajes.mensajesSeewalert(401),Mensajes.mensajesGlobales(102),Mensajes.mensajesProductos(305),'admin.php?seccion=seccion-ag-pro'); 
    }
    if( mensaje == "limitesImg" ){
        alertUrl(Mensajes.mensajesSeewalert(401),Mensajes.mensajesGlobales(102),Mensajes.mensajesProductos(306),''); 
    }
}

function alertCarrito(des){
    if(des === "1" ){
        alert(Mensajes.mensajesSeewalert(402),Mensajes.mensajesGlobales(103),Mensajes.mensajesCarrito(201));
    }
    if(des === "2" ){
        alert(Mensajes.mensajesSeewalert(401), Mensajes.mensajesGlobales(101), Mensajes.mensajesCarrito(202));
    }
    if( des === "3" ){
        alert(Mensajes.mensajesSeewalert(401), Mensajes.mensajesGlobales(101),Mensajes.mensajesCarrito(203));
    }
    if( des === "4" ){
        alert(Mensajes.mensajesSeewalert(401),Mensajes.mensajesGlobales(101),Mensajes.mensajesCarrito(204));
    }
    if( des === "5" ){
        alert(Mensajes.mensajesSeewalert(401),Mensajes.mensajesGlobales(101),Mensajes.mensajesCarrito(205));
    }
}

function verificacion(mensaje){
    //Lista de error cuando el usuario inicia sesion
    if( mensaje == "error-1" ){
        alertUrl(Mensajes.mensajesSeewalert(401),Mensajes.mensajesGlobales(102),Mensajes.mensajesGlobales(104),'index.php'); 
    }
    if( mensaje === "error0" ){
        alertUrl(Mensajes.mensajesSeewalert(401),Mensajes.mensajesGlobales(102),Mensajes.mensajesGlobales(105),'index.php'); 
    }
    //Lista de errores cuando el usaurio crea una cuanta
    if( mensaje === "-1error" ){
        alertUrl(Mensajes.mensajesSeewalert(401),Mensajes.mensajesGlobales(102),Mensajes.mensajesGlobales(106),'index.php'); 
    }
    if( mensaje === "0error" ){
        alertUrl(Mensajes.mensajesSeewalert(401),Mensajes.mensajesGlobales(102),Mensajes.mensajesGlobales(107),'index.php'); 
    }

}

