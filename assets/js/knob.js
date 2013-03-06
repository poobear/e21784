/*!Knob*/
/**
 * Version: 1
 *
 * Copyright (c) 2012 Vibhavee Trairattanapa (www.withlovee.com)
 * Under MIT and GPL licenses:
 *  http://www.opensource.org/licenses/mit-license.php
 *  http://www.gnu.org/licenses/gpl.html
 *
 */

function CreateKnob(lightColor, darkColor, classname){
	var percent,canvas,context,context2,line,line2,line3,x,y,radius,startAngle,engAngle,counterClockwise,id;
	$('.'+classname).each(function( index ) {
	id = $(this).attr("id");
	percent = $('#'+id+' .rating .num').html();
	canvas = document.getElementById(id+'-canvas');
	context = canvas.getContext('2d');
	context2 = canvas.getContext('2d');
	line = canvas.getContext('2d');
	line2 = canvas.getContext('2d');
	line3 = canvas.getContext('2d');
	x = canvas.width / 2;
	y = canvas.height / 2;
	radius = 71;
	startAngle = 1.5 * Math.PI;
	endAngle = startAngle - (percent*2)/100 * Math.PI;
	counterClockwise = true;

	line3.beginPath();
	line3.arc(x, y, radius+12, 0, 2 * Math.PI, counterClockwise);
	line3.lineWidth = 1;
	line3.fillStyle = '#eeeeee';
	line3.fill();
	line3.strokeStyle = '#dbdbdb';
	line3.stroke();

	line2.beginPath();
	line2.arc(x, y, radius+7, 0, 2 * Math.PI, counterClockwise);
	line2.lineWidth = 2;
	line2.fillStyle = '#f3f3f3';
	line2.fill();
	line2.strokeStyle = '#d6d6d6';
	line2.stroke();

	context.beginPath();
	context.arc(x, y, radius, startAngle, endAngle, counterClockwise);
	context.lineWidth = 15;
	context.strokeStyle = darkColor;
	context.stroke();

	context2.beginPath();
	context2.arc(x, y, radius-5, startAngle, endAngle, counterClockwise);
	context2.lineWidth = 7;
	context2.strokeStyle = lightColor;
	context2.stroke();

	line.beginPath();
	line.arc(x, y, radius-9, 0, 2 * Math.PI, counterClockwise);
	line.lineWidth = 1;
	line.fillStyle = '#f7f7f7';
	line.fill();
	line.strokeStyle = '#e9e9e9';
	line.stroke();

	});
}