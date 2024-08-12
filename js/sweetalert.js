
function alertNormales(iconText,titleText,text){
    Swal.fire({
        icon: iconText,
        title: titleText,
        text: text,
    });
}

function alertUrl(iconText, titleText,text,url){
    Swal.fire({
        icon: iconText,
        title: titleText,
        text: text
      }).then((result) => {
        if(result.isConfirmed){
            window.location.href = url;
        }
      });
}

function alertdelet(iconText, titleText,text,des){
    Swal.fire({
        icon: iconText,
        title: titleText,
        text: text,
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Eliminar"
      }).then((result) => {
        if(result.isConfirmed){
            if(des == 1 ){
                eliminarFotoPerfil(1)
            }
            if(des === 2){
                deleteCuenta(2);
            }
        }
      });
}

function cargando(titulo,mensaje){
    let timerInterval;
    Swal.fire({
    title: titulo,
    html: mensaje,
    timer: 6000,
    timerProgressBar: true,
    didOpen: () => {
        Swal.showLoading();
        const timer = Swal.getPopup().querySelector("b");
        timerInterval = setInterval(() => {
        //timer.textContent = `${Swal.getTimerLeft()}`;
        }, 100);
      },
      willClose: () => {
        clearInterval(timerInterval);
      }
    })
}