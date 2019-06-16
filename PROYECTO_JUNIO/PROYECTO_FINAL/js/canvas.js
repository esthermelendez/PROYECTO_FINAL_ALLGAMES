var canvas = document.getElementById("micanvas");
var ctx = canvas.getContext("2d");


var img = new Image();
img.src = "http://localhost/PROYECTO_JUNIO/PROYECTO_FINAL/imagenes/dibujo2.png";

img.onload = function(){
    ctx.drawImage(img, 0, 0, 34, 39);
}
