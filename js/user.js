function editarDatos(){
    document.getElementById("edit_nombre").disabled = false;
    document.getElementById("edit_apellido").disabled = false;
    crearBotonEdit();
    //console.log("hola");
}
function crearBotonEdit(){
    var div = document.getElementById("botones");
    var boton = document.createElement("button");
    boton.type = "button";
    boton.textContent = "Actualizar";
    document.getElementById("boton_contraseña").style.display= "none";
    document.getElementById("boton_correo").style.display= "none";
    div.appendChild(boton);
}