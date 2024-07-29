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
            texto.innerHTML = "Cargando comentario...";
            document.getElementById("comentario").value = "";
        },
        success: function (respuesta){
            setTimeout(function(){
                texto.style.backgroundColor = 'green';
                texto.innerHTML = "EL comentario se cargo exitisamente";
            },4000);
            setTimeout(function(){
                $("#coment").html(respuesta);
                texto.innerHTML = '';
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


function cargarRespuesta(comentario){
    var texto = document.getElementById('respuesta').value;
    if(texto === ""){
        console.log("No hay nada escrito, escribe algo por favor");
    }else{
        console.log(comentario);
        console.log(texto);
    }
}









