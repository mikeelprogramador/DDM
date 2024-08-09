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
            texto.innerHTML = Mensajes.mensajesGlobales(119);
            texto.style.backgroundColor = '#c29349';
            decoracionTexto(texto);
        },
        success: function(respuesta){
            setTimeout(function() {
                if(respuesta === "0"){
                    correo.value = Mensajes.mensajesGlobales(0);
                    texto.innerHTML = Mensajes.mensajesGlobales(120);
                    texto.style.backgroundColor = '#4CAF50';
                }else if(respuesta === "1" || respuesta === "not exist"){ 
                    texto.innerHTML = Mensajes.mensajesGlobales(121);
                    texto.style.backgroundColor = '#f44336'; 
                }else{
                    texto.innerHTML = Mensajes.mensajesGlobales(101);
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