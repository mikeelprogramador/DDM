
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

function upcolor(text){
    let opc = text
    botones();
    var param =  {
        'search': opc
    }

    $.ajax
    ({
        date: param,
        url: '../consultas.php',
        dateType: 'html',
        type: 'get',
        beforeSend: function (){
            console.log("Cargando la conexion");
        },
        success: function ( error ){
            jQuery("#text-color").html(error)
        },
        error: function(xhr, status, error){
            console.log("Este es el erro: ", error);
        }
    })

}
function botones(){
    var div = document.getElementById("div-color");
    var input = document.createElement("input");
    input.type = 'text';
    input.id = 'color-new';
    input.placeholder = 'Ktuo14';
    
    // Agregar el input al final del div
    div.appendChild(input);
}