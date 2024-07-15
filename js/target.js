
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

function guardarCategoria(){
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
                document.getElementById('mensaje').innerHTML = 'La Categoria se a creado correctamente.';
            }
            if(respuesta === "0"){
                document.getElementById('mensaje').innerHTML = 'La Categoria ya existe.';
            }
        },
        error: function(xhr,status,erro){
            console.log(respuesta);
        }
    })
 }