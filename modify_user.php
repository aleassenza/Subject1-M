<?php session_start();
 if(isset($_SESSION['user'])&&isset($_SESSION['lvl'])) {
 	if($_POST['nombre_user']!='' && isset($_POST['nombre_user']) && $_POST['apellido_user']!='' && isset($_POST['apellido_user']) && isset($_POST['telefono_user']) && $_POST['ci']!='' && isset($_POST['ci']) && $_POST['correo_user']!='' && isset($_POST['correo_user'])) {
 		header("Content-Type: application/json; charset=UTF-8");
 		$resp = array('action' => '');
 		$nombre = $_POST['nombre_user'];
		$apellido = $_POST['apellido_user'];
		$_POST['telefono_user'] == null || $_POST['telefono_user'] == "" ? $telefono = null : $telefono = $_POST['telefono_user'];
		$ci = $_POST['ci'];
		$correo = $_POST['correo_user'];
 		require_once('bd/abrir.php');
		$consulta = "UPDATE USUARIOS SET  nombre = ?, apellido = ?, telefono = ?, correo = ? WHERE ci_usuario = ?";
		if ($sentencia = mysqli_prepare($enlace, $consulta)) {
			$_SESSION['user']==$correo ? $_SESSION['fullname']=$nombre.' '.$apellido : $_SESSION['fullname'];
			mysqli_stmt_bind_param($sentencia, "ssssi", $nombre, $apellido, $telefono, $correo, $ci);
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