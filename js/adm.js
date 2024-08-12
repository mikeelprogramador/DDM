function rol(dato){
    var param = {
        'UsuarioEditar':dato
    };
    $.ajax({
        data:param,
        url: '../controller/controller_admin.php',
        datatype: 'texto',
        method:'post',
        success: function(respuesta){
            if(respuesta === "1"){
                document.getElementById('rango').style.display = 'block';
            }
        },
        error: function(xhr,status,error){
            console.log(error);
        }
    });
}





function editarRol(){
    var rango = document.getElementById('nuevoRango').value;

    if(rango === "Rango"){
        window.alert(Mensajes.mensajesGlobales(157));
    }else{
        var param = {
            'rango':rango,
            'datoUsuario':""
        };
    
        $.ajax({
            data:param,
            url: '../controller/controller_admin.php',
            datatype: 'texto',
            method:'post',
            success: function(respuesta){
                console.log(respuesta);
                if(respuesta === "1"){
                    window.alert(Mensajes.mensajesGlobales(160));
                    location.reload(true)
                }
                if(respuesta === "0"){
                    window.alert(Mensajes.mensajesGlobales(158));
                    document.getElementById('rango').style.display = 'none';
                }
                if(respuesta === "-1"){
                    window.alert(Mensajes.mensajesGlobales(159));
                    document.getElementById('rango').style.display = 'none';
                }
            },
            error: function(xhr,status,error){
                console.log(error);
            }
        });
    }


}

function cancelarRol(){
    document.getElementById('rango').style.display = 'none';
}