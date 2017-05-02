<?php session_start();
 if(isset($_SESSION['user'])&&isset($_SESSION['lvl'])) {
 	if($_POST['ci']!='' && isset($_POST['ci']) && $_POST['correo']!='' && isset($_POST['correo'])) {
 		header("Content-Type: application/json; charset=UTF-8");
 		$resp = array('action' => '');
		$ci = $_POST['ci'];
		$correo = $_POST['correo'];
 		require_once('bd/abrir.php');
		$consulta = "UPDATE USUARIOS SET  estado_usuario = 'E' WHERE ci_usuario = ? AND correo = ?";
		if ($sentencia = mysqli_prepare($enlace, $consulta)) {
			mysqli_stmt_bind_param($sentencia, "is", $ci, $correo);
			mysqli_stmt_execute($sentencia);
		    mysqli_stmt_close($sentencia);
		    $resp['action'] = 'success';
	    	echo(json_encode($resp));
		    exit();
		} else {
			$resp['action'] = mysqli_error($sentencia);
	    	echo json_encode($resp);
		}
		require_once('bd/cerrar.php');
 	}
} else {
	header('Location: index.php');
	exit();
} ?>