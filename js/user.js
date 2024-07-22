
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
        direccion = 'view/controller/controller_user.php?saveDato';
    }
    $.ajax({
        data: param,
        url: direccion,
        datatype: 'texto',
        method: 'post',
        beforeSend: function(){
            texto.innerHTML = "Su correo esta siendo enviedo";
            texto.style.backgroundColor = 'yellow';
        },
        success: function(respuesta){
            setTimeout(function() {
                if(respuesta === "0"){
                    correo.value = '';
                    texto.innerHTML = "Su correo fue enviado exitosamente verifica su vandeja de entradas o spam";
                    texto.style.backgroundColor = 'green';
                }
                if(respuesta === "1" || respuesta === "not exist" ){ 
                    texto.innerHTML = "El correo que ingresaste no se a podido encontrar verifica si esta bien escrito. ";
                    texto.style.backgroundColor = 'red';
                }
            }, 5000);
            
        },
        error: function(xhr,status,error){
            console.log(error);
        }
    });
}





