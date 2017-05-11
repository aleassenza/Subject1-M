<?php session_start();
 if(isset($_SESSION['user'])&&isset($_SESSION['lvl'])) {
 		header("Content-Type: application/json; charset=UTF-8");
 		require_once('bd/abrir.php');
 		$html="";
 		$obj = array('cantidad' => '', 'contenido' =>'');
 		$arr = array();
 		$total = 0;
		$consulta = "SELECT ifnull(count(*), 0) as total,D.contenido, C.motivo, concat(DOC.nombre,' ', DOC.apellido) as fullname, N.id_notificacion FROM NOTIFICACIONES as N JOIN CITAS as C on(N.id_cita = C.id_cita) JOIN DESCRIPCIONES as D on (N.id_descripcion = D.id_descripcion) JOIN USUARIOS as DOC on (DOC.ci_usuario = C.ci_doctor) WHERE C.ci_usuario = ? AND N.visto = 0  LIMIT 10;";
		if ($sentencia = mysqli_prepare($enlace, $consulta)) {
			mysqli_stmt_bind_param($sentencia, "i", $_SESSION['ci']);
			mysqli_stmt_execute($sentencia);
			mysqli_stmt_bind_result($sentencia, $total, $contenido, $motivo, $fullname, $id);
			mysqli_stmt_store_result($sentencia);
			$rowCount = mysqli_stmt_num_rows($sentencia);
			if($rowCount>0) {
				while (mysqli_stmt_fetch($sentencia)) {
					if($total>0)
					{
						$total = $total;
						$html.= 	'<li class="subNot">';
	                    $html.= 		'<a href="#" data-val="'.$id.'">';
	                    $html.=            '<span class="label label-warning"><i class="icon_pin"></i></span>';
	                    $html.=                $motivo.': '.$contenido;
	                    $html.= 			'<span class="small italic pull-right">'.$fullname.'</span>';
	                    $html.=        '</a>';
	                    $html.= 	'</li>';
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
} else {
	header('Location: index.php');
} ?>