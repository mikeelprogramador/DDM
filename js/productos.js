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
            //console.log(respuestas);
        },
        error: function(xhr,status, error){
            console.log("Erro",error);
        }
    })
}

function buscarProductos(des){
    var texto= document.getElementById('barra-search').value;
    var Url;
    var ubicacion;
    var cajaMensaje;
    if(des === 0){
        Url = '../controller/controller_admin.php';
        ubicacion = 'subContainer';
    }
    if(des === 1 ){
        Url = '../controller/controller_user.php';
        ubicacion = 'homeProductos';
        cajaMensaje = document.getElementById('mensajeProducto');
        mensaje = "No se pudo encontrar "+ texto;
    }
    if(des === 2 ){
        Url = '../controller/controller_user.php';
        ubicacion = 'subContainer';

    }
    if(des === 3 ){
        Url = '../controller/controller_admin.php';
        ubicacion = 'subContainer';
    }
    var param = {
        'busquedaGeneral': texto
    } 

    $.ajax({
        data: param,    
        url: Url,
        datatype: 'html',
        method: 'get',
        success: function(respuestas){
            if(respuestas === "0"){
                cajaMensaje.innerHTML = mensaje;
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
        'id': id
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
        title: "!Borrar producto¡" ,
        text: "¿Estas seguro de eliminar el producto?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Eliminar"
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: "¡Eliminado!",
            text: "Presiona OK para confirmar",
            icon: "success",
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

