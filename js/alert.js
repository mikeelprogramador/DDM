

function alertPro(mensaje){
    if(mensaje === "0" ){
        alert("error","Oops...","El codigo de este producto ya se encuntra creado",'admin.php?seccion=seccion-ag-pro'); 
    }
    //Mensaje de error del producto
    if( mensaje == "1" ){
        alert("success","¡Cargado!","El producto se ha cardo exitosamente",'admin.php?');  
    }
    if( mensaje == "2" ){
        alert("error","Oops...","Ocurrio un error al crear el producto",'admin.php?seccion=seccion-ag-pro'); 
    }
    //Mensaje de error de la imagen 
    if( mensaje == "img0" ){
        alert("error","Oops...","El producto no cumple los estandares (codigo,nombre,imagen)",'admin.php?seccion=seccion-ag-pro'); 
    }
    if( mensaje == "img1" ){
        alert("error","Oops...","La imagen no cumple los estandares (formato y/o tamaño)",'admin.php?seccion=seccion-ag-pro'); 
    }
    if( mensaje == "limitesImg" ){
        alert("error","Oops...","La imagen no cumple los estandares (formato y/o tamaño)",''); 
    }
}

function alertCarrito(des){
    if(des === "1" ){
        alertCart("success", "Cargado", "Su producto se cargo exitosamente!");
    }
    if(des === "2" ){
        alertCart("error", "Error", "No tienes un carrito para agregar productos");
    }
    if( des === "3" ){
        alertCart("error", "Error","Este producto ya esta agregado en el carrito.");
    }
    if( des === "4" ){
        alertCart("error","Error","No hay cantidades disponibles");
    }
    if( des === "5" ){
        alertCart("error","Error","No puedes comprar con esta cuenta");
    }
}

function verificacion(mensaje){
    //Lista de error cuando el usuario inicia sesion
    if( mensaje == "error-1" ){
        alert("error","Oops...","El Usuario y contraseña no coinciden.",'index.php'); 
    }
    if( mensaje === "error0" ){
        alert("error","Oops...","Ups ocurrio un error al momento de verificar los datos, intenta más tarde.",'index.php'); 
    }
    //Lista de errores cuando el usaurio crea una cuanta
    if( mensaje === "-1error" ){
        alert("error","Oops...","Estos datos ya le pertenecen a un usuario, verifica nuevamente",'index.php'); 
    }
    if( mensaje === "0error" ){
        alert("error","Oops...","Ups ah ocurrido un erro al crear el usuario, verifca que los datos sean correctos",'index.php'); 
    }

}


//Funciones de las alertas

function alertCart(iconText,titleText,text){
    Swal.fire({
        icon: iconText,
        title: titleText,
        text: text,
    });
}

function alert(iconText, titleText,text,url){
    Swal.fire({
        icon: iconText,
        title: titleText,
        text: text
      }).then((result) => {
        if(result.isConfirmed){
            window.location.href = url;
        }
      });
}