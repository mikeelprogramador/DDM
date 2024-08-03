function vaciarHistorial(){
    var mensajeTexto = document.getElementById('texto-historial');
    var divHistorial = document.getElementById('historial-contenedor');
    $.ajax({
        url: '../controller/controller_user.php?vaciarHistorial',
        datatype: 'texto',
        beforeSend: function(){
            mensajeTexto.innerHTML = Mensajes.mensajesGlobales(144);
        },
        success: function(respuesta){
            if(respuesta === "1"){
                setTimeout(function(){
                    mensajeTexto.innerHTML = Mensajes.mensajesGlobales(145);
                },3000);
                setTimeout(function(){
                    location.reload(true);
                },4500);
            }
            if(respuesta === "0"){
                setTimeout(function(){
                    mensajeTexto.innerHTML = Mensajes.mensajesGlobales(147);
                },3000);
            }
        },
        error: function(xhr,status,error){
            console.log(error);
        }
    });
}