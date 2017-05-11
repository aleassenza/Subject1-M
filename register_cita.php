<?php session_start();
if(isset($_SESSION["user"]) && isset($_SESSION['lvl']) && isset($_SESSION['fullname'])){
	if($_SESSION['lvl'] == 0){
		if(isset($_POST['ci_doctor']) && isset($_POST['date'])){
			if($_POST['ci_doctor']!="" && $_POST['date']!=""){
				header("Content-Type: application/json; charset=UTF-8");
				$resp = array('action' => '');
				$ci = $_SESSION['ci'];
				$ci_moderador = $_POST['ci_doctor'];
				$ci_doctor = $_POST['ci_doctor'];
				$descripcion = $_POST['descripcion'];
				$motivo = $_POST['motivo'];
				$date = $_POST['date'];
				$consulta = "CALL SP_CITAS_NOTIFICACIONES(?, ?, ?, ?, ?, ?)";
				require_once('bd/abrir.php');
				if ($sentencia = mysqli_prepare($enlace, $consulta)) {
					mysqli_stmt_bind_param($sentencia, "iisiss", $ci, $ci_doctor, $date, $ci_moderador, $motivo, $descripcion);
					mysqli_stmt_execute($sentencia);
				    mysqli_stmt_close($sentencia);
				    printf("Error: %s.\n", mysqli_stmt_error($sentencia));
					require_once('bd/cerrar.php');
			        header('Location: inicio.php');
			    } else {
			    	header('Location: inicio.php');
			    }
			}else{
				header("Location:inicio.php");
			}
		}else{
			header("Location:inicio.php");
		}
	} else if($_SESSION['lvl'] == 2) {
		if(isset($_POST['ci']) && isset($_POST['ci_doctor']) && isset($_POST['date'])){
			if($_POST['ci_doctor']!="" && $_POST['ci']!="" && $_POST['date']!=""){
				header("Content-Type: application/json; charset=UTF-8");
				$resp = array('action' => '');
				$ci = $_POST['ci'];
				$ci_moderador = $_SESSION['ci'];
				$ci_doctor = $_POST['ci_doctor'];
				$descripcion = $_POST['descripcion'];
				$motivo = $_POST['motivo'];
				$date = $_POST['date'];
				$consulta = "CALL SP_CITAS_NOTIFICACIONES(?, ?, ?, ?, ?, ?)";
				require_once('bd/abrir.php');
				$exist = "SELECT * FROM USUARIOS U WHERE U.ci_usuario = ?;";
				if ($ifExist = mysqli_prepare($enlace, $exist)) {
					mysqli_stmt_bind_param($ifExist, 's', $ci);
					mysqli_stmt_execute($ifExist);
					mysqli_stmt_store_result($ifExist);
					$rowCount = mysqli_stmt_num_rows($ifExist);
					if($rowCount > 0){
						if ($sentencia = mysqli_prepare($enlace, $consulta)) {
							mysqli_stmt_bind_param($sentencia, "iisiss", $ci, $ci_doctor, $date, $ci_moderador, $motivo, $descripcion);
							mysqli_stmt_execute($sentencia);
						    mysqli_stmt_close($sentencia);
							require_once('bd/cerrar.php');
					        header('Location: inicio.php');
					    } else {
					    	header('Location: inicio.php');
					    }
					} else {
						echo '<script>alert("Error: El usuario no se encuentra registrado")</script>';
					}
				} else {
			    	header('Location: inicio.php');
			    }
			}else{
				header("Location:inicio.php");
			}
		}else{
			header("Location:inicio.php");
		}
	}
}else{
	header("Location:index.php");
}
 ?>

