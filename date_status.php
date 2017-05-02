<?php session_start();
if(isset($_SESSION["user"]) && isset($_SESSION['lvl']) && isset($_SESSION['fullname'])) {
	if($_POST['status']!=='' && isset($_POST['status']) && $_POST['ci']!=='' && isset($_POST['ci'])) {
		$estado = $_POST['status'];
		$ci = $_POST['ci'];
		require_once('bd/abrir.php');
			$consulta = "UPDATE  CITAS SET estado = ? WHERE ci_usuario = ?";
			if ($sentencia = mysqli_prepare($enlace, $consulta)) {
				mysqli_stmt_bind_param($sentencia, "si", $estado, $ci);
				mysqli_stmt_execute($sentencia);
				//printf("Error: %s.\n", mysqli_stmt_error($sentencia));
			    mysqli_stmt_close($sentencia);
				require_once('bd/cerrar.php');
				echo true;
			}else{
				echo false;
			}
	}else{
		header('Location: index.php');
	}
}else{
	header('Location: index.php');
}