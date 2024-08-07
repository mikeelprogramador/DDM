function crearOfertas(event){
    event.preventDefault();
    var param = {
        'create-offer-name': document.getElementById('offer-name').value
    }
    $.ajax({
        data:param,
        url: '../controller/controller_admin.php',
        datatype: 'texto',
        method: 'post',
        beforeSend: function(){
            document.getElementById('text-cretae-offer').innerHTML = Mensajes.mensajesGlobales(122);
        },
        success: function(respuesta){
            if(respuesta === "0"){
                setTimeout(function(){
                    document.getElementById('text-cretae-offer').innerHTML = Mensajes.mensajesGlobales(123);
                },3000);
                setTimeout(function(){
                    document.getElementById('text-cretae-offer').innerHTML = Mensajes.mensajesGlobales(0);
                    location.reload(true);
                },5000);

            }
            if(respuesta === "1"){
                setTimeout(function(){
                    document.getElementById('text-cretae-offer').innerHTML = Mensajes.mensajesGlobales(124);
                },3500);
            } 
        },
        error: function(xhr,status,error){
            console.log(error);
        }
    });
}

function actualizarOferta(event){
    event.preventDefault();
    var id = document.getElementById('update-id').value;
    var newOffer = document.getElementById('update-name-new').value;
    if(id === ''){
        document.getElementById('text-update-offer').innerHTML = Mensajes.mensajesGlobales(125);
    }else{
        var param = {
            'id-offer': id,
            'update-offer': newOffer
        }
        $.ajax({
            data:param,
            url: '../controller/controller_admin.php',
            datatype: 'texto',
            method: 'post',
            beforeSend: function(){
                document.getElementById('text-update-offer').innerHTML = Mensajes.mensajesGlobales(126);
            },
            success: function(respuesta){
                if(respuesta === "1"){
                    setTimeout(function(){
                        document.getElementById('text-update-offer').innerHTML = Mensajes.mensajesGlobales(127);
                    },3000);
                }
                setTimeout(function(){
                    location.reload(true);
                },5000);
            },
            error: function(xhr,status,error){
                console.log(error);
            }
        });
    }
}

function eliminarOFerta(event){
    event.preventDefault();
    var deleteOffer =document.getElementById('delete-offer').value;
    var param = {
        'delete-offer': deleteOffer
    };
    $.ajax({
        data:param,
        url: '../controller/controller_admin.php',
        datatype: 'texto',
        method: 'post',
        beforeSend: function(){
            document.getElementById('text-delete-offer').innerHTML = Mensajes.mensajesGlobales(128);
        },
        success: function(respuesta){
            if(respuesta === "1"){
                setTimeout(function(){
                    document.getElementById('text-delete-offer').innerHTML = Mensajes.mensajesGlobales(129);
                },3000);
                setTimeout(function(){
                    location.reload(true);
                },5000);
            }else{
                setTimeout(function(){
                    document.getElementById('text-delete-offer').innerHTML = Mensajes.mensajesGlobales(130);
                },3000);
            }
        },
        error: function(xhr,status,error){
            console.log(error);
        }
    });
}


function buscarCodigo(event){
    var ofertaBuscar = event.target.value;
    var param = {
        'offer-name': ofertaBuscar
    }
    $.ajax({
        data:param,
        url: '../controller/controller_admin.php',
        datatype: 'texto',
        method: 'post',
        success: function(respuesta){
            if(respuesta === "Not exist"){
                document.getElementById('update-id').value = Mensajes.mensajesGlobales(0);
                document.getElementById('text-update-offer').innerHTML = Mensajes.mensajesGlobales(130);

            }else{
                document.getElementById('text-update-offer').innerHTML = Mensajes.mensajesGlobales(0);
                document.getElementById('update-id').value = respuesta;
            }
            if(ofertaBuscar === ""){
                document.getElementById('update-id').value = Mensajes.mensajesGlobales(0);
            }
             
        },
        error: function(xhr,status,error){
            console.log(error);
        }
    });
}

