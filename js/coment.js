function apareceComentario(event,id){
    var texto = document.getElementById("respuesta-comet");
    event.preventDefault();
    var param = {
        'agregarComentario': true,
        'data': id, 
        'comentario': $("#comentario").val()
    };

    $.ajax({
        data: param, 
        url: '../../view/controller/controller_producto.php',
        datatype: 'text',
        method: 'post',
        beforeSend: function(){
            texto.style.backgroundColor = 'yellow';
            texto.innerHTML = Mensajes.mensajesGlobales(111);
            document.getElementById("comentario").value = Mensajes.mensajesGlobales(0);
        },
        success: function (respuesta){
            setTimeout(function(){
                texto.style.backgroundColor = 'green';
                texto.innerHTML = Mensajes.mensajesGlobales(112);
            },4000);
            setTimeout(function(){
                $("#coment").html(respuesta);
                texto.innerHTML = Mensajes.mensajesGlobales(0);
            },6000);
        },
        error: function (xhr,status,error){
            console.log(error);
        }
    });

}
function eliminarComentario(id_comen, id_pro){
    var param = {
        'eliminarComentario': true,
        'comen': id_comen,
        'data': id_pro
    };

    $.ajax({
        data: param, 
        url: '../../view/controller/controller_producto.php',
        datatype: 'text',
        method: 'post',
        success: function (respuesta){
            $("#coment").html(respuesta)
        },
        error: function (xhr,status,error){
            console.log(error);
        }
    });

}

function megusta(checkbox){
    var checkboxes = document.getElementsByName('like');
      checkboxes.forEach(function(currentCheckbox) {
        // Desmarcar el checkbox actual si no es el que ha sido seleccionado
        if (currentCheckbox !== checkbox) {
          currentCheckbox.checked = false;
        }
      });
}

function toggleLike(id) {
    const likeIcon = document.getElementById('like-icon');
    const dislikeIcon = document.getElementById('dislike-icon');

    // Remover clase disliked si está activa
    if (dislikeIcon.classList.contains('disliked')) {
        dislikeIcon.classList.remove('disliked');
    }

    // Alternar la clase liked
    likeIcon.classList.toggle('liked');

    //ajax
    var param = {
        'like': true,
        'data': id
    }
    $.ajax({
        data: param,
        url: '../../view/controller/controller_producto.php',
        datatype: 'html',
        method: 'get',
        success: function(respuesta){
           document.getElementById('like-container').innerHTML = respuesta;
        },
        error: function(xhr,statuc,error){
            console.log(error);
        }
    });
}

function toggleDislike(id) {
    const dislikeIcon = document.getElementById('dislike-icon');
    const likeIcon = document.getElementById('like-icon');

    // Remover clase liked si está activa
    if (likeIcon.classList.contains('liked')) {
        likeIcon.classList.remove('liked');
    }

    // Alternar la clase disliked
    dislikeIcon.classList.toggle('disliked');
    //ajax
    var param = {
        'dislike': true,
        'data': id
    }
    $.ajax({
        data: param,
        url: '../../view/controller/controller_producto.php',
        datatype: 'html',
        method: 'get',
        success: function(respuesta){
           document.getElementById('like-container').innerHTML = respuesta;
        },
        error: function(xhr,statuc,error){
            console.log(error);
        }
    });
}

function incremento(){
    let contador = document.getElementById('contador');
    valorActual = parseInt(contador.value);
    if( valorActual < parseInt(contador.max)){
        contador.value = valorActual + 1;
    }
    
}

function decremento(){
    let contador = document.getElementById('contador');
    valorActual = parseInt(contador.value);
    if( valorActual > parseInt(contador.min)){
        contador.value = valorActual - 1;
    }
    
}
function enviarDatos(des,token,id) {
    var cantidad = document.getElementById('contador').value;
    if(des === 1){
        url = "../../view/controller/controller_producto.php?http="+token+"&data="+id+"&can="+cantidad+"&estado=agregado";
    }
    if(des === 2){
        url = "../shopping/compras.php?seccion=ubicacion&http="+generarToken(64)+"&data="+id+"&cantidad="+cantidad+"&estado=compraUni";
    }
    window.location.href = url;
}

function responder(lugar){
    var div = document.getElementById(lugar);
    div.style.display = 'block';
}

function cancelarRespuesta(lugar){
    var div = document.getElementById(lugar);
    div.style.display = 'none';
}


function cargarRespuesta(idcomentario,lugar){
    var comentario = document.getElementById(lugar).value;
    var mensaje = document.getElementById('textRespuesta'+idcomentario);
    if(comentario === ""){
        alertNormales(Mensajes.mensajesSeewalert(401),Mensajes.mensajesGlobales(102),Mensajes.mensajesGlobales(113))
    }else{
        var param = {
            'respuestaCome':'true',
            'idComet':idcomentario,
            'comet':comentario
        };
        $.ajax({
            data: param,
            url: '../../view/controller/controller_producto.php',
            datatype: 'html',
            method: 'post',
            beforeSend: function(){
                mensaje.innerHTML = Mensajes.mensajesGlobales(114);
            },
            success: function(respuesta){
                setTimeout(function(){
                    mensaje.innerHTML = Mensajes.mensajesGlobales(115);
                },3000)
                setTimeout(function(){
                    mensaje.innerHTML = Mensajes.mensajesGlobales(0);
                    document.getElementById('RespuestasComentario'+idcomentario).innerHTML = respuesta;
                    location.reload(true);
                },5000)
            }
        });
        
    }
}

function editarComentario(des,lugar1,lugar2,lugar3 = null){
    var nuevoComnetario = document.getElementById(lugar1);
    var comentarioActual = document.getElementById(lugar2);
    if(des === 1){
        comentarioActual.style.display = 'none';
        nuevoComnetario.style.display = 'block';
        document.getElementById(lugar3).value = comentarioActual.innerHTML;
    }
    if(des === 2){
        comentarioActual.style.display = 'block';
        nuevoComnetario.style.display = 'none';
    }
}

function actualizarComentario(lugar,texto,idPro,idComet){
    var nuevoComentario = document.getElementById(lugar).value;
    var mensaje = document.getElementById(texto);
    if(nuevoComentario === "" ){
        mensaje.innerHTML = Mensajes.mensajesGlobales(116);
    }else{
        var param = {
            'updateComet':'true',
            'data':idPro,
            'idComet':idComet,
            'comet':nuevoComentario
        };
        $.ajax({
            data: param,
            url: '../../view/controller/controller_producto.php',
            datatype: 'html',
            method: 'post',
            beforeSend: function(){
                mensaje.innerHTML = Mensajes.mensajesGlobales(117);
            },
            success: function(respuesta){
                setTimeout(function(){
                    mensaje.innerHTML = Mensajes.mensajesGlobales(118);
                },3000)
                setTimeout(function(){
                    document.getElementById('coment').innerHTML = respuesta;
                },5000)
            }
        });
    }
}

function eliminarRespuesta(respuesta){
    var param = {
        'deletRespuesta':respuesta
    }
    $.ajax({
        data: param,
        url: '../../view/controller/controller_producto.php',
        datatype: 'html',
        method: 'post',
        success: function(respuesta){
            if(respuesta === "1"){
                location.reload(true);
            }
        },
        error: function(xhr,status,error){
            console.log(error);
        }
    })
}









