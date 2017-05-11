<?php session_start();
 if(isset($_SESSION['user']) && isset($_SESSION['lvl'])) {
?>
 	<table class="table table-bordered table-hover table-responsive" id="docs-table">
		<thead>
			<tr>
				<th>ID</th>
				<th>CI</th>
				<th>NOMBRE</th>
				<th>APELLIDO</th>
				<th>TEL&Eacute;FONO</th>
				<th>CORREO</th>
				<th>ESPECIALIZACI&Oacute;N</th>
				<th>ESTADO</th>
			</tr>
		</thead>
		<tbody>
<?php
 		require_once('bd/abrir.php');
 		$i = 0;
		$consulta = "SELECT D.ci_usuario as ci, D.nombre, D.apellido, D.correo, D.telefono, CASE D.estado_usuario WHEN 'A' THEN 'ACTIVO' WHEN 'I' THEN 'INACTIVO' END as estado, E.descripcion FROM MODERADORES as M JOIN USUARIOS as D on(M.ci_doctor = D.ci_usuario) JOIN DOCTORES as DOC on (DOC.ci_usuario = D.ci_usuario) JOIN ESPECIALIZACIONES as E on (DOC.id_especializacion = E.id_especializacion) WHERE M.ci_moderador = ? AND D.nivel = 2 AND D.estado_usuario != 'E';";
		if ($sentencia = mysqli_prepare($enlace, $consulta)) {
			mysqli_stmt_bind_param($sentencia, "i",$_SESSION['ci']);
			mysqli_stmt_execute($sentencia);
			mysqli_stmt_bind_result($sentencia, $ci, $nombre, $apellido, $correo, $telefono, $estado, $descripcion);
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
						echo	"<td>".$descripcion."</td>";
						echo	"<td><buttpn type='button' class='btn btn-".$action."' id='status'>".$estado."</button></td>";
						echo "</tr>";
					}
				} else {
					echo '<tr>';
					echo	'<td>NO EXISTEN USUARIOS</td>';
					echo '</tr>';
				}
		    mysqli_stmt_close($sentencia);
		}
		require_once('bd/cerrar.php');
} else {
	header('Location: index.php');
} ?>