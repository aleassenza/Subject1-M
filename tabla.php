<?php session_start();
 if(isset($_SESSION['user'])&&isset($_SESSION['lvl'])){?>
<table class="table table-bordered table-hover table-responsive" id="users-table">
		<thead>
			<tr>
				<th>ID</th>
				<th>CI</th>
				<th>NOMBRE</th>
				<th>APELLIDO</th>
				<th>TEL&Eacute;FONO</th>
				<th>CORREO</th>
				<th>FECHA DE REGISTRO</th>
				<th>NIVEL</th>
				<th>ESTADO</th>
			</tr>
		</thead>
		<tbody>

		<?php require_once('bd/abrir.php');
			// $consulta = "SELECTSELECT ci_usuario as ci, nombre, apellido, correo, DATE_FORMAT(fecha_registro, '%d-%m-%Y') as fecha, CASE estado_usuario WHEN 'A' THEN 'ACTIVO' WHEN 'I' THEN 'INACTIVO' END as estado FROM USUARIOS WHERE nivel < 3 AND estado_usuario != 'E' AND correo!=?;";
			$consulta = "SELECT ci_usuario as ci, nombre, apellido, ifnull(telefono, '') as telefono, correo, DATE_FORMAT(fecha_registro, '%d-%m-%Y') as fecha, CASE estado_usuario WHEN 'A' THEN 'ACTIVO' WHEN 'I' THEN 'INACTIVO' END as estado,CASE nivel WHEN '0' THEN 'PACIENTE' WHEN '1' THEN 'DOCTOR' WHEN '2' THEN 'SECRETARIA' END as nivel FROM USUARIOS WHERE nivel < 3 AND estado_usuario != 'E';";
			if ($sentencia = mysqli_prepare($enlace, $consulta)) {
				$i=0;
				// mysqli_stmt_bind_param($sentencia, "s", $_SESSION['user']);
				mysqli_stmt_execute($sentencia);
				mysqli_stmt_bind_result($sentencia, $ci, $nombre, $apellido, $telefono, $correo, $fecha, $estado, $nivel);
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
						echo	"<td>".$fecha."</td>";
						echo	"<td>".$nivel."</td>";
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
		?>
		</tbody>
	</table>
	<?php } else {
		header('Location: index.php');
	} ?>