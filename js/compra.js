function typeMoney(metodoPAgo,producto,estado){
    //afectivo
    if(producto === ""){
        continuacion = "";
    }else{
        continuacion = "&data="+producto;
    }
    if(metodoPAgo === 0){
        window.location.href = "compras.php?seccion=metodosPago&http="+generarToken(64)+"&pagoPor=efectivo&estado="+estado+continuacion;
    }
    //credito
    if(metodoPAgo === 1){
        window.location.href = "compras.php?seccion=metodosPago&http="+generarToken(64)+"&pagoPor=credito&estado="+estado+continuacion;
    }
    //debito
    if(metodoPAgo === 2){
        window.location.href = "compras.php?seccion=metodosPago&http="+generarToken(64)+"&pagoPor=debito&estado="+estado+continuacion;
    }
}

function targeta(event,lugar){
    var inputElement = event.target;
    var targeta = inputElement.value;
    if(targeta.length >7){
        inputElement.value = targeta.substring(0, 8);
        document.getElementById(lugar).style.display = 'block';
    }else{
        document.getElementById(lugar).style.display = 'none';
    }
}