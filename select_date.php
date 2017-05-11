<?php session_start();
 if(isset($_SESSION['user']) && isset($_SESSION['lvl'])) {
 		require_once('bd/abrir.php');
		$consulta = "SELECT date_format(now(),'%Y-%m-%d') as now;";
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