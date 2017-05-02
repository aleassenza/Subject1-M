	<script src="js/prueba.js"></script>
	<link rel="stylesheet" href="css/login.css">
<div class="container">
    	<div class="row">
			<div class="col-md-6">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Inicio de sesi&oacute;n</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Registrar</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="verify.php" method="POST" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Correo" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Contrase&ntilde;a">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<button type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login">Iniciar sesi&oacute;n</button>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a tabindex="5" id="forgotPass" class="forgot-password">¿Olvidaste tu contrase&ntilde;a?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="register.php" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Nombre" value="">
									</div>
									<div class="form-group">
										<input type="text" name="lastname" id="lastname" tabindex="2" class="form-control" placeholder="Apellido">
									</div>
									<div class="form-group">
										<input type="text" name="ci" id="ci" tabindex="2" class="form-control" placeholder="C&eacute;dula">
									</div>
									<div class="form-group">
										<input type="email" name="mail" id="mail" tabindex="2" class="form-control" placeholder="Correo">
									</div>
									<div class="form-group">
										<input type="text" name="phone" id="phone" tabindex="2" class="form-control" placeholder="Tel&eacute;fono">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Contrase&ntilde;a">
									</div>
									<div class="form-group">
										<input type="password" name="confirm" id="confirm" tabindex="2" class="form-control" placeholder="Confirmar contrase&ntilde;a">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<button type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Reg&iacute;strate">Registrar</button
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<div class="modal fade">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Olvid&oacute; su contrase&ntilde;a</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
			<input type="email" name="emailForgot" id="emailForgot" tabindex="1" class="form-control" placeholder="Correo" value="">
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success">Aceptar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>