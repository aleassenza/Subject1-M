<?php session_start();
 if(isset($_SESSION['user']) && isset($_SESSION['lvl'])) {
 		header("Content-Type: application/json; charset=UTF-8");
 		require_once('bd/abrir.php');
		$consulta = "SELECT ci_usuario as ci, nombre, apellido, ifnull(telefono, '') as telefono, correo, DATE_FORMAT(fecha_registro, '%d-%m-%Y') as fecha 	FROM USUARIOS WHERE correo = ?;";
		if ($sentencia = mysqli_prepare($enlace, $consulta)) {
			mysqli_stmt_bind_param($sentencia, "s", $mail);
			mysqli_stmt_execute($sentencia);
			$resultado = mysqli_stmt_get_result($sentencia);
			$rs = mysqli_fetch_array($resultado, MYSQLI_NUM);
		    mysqli_stmt_close($sentencia);
			echo json_encode($rs);
		}
		require_once('bd/cerrar.php');
} else {
	header('Location: index.php');
} ?>