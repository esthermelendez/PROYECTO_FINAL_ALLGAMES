var canvas = document.getElementById("micanvas");
var ctx = canvas.getContext("2d");


var img = new Image();
img.src = "http://allgame.epizy.com/imagenes/dibujo2.png";

img.onload = function(){
    ctx.drawImage(img, 0, 0, 34, 39);
}
