<?php session_start();
if(isset($_SESSION["user"]) && isset($_SESSION['lvl']) && isset($_SESSION['fullname'])){
	if(isset($_POST['mail']) && isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['ci']) && isset($_POST['especializacion']) && isset($_POST['cov']) && isset($_POST['mpps']) && $_POST['mail']!="" && $_POST['name']!="" && $_POST['lastname']!="" && $_POST['ci']!="" && $_POST['especializacion']!="" && $_POST['cov']!="" && $_POST['mpps']!=""){
			$resp = array('action' => '');
			echo "in";
			if(!isset($_POST['password']) && !isset($_POST['confirm']) && isset($_POST['update']))
			{
				$pass="";
				$repass="";
				echo "in";
			} else if($_POST['password'] !=''&& $_POST['confirm'] !=''){
				$pass=$_POST['password'];
				$repass=$_POST['confirm'];
				if($pass!==$repass) {
					header('Location: inicio.php');
				}
			} else if($_POST['password'] ==''&& $_POST['confirm'] =='') {
				$resp->action = "noPass";
				echo json_encode($resp);
				exit();
			}
			header("Content-Type: application/json; charset=UTF-8");
			$correo=$_POST['mail'];
			$pass=$_POST['password'];
			$repass=$_POST['confirm'];
			$nombre=$_POST['name'];
			$apellido=$_POST['lastname'];
			$telefono=$_POST['phone'];
			$ci=$_POST['ci'];
			$especializacion=$_POST['especializacion'];
			$cov=$_POST['cov'];
			$mpps=$_POST['mpps'];
			require_once('bd/abrir.php');
			$consulta = "CALL SP_DOCTORES_USUARIOS(?, ?, ?, ?, ?, ?, ?, ?, ?)";
			if ($sentencia = mysqli_prepare($enlace, $consulta)) {
				mysqli_stmt_bind_param($sentencia, "isssssiss", $ci, $nombre, $apellido, $correo, $telefono, md5($pass),$especializacion, $cov, $mpps);
				mysqli_stmt_execute($sentencia);
			    mysqli_stmt_close($sentencia);
				require_once('bd/cerrar.php');
		        header('Location: inicio.php');
		}else{
			header("Location:inicio.php");
		}
	}else{
		header("Location:inicio.php");
	}
}else{
	header("Location:index.php");
}
 ?>

