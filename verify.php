<?php
session_start();
require_once("bd/abrir.php");
if(isset($_POST['username']) && isset($_POST['password'])) {
	if($_POST['username']!="" && $_POST['password']!="")
	{
		$user=$_POST['username'];
		$pass=md5($_POST['password']);

		$consulta = "SELECT ci_usuario as ci, correo, nivel, concat(nombre,' ', apellido) as fullname, estado_usuario as estado FROM USUARIOS WHERE correo = ? AND contrasenna =  md5(?);";

		if ($sentencia = mysqli_prepare($enlace, $consulta)) {
			mysqli_stmt_bind_param($sentencia, "ss", $user , $_POST['password']);
			mysqli_stmt_execute($sentencia);
			mysqli_stmt_store_result($sentencia);
			$result = mysqli_stmt_bind_result($sentencia, $ci, $correo, $nivel, $fullname, $estado);
			$rowCount = mysqli_stmt_num_rows($sentencia);
			echo $rowCount;
			if($rowCount>0) {
				while (mysqli_stmt_fetch($sentencia)) {
				if($estado == 'A'){
						echo $estado;
						$_SESSION['ci']=$ci;
				        $_SESSION["user"]=$correo;
				        $_SESSION['lvl']=$nivel;
				        $_SESSION['fullname']=$fullname;
					header('Location: inicio.php');
					}else{
						header('Location: index.php?error=418');
					}
			    }
			} else {
	    		header('Location: index.php?error=403');
			}
		    mysqli_stmt_close($sentencia);
		}
	} else {
	    header('Location: index.php?error=noData');
	}
}
require_once("bd/cerrar.php");
 ?>

