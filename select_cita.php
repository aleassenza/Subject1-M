<?php session_start();
 if(isset($_SESSION['user']) && isset($_SESSION['lvl'])) {
 		header("Content-Type: application/json; charset=UTF-8");
 		$arr = array();
 		require_once('bd/abrir.php');
		$consulta = "SELECT COUNT(*), C.fecha_cita as start, concat(U.nombre, ' ', U.apellido) as title, curdate() fecha FROM CITAS C JOIN USUARIOS U ON(U.ci_usuario=C.ci_usuario) GROUP BY fecha_cita;";
		if ($sentencia = mysqli_prepare($enlace, $consulta)) {
			mysqli_stmt_execute($sentencia);
			$resultado = mysqli_stmt_get_result($sentencia);
			while($rs = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
				$arr[] = $rs;
			}
		    mysqli_stmt_close($sentencia);
			echo json_encode($arr);
		}
		require_once('bd/cerrar.php');
} else {
	header('Location: index.php');
} ?>