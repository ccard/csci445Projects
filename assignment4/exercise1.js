function init(){
	var canvas = document.getElementById("drawing");
	drawSmilly(canvas);
	canvas.addEventListener("mousedown",mouseClick,false);
}

function drawFrown(canvas){
	if(canvas){
		var ctx = canvas.getContext("2d");
		ctx.save();
		ctx.clearRect(0,0,canvas.width,canvas.height);

		//Draws the circle for the face
		ctx.fillStyle = "#FFE938";
		ctx.beginPath();
		ctx.arc(100,100,90,0,2*Math.PI);
		ctx.fill();
		ctx.lineWidth=2;
		ctx.stroke();
		ctx.closePath();

		//Draws the frown
		ctx.beginPath();
		ctx.arc(100,190,50,(11/9)*Math.PI,(16/9)*Math.PI);
		ctx.lineWidth=5;
		ctx.stroke();
		ctx.closePath();

		//Draws the eyse
		ctx.beginPath();
		ctx.fillStyle = "#FF0000";
		ctx.lineWidth = 2;
		ctx.scale(1,1.5);
		ctx.arc(70,50,20,0,2*Math.PI);
		ctx.stroke();
		ctx.fill();
		ctx.closePath();

		ctx.beginPath();
		ctx.arc(130,50,20,0,2*Math.PI);
		ctx.stroke();
		ctx.fill();
		ctx.closePath();

		ctx.beginPath();
		ctx.fillStyle = "#000";
		ctx.arc(130,65,5,0,2*Math.PI);
		ctx.stroke();
		ctx.fill();
		ctx.closePath();

		ctx.beginPath();
		ctx.arc(70,65,5,0,2*Math.PI);
		ctx.stroke();
		ctx.fill();
		ctx.closePath();
		ctx.restore();
	}
}

function drawSmilly(canvas){
	if(canvas){
		var ctx = canvas.getContext("2d");
		ctx.save();
		ctx.clearRect(0,0,canvas.width,canvas.height);

		//Draws the circle for the face
		ctx.fillStyle = "#FFE938";
		ctx.beginPath();
		ctx.arc(100,100,90,0,2*Math.PI);
		ctx.fill();
		ctx.lineWidth=2;
		ctx.stroke();
		ctx.closePath();
		//Draws the frown
		ctx.beginPath();
		ctx.fillStyle = "#FF6283";
		ctx.arc(100,130,40,0,Math.PI);
		ctx.moveTo(60,130);
		ctx.lineTo(140,130);
		ctx.lineWidth=5;
		ctx.stroke();
		ctx.fill();
		ctx.closePath();

		//Draws the eyse
		ctx.beginPath();
		ctx.fillStyle = "#FF60A3";
		ctx.lineWidth = 2;
		ctx.scale(1,1.5);
		ctx.arc(70,50,20,0,2*Math.PI);
		ctx.stroke();
		ctx.fill();
		ctx.closePath();

		ctx.beginPath();
		ctx.arc(130,50,20,0,2*Math.PI);
		ctx.stroke();
		ctx.fill();
		ctx.closePath();

		ctx.beginPath();
		ctx.fillStyle = "#000";
		ctx.arc(130,45,5,0,2*Math.PI);
		ctx.stroke();
		ctx.fill();
		ctx.closePath();

		ctx.beginPath();
		ctx.arc(70,45,5,0,2*Math.PI);
		ctx.stroke();
		ctx.fill();
		ctx.closePath();
		ctx.restore();
	}
}

function mouseClick(event){
	var x = new Number();
	var y = new Number();

	var canvas = document.getElementById("drawing");
	var button = document.getElementById("smilly");

	if(event.x !== undefined && event.y !== undefined){
		x = event.x;
		y = event.y;
	} else {
		//Referenced source http://miloq.blogspot.com/2011/05/coordinates-mouse-click-canvas.html
		x = event.clientX + document.body.scrollLeft + 
		document.documentElement.scrollLeft;
		y = event.clientY + document.body.scrollTop + 
		document.documentElement.scrollTop;
	}

	x -= canvas.offsetLeft;
	y -= canvas.offsetTop;

	var isContained = (((x-100)^2)+((y-100)^2)) < (90^2);
	if(isContained){
		if(button.value === "1"){
			drawFrown(canvas);
			button.value = "2";
			button.innerHTML = "Make Happy!";
		} else {
			drawSmilly(canvas);
			button.value = "1";
			button.innerHTML = "Make Sad";
		}
	}
}

function buttonClick(element){
	if(element){
		var canvas = document.getElementById("drawing");
		if(element.value === "1"){
			drawFrown(canvas);
			element.value = "2";
			element.innerHTML = "Make Happy!";
		} else {
			drawSmilly(canvas);
			element.value = "1";
			element.innerHTML = "Make Sad";
		}
	}
}