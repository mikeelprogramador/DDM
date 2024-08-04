
function cardstring(event,param) {
    let string = event.target.value;
    if(param === "title"){
        document.getElementById("card-title").innerHTML = string;
    }if(param === "text"){
        document.getElementById("card-text").innerHTML = string;
    }
    
  }
  function preview(event,querySelector){
    let input  = event.target;

    $imgPreView = document.querySelector(querySelector);

    if(!input.files.length) return

    file = input.files[0];

    objectURL = URL.createObjectURL(file);

    $imgPreView.src = objectURL;
}

function continuar() {
    document.getElementById('parte2').style.display  = 'block';
    document.getElementById('boton_proagre').style.display = 'none';
}

function aparecerCategorias(){
    document.getElementById('create-catego').style.display = 'none';
    document.getElementById('catego').style.display = 'block';
    var param = {
        'aparece':true,
    };
    $.ajax({
        data:param,
        url: '../controller/controller_admin.php',
        datatype: 'texto',
        method:'get',
        success: function(respuesta){
            document.getElementById('catego').innerHTML = respuesta;
        },
        error: function(xhr,status,erro){
            console.log(respuesta);
        }
    })
}

function createCategoria(){
    document.getElementById('catego').style.display = 'none';
    document.getElementById('mensaje').style.display = 'none';
    document.getElementById('create-catego').style.display = 'block';
}

function guardarCategoria(des = null,event = null){
    if(des === 1){
        event.preventDefault();
    }
    var categoria = document.getElementById('text-catego').value;
    var param = {
        'createCategoria':true,
        'categoria': categoria
    };

    $.ajax({
        data:param,
        url: '../controller/controller_admin.php',
        datatype: 'texto',
        method:'get',
        success: function(respuesta){
            document.getElementById('mensaje').style.display = 'block';
            if(respuesta === "1"){
                document.getElementById('mensaje').innerHTML = Mensajes.mensajesGlobales(134);
            }
            if(respuesta === "0"){
                document.getElementById('mensaje').innerHTML = Mensajes.mensajesGlobales(135);
            }
        },
        error: function(xhr,status,erro){
            console.log(respuesta);
        }
    })
 }

function actualizarCategoria(event){
    event.preventDefault();
    var param = {
        'updateCategoria':'1',
        'categoria': document.getElementById('update-cate').value,
        'newCategoria': document.getElementById('update-cate-new').value
    };

    $.ajax({
        data:param,
        url: '../controller/controller_admin.php',
        datatype: 'texto',
        method:'post',
        success: function(respuesta){
            if(respuesta === "1"){
                setTimeout(function(){
                    window.alert(Mensajes.mensajesGlobales(148));
                },1000);
            }
            if(respuesta === "0"){
                setTimeout(function(){
                    window.alert(Mensajes.mensajesGlobales(149));
                },1000);
            }
        },
        error: function(xhr,status,erro){
            console.log(respuesta);
        }
    });
}

function eliminarCategoria(event){
    event.preventDefault();
    var param = {
        'deleteCategroia':document.getElementById('delete-cate').value
    };

    $.ajax({
        data:param,
        url: '../controller/controller_admin.php',
        datatype: 'texto',
        method:'post',
        success: function(respuesta){
            if(respuesta === "1"){
                setTimeout(function(){
                    window.alert(Mensajes.mensajesGlobales(150));
                },1000);
            }
            if(respuesta === "-1"){
                setTimeout(function(){
                    window.alert(Mensajes.mensajesGlobales(151));
                },1000);
            }
            if(respuesta === "0"){
                setTimeout(function(){
                    window.alert(Mensajes.mensajesGlobales(149));
                },1000);
            }
        },
        error: function(xhr,status,erro){
            console.log(respuesta);
        }
    });
}