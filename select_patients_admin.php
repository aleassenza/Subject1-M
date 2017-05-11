<?php session_start();
 if(isset($_SESSION['user']) && isset($_SESSION['lvl'])) {
?>
<table class="table table-bordered table-hover table-responsive" id="patient-table">
		<thead>
			<tr>
				<th>ID</th>
				<th>CI</th>
				<th>NOMBRE</th>
				<th>APELLIDO</th>
				<th>TEL&Eacute;FONO</th>
				<th>CORREO</th>
				<th>ESTADO</th>
			</tr>
		</thead>
		<tbody>
<?php
 		require_once('bd/abrir.php');
 		$i=0;
		$consulta = "SELECT ci_usuario as ci, nombre, apellido, correo, telefono, CASE estado_usuario WHEN 'A' THEN 'ACTIVO' WHEN 'I' THEN 'INACTIVO' END as estado FROM USUARIOS WHERE estado_usuario != 'E' AND nivel = 3;";
		if ($sentencia = mysqli_prepare($enlace, $consulta)) {
			mysqli_stmt_execute($sentencia);
			mysqli_stmt_bind_result($sentencia, $ci, $nombre, $apellido, $correo, $telefono, $estado);
			mysqli_stmt_store_result($sentencia);
			$rowCount = mysqli_stmt_num_rows($sentencia);
			if($rowCount>0) {
				while (mysqli_stmt_fetch($sentencia)) {
					$estado=='ACTIVO' ? $action='success' : $action='danger';
						$i++;
						echo "<tr>";
						echo	"<td>".$i."</td>";
						echo	"<td>".$ci."</td>";
						echo	"<td>".$nombre."</td>";
						echo	"<td>".$apellido."</td>";
						echo	"<td>".$telefono."</td>";
						echo	"<td>".$correo."</td>";
						echo	"<td><buttpn type='button' class='btn btn-".$action."' id='status'>".$estado."</button></td>";
						echo "</tr>";
					}
				} else {
					echo '<tr>';
					echo	'<td>NO EXISTEN USUARIOS</td>';
					echo '</tr>';
				}
		    mysqli_stmt_close($sentencia);
		} else {
			printf("Error: %s.\n", mysqli_stmt_error($sentencia));
		}
		require_once('bd/cerrar.php');
} else {
	header('Location: index.php');
} ?>