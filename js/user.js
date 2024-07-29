
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
        document.getElementById('mensajeCorreo').innerHTML = 'A continuacion enviaremos  un correo para recuperar su contraseñe';
    }
    if(des === 2){
        document.getElementById('mensajeCorreo').innerHTML = 'A continuacion enviaremos un correo para cambiar su correo';
    }
}

function devolver(){
    document.getElementById('cambio').style.display = 'none';
    document.getElementById('sub-contenedor').style.display = 'block';
    
}

function enviarCorreo(event,des){
    event.preventDefault();
    var texto = document.getElementById('dato');
    var correo = document.getElementById('correo');

    var param  = {
        'correo': correo.value
    };
    if(des === 1){
        direccion = '../controller/controller_user.php?saveDato';
    }
    if(des === 2 ){
        direccion = 'view/controller/controller_login.php?saveDato';
    }
    $.ajax({
        data: param,
        url: direccion,
        datatype: 'texto',
        method: 'post',
        beforeSend: function(){
            texto.innerHTML = "Su correo está siendo enviado......";
            texto.style.backgroundColor = '#fcf801';
            decoracionTexto(texto);
        },
        success: function(respuesta){
            setTimeout(function() {
                if(respuesta === "0"){
                    correo.value = '';
                    texto.innerHTML = "Su correo fue enviado exitosamente. Verifica su bandeja de entradas o spam.";
                    texto.style.backgroundColor = '#4CAF50';
                }
                
                if(respuesta === "1" || respuesta === "not exist"){ 
                    texto.innerHTML = "El correo que ingresaste no se ha podido encontrar. Verifica si está bien escrito.";
                    texto.style.backgroundColor = '#f44336'; 
                }
                
            }, 5000);
            
        },
        error: function(xhr,status,error){
            console.log(error);
        }
    });
}

function decoracionTexto(texto){
    texto.style.color = 'white';
    texto.style.padding = '10px';
    texto.style.borderRadius = '5px';
    texto.style.marginTop = '10px';
    texto.style.fontSize = '16px';
    texto.style.fontWeight = 'bold';
    texto.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.1)';
}

function eliminarFoto(){
    alertdelet(null,"question","Eilimar foto","¿Estas seguro de eliminar tu foto?",1);
}

function eliminar(des){

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
            alert("success","Foto eliminada","Su foto de perfil se a eliminado");
        },
        error: function(xhr, status, error) {
            console.log(error);
            alert("Error","opsss.","Algo ha fallado");
        }
    });
}






