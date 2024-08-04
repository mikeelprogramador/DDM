function busquedaAdm(event){
    let texto = event.target.value;
    var param = {
        'search': texto
    }

    $.ajax({
        data: param,
        url: '../controller/controller_admin.php',
        datatype: 'html',
        method: 'get',
        success: function(respuestas){
            $("#search").html(respuestas);
        },
        error: function(xhr,status, error){
            console.log("Erro",error);
        }
    })
}

function buscarProductos(des,categoria = null){
    var texto= document.getElementById('barra-search').value;
    var Url;
    var ubicacion;
    if(des === 0){
        Url = '../controller/controller_admin.php';
        ubicacion = 'subContainer';
        mensaje = Mensajes.mensajesProductos(307,texto);
    }
    if(des === 1 ){
        Url = '../controller/controller_user.php';
        ubicacion = 'homeProductos';
        mensaje = Mensajes.mensajesProductos(307,texto);
    }
    if(des === 2 ){
        Url = '../controller/controller_user.php?cate='+categoria;
        ubicacion = 'productosCategorias';
        mensaje = Mensajes.mensajesProductos(308,texto,categoria);

    }
    if(des === 3 ){
        Url = '../controller/controller_user.php';
        ubicacion = 'ofertas-contenedor';
        mensaje = Mensajes.mensajesProductos(312,texto);
    }
    if(des === 0 || des === 1 || des === 2){
        var param = {
            'busquedaGeneral': texto,
        };
    }else{
        var param = {
            'busquedaOfertas': texto,
        };
    }

    $.ajax({
        data: param,    
        url: Url,
        datatype: 'html',
        method: 'get',
        success: function(respuestas){
            if(respuestas === "0"){
                document.getElementById(ubicacion).innerHTML = mensaje;
            }else{
                document.getElementById(ubicacion).innerHTML = respuestas;
            }
            
        },
        error: function(xhr,status, error){
            console.log("Erro",error);
        }
    })

}

function pulsar(event){
    if(event.which === 13 ){
        event.preventDefault(); 
        $("#boton").click();
    }
}

function eliminar(id){;
    var param = {
        'deleteProducto': id
    }

    $.ajax({
        data: param,
        url: '../controller/controller_admin.php',
        datatype: 'html',
        method: 'get',
        success: function(respuesta){
            document.getElementById("search").innerHTML = respuesta;
        },
        error: function(xhr,status,error){
            console.log(error);
        }

    })

}

function decision(id){
    Swal.fire({
        title: Mensajes.mensajesProductos(309),
        text: Mensajes.mensajesProductos(310),
        icon: Mensajes.mensajesSeewalert(404),
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: Mensajes.mensajesGlobales(132)
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: Mensajes.mensajesGlobales(128),
            text: Mensajes.mensajesGlobales(133),
            icon: Mensajes.mensajesSeewalert(402),
          }).then((result) => {
            if(result.isConfirmed){
                eliminar(id);
            }
          });
          
        }
      });
}

function recargar(){
    window.location.reload();
}

