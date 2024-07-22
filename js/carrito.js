function sumarCantidad(id,cantidad,disponibles){
    var param = {
        'cantidad': cantidad,
        'max':disponibles,
        'aumentar': true,
        'data': id
    };
    $.ajax({
        data: param,
        url: '../controller/controller_user.php',
        datatype: 'html',
        method: 'get',
        success: function(respuesta){
            if(respuesta === ""){
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "No puedes agregar más cantidades.",
                });
            }else{
                document.getElementById('carrito').innerHTML = respuesta;
                actualizarDinero();
            }
            
        },
        error: function(xhr,status,error){
            console.log(error);
        }
    });
}

function restarCantidad(id,cantidad){
    var param = {
        'cantidad': cantidad,
        'restar': true,
        'data': id
    };
    $.ajax({
        data: param,
        url: '../controller/controller_user.php',
        datatype: 'html',
        method: 'get',
        success: function(respuesta){
            if(respuesta === ""){
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "No puedes eliminar más cantidades.",
                });
            }else{
                document.getElementById('carrito').innerHTML = respuesta;
                actualizarDinero();
            }
        },
        error: function(xhr,status,error){
            console.log(error);
        }
    });
}
function actualizarDinero(){
    var param = {
        'dinero': 'actualizar'
    };
    $.ajax({
        data: param,
        url: '../controller/controller_user.php',
        datatype: 'html',
        method: 'get',
        success: function(respuesta){
            document.getElementById('dinero').innerHTML = respuesta;
        },
        error: function(xhr,status,error){
            console.log(error);
        }
    });
}

function eliminarDelCarrito(id){
    var param = {
        'data':id,
        'eliminarDelCarrito': true
    }
    $.ajax({
        data: param,
        url: '../controller/controller_user.php',
        datatype: 'html',
        method: 'get',
        success: function(respuesta){
            actualizarDinero();
            document.getElementById('carrito').innerHTML = respuesta;
        },
        error: function(xhr,status,error){
            console.log(error);
        }
    });
}
