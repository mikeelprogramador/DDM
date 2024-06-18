function apareceComentario(id){
    
    var param = {
        'data': id, 
        'comentario': $("#comentario").val()
    }

    $.ajax({
        data: param, 
        url: 'consulta.php?',
        datatype: 'html',
        method: 'post',
        success: function (respuesta){
            $("#comet").html(respuesta);
        },
        error: function (xhr,status,error){
            console.log(error);
        }
    })
}