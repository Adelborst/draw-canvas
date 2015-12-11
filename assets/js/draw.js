$(document).ready(function() {

	if ($('#canvasCreate')[0]) {
		context = $('#canvasCreate')[0].getContext("2d");
		var img = new Image();
		if ($('#canvas-data').attr('data-id'))
		{
			var imgData = $('#canvas-data').attr('data-name');
			img.src = 'storage/' + imgData + '.png';
			console.log(img.src);
			img.onload = function () {
		   		context.drawImage(img,0,0);
			};
		}
	}

	$('#canvasCreate').mousedown(function(e) {
		var mouseX = e.pageX - this.offsetLeft;
		var mouseY = e.pageY - this.offsetTop;
		paint = true;
		addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop);
		redraw();
	});

	$('#canvasCreate').mousemove(function(e) {
		if (paint) {
			addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
			redraw();
		}
	});

	$('#canvasCreate').mouseup(function(e) {
		paint = false;
	});

	$('#canvasCreate').mouseleave(function(e) {
		paint = false;
	});

	var clickX = new Array();
	var clickY = new Array();
	var clickDrag = new Array();
	var colorBlack = "#000";
	var colorWhite = "#fff";
	var curColor = colorBlack;
	var clickColor = new Array();
	var paint;

	function addClick(x, y, dragging) {
		clickX.push(x);
		clickY.push(y);
		clickDrag.push(dragging);
		clickColor.push(curColor);
	}

	function redraw() {
		context.lineJoin = "round";
		context.lineWidth = 5;

		for (var i = 0; i < clickX.length; i++) {
			context.beginPath();
			if (clickDrag[i] && i) {
				context.moveTo(clickX[i - 1], clickY[i - 1]);
			} else {
				context.moveTo(clickX[i] - 1, clickY[i]);
			}
			context.lineTo(clickX[i], clickY[i]);
			context.closePath();
			context.strokeStyle = clickColor[i];
			context.stroke();
		}
	}

	$('#clear_part').click(function(e) {
		curColor = colorWhite;
	});

	$('#black-color').click(function(e) {
		curColor = colorBlack;
	});

	$('#save_canvas').click(function(e) {
		var canvas = document.getElementById("canvasCreate");
		var dataUrl = canvas.toDataURL();
		var password = $('#password').val();
		var id;
		var name;
		var url = '?action=insert';
		if ($('#canvas-data').attr("data-id")) {
			id = $('#canvas-data').attr("data-id");
			name = $('#canvas-data').attr("data-name");
			url = '?action=update';
		} 
		$.ajax({
			type: "POST",
			url: url,
			data: {
				image: dataUrl,
				password: password,
				id: id,
				name: name
			}
		})
			.success(function(respond) {
			$('.alert').addClass('alert-success').html('Рисунок успешно сохранен');
		})
			.fail(function(respond) {
			$('.alert').addClass('alert-danger').html('Операция не удалась');
		});
	});

	$('.btn-xs').click(function() {
		$('.btn-xs').removeClass('active');
		$(this).addClass('active');
	});

});