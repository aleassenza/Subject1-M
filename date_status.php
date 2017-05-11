<?php session_start();
if(isset($_SESSION["user"]) && isset($_SESSION['lvl']) && isset($_SESSION['fullname'])) {
	if($_POST['status']!=='' && isset($_POST['status']) && $_POST['ci']!=='' && isset($_POST['ci']) && $_POST['id']!=='' && isset($_POST['id'])) {
		$estado = $_POST['status'];
		$ci = $_POST['ci'];
		require_once('bd/abrir.php');
			$consulta = "UPDATE CITAS SET estado = ? WHERE ci_usuario = ? AND id_cita = ?";
			$consulta2 = "INSERT INTO NOTIFICACIONES (id_cita, id_descripcion) VALUES (?, 2);";
			if ($sentencia = mysqli_prepare($enlace, $consulta) && $sentencia2 = mysqli_prepare($enlace, $consulta2)) {
				mysqli_stmt_bind_param($sentencia, "sii", $estado, $ci, $id);
				mysqli_stmt_bind_param($sentencia2, "i", $id);
				mysqli_stmt_execute($sentencia);
				mysqli_stmt_execute($sentencia2);
				//printf("Error: %s.\n", mysqli_stmt_error($sentencia));
			    mysqli_stmt_close($sentencia);
			    mysqli_stmt_close($sentencia2);
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