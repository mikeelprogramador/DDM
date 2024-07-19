function editarDatos(){
    document.getElementById("edit_nombre").disabled = false;
    document.getElementById("edit_apellido").disabled = false;
    crearBotonEdit();
    //console.log("hola");
}
function crearBotonEdit(){
    var div = document.getElementById("botones");
    var boton = document.createElement("button");
    boton.type = "button";
    boton.textContent = "Actualizar";
    document.getElementById("boton_contraseña").style.display= "none";
    document.getElementById("boton_correo").style.display= "none";
    div.appendChild(boton);
}

function cambiarFoto(img) {
    img.style.cursor = 'pointer';
}
function activarfiles(){
    var foto = document.getElementById('foto_perfil');
    foto.click();
}

function mostrarImagen(event,des) {
    var formData = new FormData();
    var archivo = event.target.files[0]; // Obtiene el archivo seleccionado
    
    formData.append('foto_perfil', archivo);
    if(des === 1) ur = '../controller/controller_user.php';
    if(des === 2) ur = '../controller/controller_admin.php';
    $.ajax({
        url: ur,
        type: 'POST', 
        data: formData,
        dataType: 'html',
        contentType: false, // Importante: false cuando se usa FormData
        processData: false, // Importante: false cuando se usa FormData
        success: function(respuesta) {
            if(respuesta === "limitesImg"){
                alertPro(respuesta);
            }else{
                document.getElementById("imagen_perfil").src = respuesta;
            }
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
}

function eliminarFoto(){
    console.log("hola mundo");
}

function verConfiguraciones(){
    document.getElementById('perfil').style.display = 'none';
    document.getElementById('sub-contenedor').style.display = 'block';
    document.getElementById('contenido_sub-contenedor').style.display = 'block';
    

}

function regresarPerfil(){
    document.getElementById('contenido_sub-contenedor').style.display = 'none';
    document.getElementById('sub-contenedor').style.display = 'none';
    document.getElementById('perfil').style.display = 'block';

}





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
            document.getElementById('carrito').innerHTML = respuesta;
        },
        error: function(xhr,status,error){
            console.log(error);
        }
    });
}
