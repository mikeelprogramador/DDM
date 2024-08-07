
function cambiarMouse(img) {
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
                document.getElementById("foto_avatar").src = respuesta;
            }
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
}


function verConfiguraciones(){
    document.getElementById('perfil').style.display = 'none';
    document.getElementById('sub-contenedor').style.display = 'block';
    document.getElementById('contenido_sub-contenedor').style.display = 'block';

}

function regresarPerfil(){
    document.getElementById('contenido_sub-contenedor').style.display = 'none';
    document.getElementById('sub-contenedor').style.display = 'none';
    document.getElementById('cambio').style.display = 'none';
    document.getElementById('perfil').style.display = 'block';

}

function cambiarDato(des){
    document.getElementById('sub-contenedor').style.display = 'none';
    document.getElementById('cambio').style.display = 'block';
    if(des === 1){
        document.getElementById('mensajeCorreo').innerHTML = Mensajes.mensajesGlobales(136);
    }
}

function devolver(lugar){
    document.getElementById(lugar).style.display = 'none';
    document.getElementById('sub-contenedor').style.display = 'block';
    
}


function eliminarFoto(){
    alertdelet(Mensajes.mensajesSeewalert(403),Mensajes.mensajesGlobales(138),Mensajes.mensajesGlobales(139),1);
}

function eliminarFotoPerfil(des){

    var param = {}
    if(des === 1 ){
        param['cambiarFoto'] = '';
    }
    if(des === 2 ){
        param['elimarCuenta'] = '';
    }
    $.ajax({
        data:param,
        url: '../controller/controller_user.php',
        datatype: 'texto',
        method: 'get', 
        success: function(respuesta) {
            document.getElementById("imagen_perfil").src = respuesta;
            document.getElementById("foto_avatar").src = respuesta;
            alertNormales(Mensajes.mensajesSeewalert(402),Mensajes.mensajesGlobales(141),Mensajes.mensajesGlobales(142));
        },
        error: function(xhr, status, error) {
            console.log(error);
            alertNormales(Mensajes.mensajesSeewalert(401),Mensajes.mensajesGlobales(102),Mensajes.mensajesGlobales(143));
        }
    });
}

function deleteCuenta(des){
    if(des === 1){
        alertdelet(Mensajes.mensajesSeewalert(404),Mensajes.mensajesGlobales(132),Mensajes.mensajesGlobales(155),2);
    }
    if(des === 2){
        $.ajax({
            url: '../controller/controller_user.php?deleteCuenta',
            datatype: 'texto',
            success: function(respuesta){
                window.location.href = respuesta;
                
            },
            error: function(xhr,status,error){
                console.log(error);
            }
        });
    }
}

function datosUsuario(){
    document.getElementById('sub-contenedor').style.display = 'none';
    document.getElementById('datos-usuario').style.display = 'block';
}

function habilitarActu(des){
    var boton1 = document.getElementById('habiliatarActualizacion');
    var boton2 = document.getElementById('regresar');
    var boton3 = document.getElementById('actualizar');
    var boton4 = document.getElementById('cancelar');
    var texto1 = document.getElementById('actualizarNombre');
    var texto2 = document.getElementById('actualizarApellido');
    var texto3 = document.getElementById('actualizarEmail');
    if(des === 1){
        boton1.style.display = 'none';
        boton2.style.display = 'none';
        boton3.style.display = 'block';
        boton4.style.display = 'block';
        texto1.disabled = false;
        texto2.disabled = false;
        texto3.disabled = false;
    }
    if(des === 2){
        boton1.style.display = 'block';
        boton2.style.display = 'block';
        boton3.style.display = 'none';
        boton4.style.display = 'none';
        texto1.disabled = true;
        texto2.disabled = true;
        texto3.disabled = true;
    }
}

function actualizarDatos(){
    var texto1 = document.getElementById('actualizarNombre');
    var texto2 = document.getElementById('actualizarApellido');
    var texto3 = document.getElementById('actualizarEmail');
    var param = {
        'name': texto1.value,
        'lastname': texto2.value,
        'email':texto3.value
    };
    $.ajax({
        data:param,
        url: '../controller/controller_user.php?actualizarUsuario',
        datatype: 'texto',
        method: 'post',
        success: function(respuesta){
            console.log(respuesta);
            if(respuesta === "0"){
                setTimeout(function(){
                    window.alert(Mensajes.mensajesGlobales(106));
                },2000)
            }
            if(respuesta === "1"){
                setTimeout(function(){
                    window.alert(Mensajes.mensajesGlobales(156));
                    location.reload(true);
                },1500);
            }
        },
        error: function(xhr,status,error){
            console.log(error);
        }
    })
}







