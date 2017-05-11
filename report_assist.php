<?php session_start();
 if(isset($_SESSION['user']) && isset($_SESSION['lvl'])) {
 	if(isset($_POST['since']) && $_POST['since']!= '' && isset($_POST['until']) && $_POST['until']!= '')
 		header("Content-Type: application/json; charset=UTF-8");
 		require_once('bd/abrir.php');
 		$obj = array('cantidad' => '', 'contenido' =>'');
 		$arr = array();
		$consulta = "SELECT COUNT(*) totalAsissts,;";
		if ($sentencia = mysqli_prepare($enlace, $consulta)) {
			mysqli_stmt_execute($sentencia);
			mysqli_stmt_bind_result($sentencia, $now);
			mysqli_stmt_store_result($sentencia);
			$rowCount = mysqli_stmt_num_rows($sentencia);
			if($rowCount>0) {
				while (mysqli_stmt_fetch($sentencia)) {
					echo $now;
				}
			}
		    mysqli_stmt_close($sentencia);
		}
		require_once('bd/cerrar.php');
} else {
	header('Location: index.php');
} ?>