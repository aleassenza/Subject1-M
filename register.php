<?php
require_once('bd/abrir.php');
	if(isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['confirm'])){
		if($_POST['mail']!="" && $_POST['password']!="" && $_POST['confirm']!=""){
			$correo=$_POST['mail'];
			$pass=$_POST['password'];
			$repass=$_POST['confirm'];
			$nombre=$_POST['name'];
			$apellido=$_POST['lastname'];
			$_POST['phone']==null||$_POST['phone']=="" ? $telefono=null : $telefono=$_POST['phone'];
			$ci=$_POST['ci'];
			$nivel=3;
			if(isset($_POST['mod']))
			{
				$nivel=1;
			}
			if($pass===$repass) {
				$consulta = "INSERT INTO USUARIOS (ci_usuario, nombre, apellido, correo, telefono, contrasenna, nivel) values (?,?,?,?,?,?,?);";
				if ($sentencia = mysqli_prepare($enlace, $consulta)) {
					mysqli_stmt_bind_param($sentencia, "isssiss", $ci, $nombre, $apellido, $correo, $telefono, md5($pass),$nivel);
					mysqli_stmt_execute($sentencia);
				    mysqli_stmt_close($sentencia);
			        header('Location: inicio.php');
				}
			} else {
				header('Location: index.php?error=pass');
			}
		}else{
			header("Location:index.php?error=noData");
		}
	}else{
		header("Location:index.php");
	}
require_once('bd/cerrar.php');
 ?>