<?php session_start();
 if(isset($_SESSION['user']) && isset($_SESSION['lvl'])) {
 		if(isset($_POST['data']) && $_POST['data']!= '') {
	 		header("Content-Type: application/json; charset=UTF-8");
	 		$data = $_POST['data'];
	 		require_once('bd/abrir.php');
	 		$html="";
	 		$obj = array('cantidad' => '', 'contenido' =>'');
	 		$arr = array();
	 		$total = 0;
			$consulta = "SELECT ifnull(count(*), 0) as total,D.contenido, C.motivo, concat(DOC.nombre,' ', DOC.apellido) as fullname, N.id_notificacion FROM NOTIFICACIONES as N JOIN CITAS as C on(N.id_cita = C.id_cita) JOIN DESCRIPCIONES as D on (N.id_descripcion = D.id_descripcion) JOIN USUARIOS as DOC on (DOC.ci_usuario = C.ci_doctor) WHERE C.ci_usuario = ? AND N.visto = 0 AND N.id_notificacion = ?;";
			if ($sentencia = mysqli_prepare($enlace, $consulta)) {
				mysqli_stmt_bind_param($sentencia, "ii", $_SESSION['ci'], $data);
				mysqli_stmt_execute($sentencia);
				mysqli_stmt_bind_result($sentencia, $total, $contenido, $motivo, $fullname, $id);
				mysqli_stmt_store_result($sentencia);
				$rowCount = mysqli_stmt_num_rows($sentencia);
				if($rowCount>0) {
					while (mysqli_stmt_fetch($sentencia)) {
						if($total>0)
						{
							$total = $total;
		                    $html.='<div class="panel-body">';
      							$html.='<h5><b>Motivo de la consulta: </b></h5>'.$motivo.' :'.$contenido;
      							$html.='<br/>';
      							$html.='<br/>';
      							$html.='<h5><b>Doctor: </h5></label>'.$fullname;
							$html.='</div>';
							}
						}
					}
						$obj['cantidad'] = $total;
						$obj['contenido']= $html;
						$obj = (object) $obj;
						$arr[] = $obj;
			    mysqli_stmt_close($sentencia);
				echo json_encode($arr);
			} else {
				echo "asd";
			}
			require_once('bd/cerrar.php');
 		}
} else {
	header('Location: index.php');
} ?>