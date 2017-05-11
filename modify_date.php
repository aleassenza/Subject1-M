<?php session_start();
 if(isset($_SESSION['user'])&&isset($_SESSION['lvl'])) {
 	if(isset($_POST['id']) && $_POST['id'] != ""){
 		$id = $_POST['id'];
 		require_once('bd/abrir.php');
		$consulta = "UPDATE NOTIFICACIONES as N JOIN CITAS as C on (N.id_cita = C.id_cita) SET N.visto = 1 WHERE C.ci_usuario = ? AND N.id_notificacion = ?";
		if ($sentencia = mysqli_prepare($enlace, $consulta)) {
			mysqli_stmt_bind_param($sentencia, "ii", $_SESSION['ci'], $id);
			mysqli_stmt_execute($sentencia);
		    mysqli_stmt_close($sentencia);
		}
		require_once('bd/cerrar.php');
 	} else {
		echo "error";
 	}
} else {
	header('Location: index.php');
} ?>