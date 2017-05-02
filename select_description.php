<?php session_start();
 if(isset($_SESSION['user']) && isset($_SESSION['lvl'])) {
 		header("Content-Type: application/json; charset=UTF-8");
 		$arr = array();
 		require_once('bd/abrir.php');
		$consulta = "SELECT id_descripcion as id, contenido, curdate() as fecha FROM DESCRIPCIONES;";
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