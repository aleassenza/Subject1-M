$(document).ready(function() {
	$(document).on('dblclick', '#docs-table tr td:not(:last-child)', function() {
		var crud = `<div class="col-md-12">
					<div class="col-md-2">
						<button type="button" class="btn btn-warning" id="update_doctor">Modificar</button>
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
	$(document).on('dblclick', '#patient-table tr td:not(:last-child)', function() {
		var crud = `<div class="col-md-12">
					<div class="col-md-2">
						<button type="button" class="btn btn-warning" id="update">Modificar</button>
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
	$(document).on('dblclick', '#moderator-table tr td:not(:last-child)', function() {
		var crud = `<div class="col-md-12">
					<div class="col-md-2">
						<button type="button" class="btn btn-warning" id="update">Modificar</button>
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
	$(document).on('click', '#status',function() {
		$(this).hasClass('btn-success') ? $(this).removeClass('btn-success').addClass('btn-danger').html('INACTIVO') : $(this).removeClass('btn-danger').addClass('btn-success').html('ACTIVO');
		$.ajax({
			url: 'status.php',
			type: 'POST',
			data: {status:$(this).html()[0] ,ci:$(this).parents('tr').children('td').eq(1).html() , correo:$(this).parents('tr').children('td').eq(5).html()},
		})
		.done(function(callback) {
			console.log(callback)
			callback==1 ? swal('Actualiacion', 'Estado actualizado.', 'success') : swal('Actualiacion', 'Error: Estado no actualizado.', 'error')
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	});
	$(document).on('click', '#update', function() {
		$.ajax({
			url: 'get_users.php',
			type: 'POST',
			dataType: 'json',
			data: {mail:$('table tbody tr[class="success"]').children('td').eq(5).html() , ci:$('table tbody tr[class="success"]').children('td').eq(1).html()},
		})
		.done(function(callback) {
			console.log(callback);
			var form=`<form method="POST" action="modify_user.php" class="container">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6 form-group">
						<label for="ci_user">C&eacute;dula: </label>
							<p id="ci_user" name="ci_user">`+callback[0]+`</p>
						</div>
						<div class="col-md-6 form-group">
						<label for="nombre_user">Nombre: </label>
							<input type="text" class="form-control" id="nombre_user" name="nombre_user" value="`+callback[1]+`"/>
						</div>
						<div class="col-md-6 form-group">
						<label for="apellido_user">Aepllido: </label>
							<input type="text" class="form-control" id="apellido_user" name="apellido_user" value="`+callback[2]+`"/>
						</div>
						<div class="col-md-6 form-group">
						<label for="telefono_user">Tel&eacute;fono: </label>
							<input type="text" class="form-control" id="telefono_user" name="telefono_user" value="`+callback[3]+`"/>
						</div>
						<div class="col-md-6 form-group">
						<label for="correo_user">Correo: </label>
							<input type="text" class="form-control" id="correo_user" name="correo_user" value="`+callback[4]+`"/>
						</div>
						<div class="col-md-6 form-group">
						<label for="fecha_user">Fecha de registro: </label>
							<p id="fecha_user" name="fecha_user">`+callback[5]+`</p>
						</div>
					</div>
				</div>
			</form>`;
			var botones = `<button type="button" class="btn btn-success" id="update_user" name="update_user">Aceptar</button>
			<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>`;
			$('#modal-general .modal-body').empty().append(form);
			$('#modal-general .modal-footer').empty().append(botones);
			$('#modal-general').modal('show');
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	});$(document).on('click', '#update_doctor', function() {
		$.ajax({
			url: 'get_doctor.php',
			type: 'POST',
			data: {mail:$('table tbody tr[class="success"]').children('td').eq(5).html() , ci:$('table tbody tr[class="success"]').children('td').eq(1).html()},
		})
		.done(function(callback) {
			console.log(callback);
			var option;
			$.each(callback, function(index, el) {
				option += `<option value="`+callback[index].id+`">`+callback[index].descripcion+`</option>`;
			});
			var select = `<select id="especializacion" name="especializacion" class="form-control">
						<option value="">Seleccione</option>
						`+option+`
			</select>`;
			var form=`<form method="POST" action="modify_doctor.php" id="form_doctor" class="container">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6 form-group">
						<label for="ci_user">C&eacute;dula: </label>
							<p id="ci_user" name="ci_user">`+callback[0].ci+`</p>
						</div>
						<div class="col-md-6 form-group">
						<label for="name"><strong style="color:red">*</strong>Nombre: </label>
							<input type="text" class="form-control" id="name" name="name" value="`+callback[0].nombre+`"/>
						</div>
						<div class="col-md-6 form-group">
						<label for="lastname"><strong style="color:red">*</strong>Aepllido: </label>
							<input type="text" class="form-control" id="lastname" name="lastname" value="`+callback[0].apellido+`"/>
						</div>
						<div class="col-md-6 form-group">
						<label for="phone">Tel&eacute;fono: </label>
							<input type="text" class="form-control" id="phone" name="phone" value="`+callback[0].telefono+`"/>
						</div>
						<div class="col-md-6 form-group">
						<label for="mail"><strong style="color:red">*</strong>Correo: </label>
							<input type="mail" class="form-control" id="mail" name="mail" value="`+callback[0].correo+`"/>
						</div>
						<div class="col-md-6 form-group">
							<label for="fecha"><strong style="color:red">*</strong>Fecha de registro: </label>
							<p id="fecha" name="fecha">`+callback[0].fecha+`</p>
						</div>
						<div class="col-md-6 form-group">
							<label for="especializacion"><strong style="color:red">*</strong>Especializacion: </label>
							`+select+`
						</div>
						<div class="col-md-6 form-group">
						<label for="cov"><strong style="color:red">*</strong>COV: </label>
							<input type="text" class="form-control" id="cov" name="cov" value="`+callback[0].cov+`"/>
						</div>
						<div class="col-md-6 form-group">
							<label for="mpps"><strong style="color:red">*</strong>MPPS: </label>
							<input type="text" class="form-control" id="mpps" name="mpps" value="`+callback[0].mpps+`"/>
						</div>
					</div>
				</div>
			</form>`;
			var botones = `<button type="button" class="btn btn-success" id="update_doc" name="update_doc">Aceptar</button>
			<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>`;
			$('#modal-general .modal-body').empty().append(form);
			$('#especializacion').children('option[value="'+callback[0].ide+'"]').attr('selected', 'selected');
			$('#modal-general .modal-footer').empty().append(botones);
			$('#modal-general').modal('show');
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	});
	$(document).on('click', '#update_user', function() {
		$.ajax({
			url: 'modify_user.php',
			type: 'POST',
			data: $('form').serialize()+'&ci='+$('#ci_user').html()
		})
		.done(function(callback) {
			console.log(callback);
			$('#modal-general').modal('hide');
			callback['action'] == 'success' ? swal({title: 'Actualiacion',text: "Usuario actualizado.",type: 'success',confirmButtonColor: '#3085d6',confirmButtonText: 'Aceptar'}).then(function () {location.reload();}) : swal({title: 'Actualiacion',text: "Usuario actualizado.",type: 'success',confirmButtonColor: '#3085d6',confirmButtonText: 'Aceptar'}).then(function () {location.reload();});
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	})
	$(document).on('click', '#update_doc', function() {
		$.ajax({
			url: 'register_doctor.php',
			type: 'POST',
			data: $('form').serialize()+'&ci='+$('#ci_user').html()+'&update='
		})
		.done(function(callback) {
			console.log(callback);
			$('#modal-general').modal('hide');
			callback['action'] == 'success' ? swal({title: 'Actualiacion',text: "Usuario actualizado.",type: 'success',confirmButtonColor: '#3085d6',confirmButtonText: 'Aceptar'}).then(function () {location.reload(true);}) : swal({title: 'Actualiacion',text: "Usuario actualizado.",type: 'success',confirmButtonColor: '#3085d6',confirmButtonText: 'Aceptar'}).then(function () {location.reload(true);});
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	})
	$(document).on('click', '#delete', function() {
		$.ajax({
			url: 'delete_user.php',
			type: 'POST',
			data: {ci:$('table tbody tr[class="success"]').children('td').eq(1).html(), correo:$('table tbody tr[class="success"]').children('td').eq(5).html()},
		})
		.done(function(callback) {
			callback['action'] == 'success' ? swal('Actualiacion', 'Usuario actualizado.', 'success') : swal('Actualiacion', 'Error: Usuario no actualizado.', 'error');
			$('#users-table').load('tabla.php')
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

	});
	$(document).on('click', '#agregar_doctor', function() {
		$.ajax({
			url: 'get_specialization.php',
			type: 'POST',
		})
		.done(function(callback) {
			var option;
			$.each(callback, function(index, el) {
				option += `<option value="`+callback[index].id+`">`+callback[index].descripcion+`</option>`;
			});
			var select = `<select id="especializacion" name="especializacion" class="form-control">
				<option value="">Seleccione</option>
				`+option+`
			</select>`;
			var form=`<form method="POST" action="register_doctor.php" id="form_doctor" class="container">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6 form-group">
						<label for="ci"><strong style="color:red">*</strong>C&eacute;dula: </label>
							<input type="text" class="form-control" id="ci" name="ci" maxl/>
						</div>
						<div class="col-md-6 form-group">
						<label for="name"><strong style="color:red">*</strong>Nombre: </label>
							<input type="text" class="form-control" id="name" name="name""/>
						</div>
						<div class="col-md-6 form-group">
						<label for="lastname"><strong style="color:red">*</strong>Aepllido: </label>
							<input type="text" class="form-control" id="lastname" name="lastname"/>
						</div>
						<div class="col-md-6 form-group">
						<label for="phone">Tel&eacute;fono: </label>
							<input type="text" class="form-control" id="phone" name="phone"/>
						</div>
						<div class="col-md-6 form-group">
						<label for="mail"><strong style="color:red">*</strong>Correo: </label>
							<input type="mail" class="form-control" id="mail" name="mail"/>
						</div>
						<div class="col-md-6 form-group">
							<label for="especializacion"><strong style="color:red">*</strong>Especializaci&oacute;n: </label>
							`+select+`
						</div>
						<div class="col-md-6 form-group">
							<label for="password"><strong style="color:red">*</strong>Contrase&ntilde;a: </label>
							<input type="password" class="form-control" id="password" name="password"/>
						</div>
						<div class="col-md-6 form-group">
							<label for="confirm"><strong style="color:red">*</strong>Repetir Contrase&ntilde;a: </label>
							<input type="password" class="form-control" id="confirm" name="confirm"/>
						</div>
						<div class="col-md-6 form-group">
						<label for="cov"><strong style="color:red">*</strong>COV: </label>
							<input type="text" class="form-control" id="cov" name="cov" />
						</div>
						<div class="col-md-6 form-group">
							<label for="mpps"><strong style="color:red">*</strong>MPPS: </label>
							<input type="text" class="form-control" id="mpps" name="mpps" />
						</div>
					</div>
				</div>
			</form>`;
			var botones = `<button type="button" class="btn btn-success" id="insert_user" name="insert_user">Aceptar</button>
			<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>`;
			$('#modal-general .modal-body').empty().append(form);
			$('#modal-general .modal-footer').empty().append(botones);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

			$('#modal-general').modal('show');
	});
	$(document).on('click', '#agregar', function() {
		var nivel="";
		$(this).attr('data-id') == "mod" ? nivel="mod" : nivel="insert_user"
			var form=`<form method="POST" action="register.php" id="form_doctor" class="container">
				<div class="container-fluid">
					<div class="row">
						<input type="hidden" name="`+nivel+`"/>
						<div class="col-md-6 form-group">
						<label for="ci"><strong style="color:red">*</strong>C&eacute;dula: </label>
							<input type="text" class="form-control" id="ci" name="ci"/>
						</div>
						<div class="col-md-6 form-group">
						<label for="name"><strong style="color:red">*</strong>Nombre: </label>
							<input type="text" class="form-control" id="name" name="name""/>
						</div>
						<div class="col-md-6 form-group">
						<label for="lastname"><strong style="color:red">*</strong>Aepllido: </label>
							<input type="text" class="form-control" id="lastname" name="lastname"/>
						</div>
						<div class="col-md-6 form-group">
						<label for="phone">Tel&eacute;fono: </label>
							<input type="text" class="form-control" id="phone" name="phone"/>
						</div>
						<div class="col-md-6 form-group">
						<label for="mail"><strong style="color:red">*</strong>Correo: </label>
							<input type="mail" class="form-control" id="mail" name="mail"/>
						</div>
						<div class="col-md-6 form-group">
							<label for="password"><strong style="color:red">*</strong>Contrase&ntilde;a: </label>
							<input type="password" class="form-control" id="password" name="password"/>
						</div>
						<div class="col-md-6 form-group">
							<label for="confirm"><strong style="color:red">*</strong>Repetir Contrase&ntilde;a: </label>
							<input type="password" class="form-control" id="confirm" name="confirm"/>
						</div>
					</div>
				</div>
			</form>`;
			var botones = `<button type="button" class="btn btn-success" id="insert_user" name="`+nivel+`">Aceptar</button>
			<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>`;
			$('#modal-general .modal-body').empty().append(form);
			$('#modal-general .modal-footer').empty().append(botones);
			$('#modal-general').modal('show');
	});
	$(document).on('click', '#insert_user', function() {
		console.log();
		$('#form_doctor').submit();
	});
	$(document).on('click', '#profile', function() {
		$.ajax({
			url: 'get_users.php',
			type: 'POST',
			dataType: 'json',
			data: {mail:$('#user').attr('data-mail'), ci:$('#user').attr('data-ci')},
		})
		.done(function(callback) {
			var form=`<form method="POST" action="modify_user.php" class="container">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6 form-group">
						<label for="ci_user">C&eacute;dula: </label>
							<p id="ci_user" name="ci_user">`+callback[0]+`</p>
						</div>
						<div class="col-md-6 form-group">
						<label for="nombre_user">Nombre: </label>
							<input type="text" class="form-control" id="nombre_user" name="nombre_user" value="`+callback[1]+`"/>
						</div>
						<div class="col-md-6 form-group">
						<label for="apellido_user">Aepllido: </label>
							<input type="text" class="form-control" id="apellido_user" name="apellido_user" value="`+callback[2]+`"/>
						</div>
						<div class="col-md-6 form-group">
						<label for="telefono_user">Tel&eacute;fono: </label>
							<input type="text" class="form-control" id="telefono_user" name="telefono_user" value="`+callback[3]+`"/>
						</div>
						<div class="col-md-6 form-group">
						<label for="correo_user">Correo: </label>
							<input type="text" class="form-control" id="correo_user" name="correo_user" value="`+callback[4]+`"/>
						</div>
						<div class="col-md-6 form-group">
						<label for="pass">Contrase&ntilde;a: </label>
							<input type="text" class="form-control" id="pass" name="pass" value=""/>
						</div>
						<div class="col-md-6 form-group">
						<label for="fecha_user">Fecha de registro: </label>
							<p id="fecha_user" name="fecha_user">`+callback[5]+`</p>
						</div>
					</div>
					<button type="button" class="btn btn-success" id="update_user" name="update_user">Aceptar</button>
				</div>
			</form>`;
			$('#main-content').find('section').empty().append(form);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	});
	$(document).on('click', '#doctor', function(event) {
		$.ajax({
		url: 'select_doctors_all.php',
		type: 'POST',
		})
		.done(function(callback) {
			$('#main-content').find('section').empty().append(callback);
			$('#main-content').find('section').append(`<button type="button" class="btn btn-success" id="agregar_doctor">Agregar</button>`);
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	});
	$(document).on('click', '#paciente', function(event) {
		$.ajax({
		url: 'select_patients.php',
		type: 'POST',
		})
		.done(function(callback) {
			$('#main-content').find('section').empty().append(callback);
			$('#main-content').find('section').append(`<button type="button" class="btn btn-success" id="agregar">Agregar</button>`);
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	});
	$(document).on('click', '#moderador', function(event) {
		$.ajax({
		url: 'select_moderators_admin.php',
		type: 'POST',
		})
		.done(function(callback) {
			$('#main-content').find('section').empty().append(callback);
			$('#main-content').find('section').append(`<button type="button" class="btn btn-success" data-id="mod" id="agregar">Agregar</button>`);
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	});
});