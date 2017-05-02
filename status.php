<?php session_start();
if(isset($_SESSION["user"]) && isset($_SESSION['lvl']) && isset($_SESSION['fullname'])) {
	if($_POST['status']!=='' && isset($_POST['status']) && $_POST['ci']!=='' && isset($_POST['ci']) && $_POST['correo']!=='' && isset($_POST['correo'])) {
		$estado = $_POST['status'];
		$ci = $_POST['ci'];
		$correo = $_POST['correo'];
		require_once('bd/abrir.php');
			$consulta = "UPDATE  USUARIOS SET estado_usuario = ? WHERE ci_usuario = ? AND correo = ?";
			if ($sentencia = mysqli_prepare($enlace, $consulta)) {
				mysqli_stmt_bind_param($sentencia, "sis", $estado, $ci, $correo);
				mysqli_stmt_execute($sentencia);
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