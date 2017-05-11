<?php session_start();
 if(isset($_SESSION['user']) && isset($_SESSION['lvl'])) {
 		header("Content-Type: application/json; charset=UTF-8");
 		require_once('bd/abrir.php');
 		$html="";
 		$response = [];
 		$arr = Array('total' => '', 'cont' => '');
 		$realTotal = 0;
 		$type="";
		 	$html.='<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">';
		$consulta = "SELECT count(*) as total, N.id_notificacion, D.contenido, C.motivo, concat(DOC.nombre,' ', DOC.apellido) as fullname, N.estado, N.visto FROM NOTIFICACIONES as N JOIN CITAS as C on(N.id_cita = C.id_cita) JOIN DESCRIPCIONES as D on (N.id_descripcion = D.id_descripcion) JOIN USUARIOS as DOC on (DOC.ci_usuario = C.ci_doctor) WHERE C.ci_usuario = ? AND N.estado = 'A';";
		if ($sentencia = mysqli_prepare($enlace, $consulta)) {
			mysqli_stmt_bind_param($sentencia, "i", $_SESSION['ci']);
			mysqli_stmt_execute($sentencia);
			mysqli_stmt_bind_result($sentencia, $total, $id, $contenido, $motivo, $fullname, $estado, $visto);
			mysqli_stmt_store_result($sentencia);
			$rowCount = mysqli_stmt_num_rows($sentencia);
			if($rowCount>0) {
				while (mysqli_stmt_fetch($sentencia)) {
					if($total>0) {
						$visto == 0 ? $type = '<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>' : $type = "";
						$realTotal = $total;
		  		$html.='<div class="panel panel-default">';
    				$html.='<div class="panel-heading" role="tab" id="headingOne" data-read="'.$estado.'">';
				      $html.='<h4 class="panel-title">';
				        $html.='<a role="button" data-toggle="collapse" data-parent="#accordion" href="#'.$id.'" aria-controls="'.$id.'">';
				          $html.=$motivo.' '.$type;
				        $html.='</a>';
				      $html.='</h4>';
				    $html.='</div>';
				    $html.='<div id="'.$id.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">';
      					$html.='<div class="panel-body">';
      							$html.='<label><b>Motivo de la consulta: </b></label>'.$contenido;
      							$html.='<br/>';
      							$html.='<br/>';
      							$html.='<label><b>Doctor: </b></label>'.$fullname;
							$html.='</div>';
						$html.='</div>';
					$html.='</div>';
					}
				}
			}
					$html.='</div>';
			$arr['total'] = $realTotal;
			$arr['cont'] = $html;
			$response[] = $arr;
			echo json_encode($response);
		    mysqli_stmt_close($sentencia);
		}
		require_once('bd/cerrar.php');
} else {
	header('Location: index.php');
} ?>