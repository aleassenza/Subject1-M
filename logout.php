<?php session_start();
if(isset($_SESSION['user']) && isset($_SESSION['lvl'])){
	session_destroy();
	header("Location: index.php");
}
 ?>