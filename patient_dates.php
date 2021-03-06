<?php session_start();
 if(isset($_SESSION['user'])&&isset($_SESSION['lvl'])){?>
<table class="table table-bordered table-hover" id="patient-table">
		<thead>
			<tr>
				<th>ID</th>
				<th>CI</th>
				<th>NOMBRE</th>
				<th>APELLIDO</th>
				<th>TEL&Eacute;FONO</th>
				<th>CORREO</th>
				<th>NOMBRE DOCTOR</th>
				<th>APELLIDO DOCTOR</th>
				<th>TEL&Eacute;FONO DOCTOR</th>
				<th>CORREO DOCTOR</th>
				<th>FECHA DE CITA</th>
				<th>ESTADO</th>
			</tr>
		</thead>
		<tbody>

		<?php require_once('bd/abrir.php');
			// $consulta = "SELECTSELECT ci_usuario as ci, nombre, apellido, correo, DATE_FORMAT(fecha_registro, '%d-%m-%Y') as fecha, CASE estado_usuario WHEN 'A' THEN 'ACTIVO' WHEN 'I' THEN 'INACTIVO' END as estado FROM USUARIOS WHERE nivel < 3 AND estado_usuario != 'E' AND correo!=?;";
			$consulta = "SELECT C.ci_usuario as ci, U.nombre, U.apellido, ifnull(U.telefono, '') as telefono, U.correo, D.ci_usuario as ci_d, D.nombre as nombre_d, D.apellido as apellido_d, ifnull(D.telefono, '') as telefono_d, D.correo as correo_d, DATE_FORMAT(fecha_cita, '%d-%m-%Y') as fecha, CASE estado WHEN 'A' THEN 'AGENDADA' WHEN 'C' THEN 'CONFIRMADA' WHEN 'S' THEN 'SIN CONFIRMAR' WHEN 'F' THEN 'FINALIZADA' END as estado,C.id_cita FROM CITAS as C JOIN USUARIOS as U on(U.ci_usuario = C.ci_usuario) JOIN USUARIOS as D on (D.ci_usuario = C.ci_doctor) WHERE C.ci_usuario = ?;";
			if ($sentencia = mysqli_prepare($enlace, $consulta)) {
				$i=0;
				mysqli_stmt_bind_param($sentencia, "s", $_SESSION['ci']);
				mysqli_stmt_execute($sentencia);
				mysqli_stmt_bind_result($sentencia, $ci, $nombre, $apellido, $telefono, $correo, $ci_d, $nombre_d, $apellido_d, $telefono_d, $correo_d, $fecha, $estado, $id);
				mysqli_stmt_store_result($sentencia);
				$rowCount = mysqli_stmt_num_rows($sentencia);
				if($rowCount>0) {
					$arr = array("AGENDADA","SIN CONFIRMAR","CONFIRMADA", "FINALIZADA");
					while (mysqli_stmt_fetch($sentencia)) {
						$i++;
						echo "<tr data-val='".$id."'>";
						echo	"<td>".$i."</td>";
						echo	"<td>".$nombre_d."</td>";
						echo	"<td>".$apellido_d."</td>";
						echo	"<td>".$telefono_d."</td>";
						echo	"<td>".$correo_d."</td>";
						echo	"<td>".$fecha."</td>";
						echo 	"<td>".$estado."</td>";
						echo "</tr>";

					}
				} else {
					echo '<tr>';
					echo	'<td>NO EXISTEN CITAS</td>';
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