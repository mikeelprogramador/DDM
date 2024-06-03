
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