<?php session_start();
 if(isset($_SESSION['user']) && isset($_SESSION['lvl'])) {
 		header("Content-Type: application/json; charset=UTF-8");
 		require_once('bd/abrir.php');
 		$arr = array();
		$consulta = "SELECT D.ci_usuario as ci, concat(D.nombre,' ', D.apellido) as fullname, D.correo, D.telefono FROM MODERADORES as M JOIN USUARIOS as D on(M.ci_doctor = D.ci_usuario) WHERE M.ci_moderador = ? AND D.nivel = 1 AND D.estado_usuario = 'A';";
		if ($sentencia = mysqli_prepare($enlace, $consulta)) {
			mysqli_stmt_bind_param($sentencia, "i",$_SESSION['ci']);
			mysqli_stmt_execute($sentencia);
			$resultado = mysqli_stmt_get_result($sentencia);
			while($rs = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
				$arr[] = $rs;
			}
		    mysqli_stmt_close($sentencia);
			echo json_encode($arr);
		}
		require_once('bd/cerrar.php');
} else {
	header('Location: index.php');
} ?>