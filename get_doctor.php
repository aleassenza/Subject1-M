<?php session_start();
 if(isset($_SESSION['user'])&&isset($_SESSION['lvl'])) {
 	if($_POST['mail']!='' && isset($_POST['mail']) && $_POST['ci']!='' && isset($_POST['ci'])) {
 		header("Content-Type: application/json; charset=UTF-8");
 		$mail = $_POST['mail'];
		$ci = $_POST['ci'];
 		require_once('bd/abrir.php');
 		$arr = array();
		$consulta = "SELECT U.ci_usuario as ci, U.nombre, U.apellido, ifnull(U.telefono, '') as telefono, U.correo, DATE_FORMAT(U.fecha_registro, '%d-%m-%Y') as fecha, D.cov, D.mpps, D.id_especializacion as ide, E.id_especializacion as id, E.descripcion FROM USUARIOS as U JOIN DOCTORES as D on(U.ci_usuario=D.ci_usuario) JOIN ESPECIALIZACIONES as E on (D.id_especializacion = E.id_especializacion) WHERE U.correo = ? AND U.ci_usuario = ?;";
		if ($sentencia = mysqli_prepare($enlace, $consulta)) {
			mysqli_stmt_bind_param($sentencia, "si", $mail, $ci);
			mysqli_stmt_execute($sentencia);
			$resultado = mysqli_stmt_get_result($sentencia);
			while($rs = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
				$arr[] = $rs;
			}
		    mysqli_stmt_close($sentencia);
			echo json_encode($arr);
		}
		require_once('bd/cerrar.php');
 	}
} else {
	header('Location: index.php');
} ?>