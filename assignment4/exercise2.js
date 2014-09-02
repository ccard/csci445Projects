var x = 0;
var y = 0;

function init () {
	var canvas = document.getElementById("catDrawing");
	var image = document.getElementById("imgMove");
	move(image,canvas);
	window.addEventListener("keyup",keyupevent,false);
}

function move (img,canvas) {
	if(img && canvas){
		var ctx = canvas.getContext("2d");
		ctx.clearRect(0,0,canvas.width,canvas.height);
		ctx.save();
		ctx.drawImage(img,x,y);
		ctx.restore();
	}
}

function keyupevent (event) {
	if(event){
		var canvas = document.getElementById("catDrawing");
		var image = document.getElementById("imgMove");
		if (event.keyCode === 37) {
			if((x-10) >= 0){
				x-=10;
				move(image,canvas);
			}
		} else if(event.keyCode === 39){
			if(((x+10)+image.width) < canvas.width){
				x+=10;
				move(image,canvas);
			}
		}
	}
}