$(document).ready(function() {
	$(document).on('click', '#report', function(event) {
		$.ajax({
			url: 'select_date.php',
			type: 'POST',
		})
		.done(function(callback) {
			console.log(callback);
			$('#main-content').children('section').empty().append(`<div class="form-group"><label for="since">Desde: <input type="date" class="form-control" id="since" name="since" placeholder="Desde" max="`+callback+`" value="`+callback+`"></label><label for="until"><input type="date" class="form-control" id="until" name="until" min="`+callback+`" value="`+callback+`"></label><button type="button" class="btn btn-success" id="generate">Aceptar</button></div><div id="container"></div>`)
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	});
	$(document).on('change', '#since', function(event) {
		$(this).val() <= $('#until').val() ? $('#until').attr('min', $(this).val()) : $('#until').attr({min: $(this).val(),value: $(this).val()});
	});
	$(document).on('click', '#generate', function(event) {
		var uri =  "report_assist.php"
		reporte(uri, {since:$('#since').val(), until:$('#until').val()}, "Pacientes que asistieron", "Pacientes");
	});
	function reporte(uri, params, title, text) {
		$.ajax({
			url: uri,
			type: 'POST',
			data: params,
		})
		.done(function(callback) {
			console.log(callback);
		   /* var myChart = Highcharts.chart('#container', {
		        chart: {
		            type: 'bar'
		        },
		        title: {
		            text: title
		        },
		        xAxis: {
		            categories: callback[0].categories
		        },
		        yAxis: {
		            title: {
		                text: text
		            }
		        },
		        series: callback[0].series
		    });*/
		});
	}
});