$(document).ready(function() {
	$(document).on('click', '#cita', function(){
		$.ajax({
			url: 'dates.php',
			type: 'POST',
		})
		.done(function(callback) {
			console.log("success");
			$('#main-content').find('section').empty().append(callback);
			$('#users-table').before(`<label for="filter">Filtro: </label><select class="form-control" id="filter" name="filter"><option>Seleccione</option><option value="AGENDADA" selected="selected">AGENDADA</option><option value="CANCELADA">CANCELADA</option><option value="FINALIZADA">FINALIZADA</option></select>`);
			$('#main-content').find('section').append(`<button type="button" class="btn btn-success" id="agregar_cita">Agregar</button>`);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	})
	$(document).on('change', '#filter', function() {
		var filter = $(this).children('option:selected').val();
		$('#users-table tbody tr').show();
		$.each($('#users-table tbody tr'), function(i, val) {
        	$(this).children('td:eq(11)').children('select').children('option:selected').val() == filter ? $('#users-table tbody tr').eq(i).removeAttr('style') : $('#users-table tbody tr').eq(i).hide()
    	});
	})
	$(document).on('dblclick', '#users-table tr td:not(:last-child)', function() {
		var crud = `<div class="col-md-12">
					<div class="col-md-2">
						<button type="button" class="btn btn-warning" id="update_date">Modificar</button>
					</div>
					<div class="col-md-2">
						<button type="button" class="btn btn-danger" id="delete">Eliminar</button>
					</div>`;
		if($(this).parent('tr').hasClass('success')) {
			$(this).parent('tr').removeAttr('class').parents('table').next('div').remove();
		} else {
			if($('#users-table tr').hasClass('success')) {
				$('#users-table tr').removeAttr('class').parents('table').next('div').remove();
				$(this).parent('tr').addClass('success').parents('table').after(crud);
			} else {
				$(this).parent('tr').addClass('success').parents('table').after(crud);
			}
		}
	});
	$(document).on('change', '#estado', function() {
		$.ajax({
			url: 'date_status.php',
			type: 'POST',
			data: {status: $(this).children('option:selected').val()[0], ci:$('#users-table tbody tr td').eq(1).html()},
		})
		.done(function(callback) {
			console.log("success");
			callback==1 ? swal('Actualiacion', 'Estado actualizado.', 'success') : swal('Actualiacion', 'Error: Estado no actualizado.', 'error')
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	});
	$(document).on('click', '#agregar_cita', function() {
		$.ajax({
			url: 'select_doctors.php',
			type: 'POST',
		})
		.done(function(callback) {
			var option="";
			$.each(callback, function(index) {
				option+=`<option value="`+callback[index].ci+`">`+callback[index].fullname+`</option>`
			});
			var form=`<form method="POST" action="register_cita.php" id="form_cita" class="container">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-6 form-group">
									<label for="ci_doctor"><strong style="color:red">*</strong>Doctor: </label>
									<select id="ci_doctor" name="ci_doctor" class="form-control">
									<option>Seleccione</option>`
									+option+
									`</select>
								</div>
								<div class="col-md-6 form-group">
									<label for="ci"><strong style="color:red">*</strong>C&eacute;dula paciente: </label>
									<input type="text" class="form-control" id="ci" name="ci"/>
								</div>
							</div>
						</div>
					</form>`
			$('#modal-general .modal-body').empty().append(form);
		});
		$.ajax({
			url: 'select_description.php',
			type: 'POST',
		})
		.done(function(output) {
			var description="";
			$.each(output, function(index) {
				description+=`<option value="`+output[index].id+`">`+output[index].contenido+`</option>`
			});
			var formDesc = `<div class="col-md-6 form-group">
								<label for="motivo"><strong style="color:red">*</strong>Motivo: </label>
								<select id="motivo" name="motivo" class="form-control">
								<option>Seleccione</option>`
								+description+
								`</select>
							</div>
							<div class="col-md-6 form-group">
								<label for="descripcion"><strong style="color:red">*</strong>Descripci&oacute;n: </label>
								<textarea class="form-control" id="descripcion" name="descripcion"></textarea>
							</div>
							<div class="col-md-6 form-group">
								<label for="date"><strong style="color:red">*</strong>Fecha: </label>
								<input type="datetime-local" class="form-control" id="date" name="date" min="`+output[0].fecha+`">
							</div>`;

			$('#modal-general .modal-body form div.row').append(formDesc);
		});
		$.ajax({
			url: 'select_cita.php',
			type: 'POST',
		})
		.done(function(callback2) {
		var formDate = `<div class="col-md-12 form-group">
							<label for="date"><strong style="color:red">*</strong>Fecha: </label>
							<input type="datetime-local" class="form-control" id="date" min="`+callback2[0].fecha+`">
						</div>`;
			var botones = `<button type="button" class="btn btn-success" id="insert_cita" name="insert_cita">Aceptar</button>
			<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>`;
			// $('#modal-general .modal-body form div.row').append(formDate);
			$('#modal-general .modal-footer').empty().append(botones);
			/*<div id='calendar'></div>*/
			/*$('#date').on('change', function(){
				$('#calendar').fullCalendar('renderEvent',{title:'test', start:$('#date').val()})
			})
			$('#calendar').fullCalendar({
		        // put your options and callbacks here
		        locale: 'es',
		        weekends: false,
				editable: false,
				eventLimit: true,
				events: callback2
		    })*/
		});
		$('#modal-general').modal('show');
	});
	$(document).on('click', '#insert_cita', function() {
		$('#form_cita').submit();
	});
	$(document).on('click', 'a[role="button"]', function(){
		console.log('in')
		var id = $(this).attr('aria-controls');
		if($(this).children('span')) {
			$.ajax({
			url: 'modify_date.php',
			type: 'POST',
			data: {id: id},
			})
			.done(function() {
				console.log("success");
			});

			$.ajax({
			url: 'get_dates.php',
			type: 'POST',
			})
			.done(function(callback) {
				console.log(callback);
				$('#cant').html(callback[0].cantidad)
				$('#cant_not').html('Usted tiene: '+callback[0].cantidad+' notificaciones')
				$('#cant_not').after(callback[0].contenido)
			})
			$('#alert_notificatoin_bar').find('.subNot a[data-val="'+id+'"]').parent('li').remove();
			$(this).children('span').remove();
		}
	});
});