<?php session_start();
 if(isset($_SESSION['user']) && isset($_SESSION['lvl'])) {
 	if(isset($_POST['since']) && $_POST['since']!= '' && isset($_POST['until']) && $_POST['until']!= '')
 		header("Content-Type: application/json; charset=UTF-8");
 		require_once('bd/abrir.php');
 		$obj = array('categories' => '', 'series' =>'');
 		$arr1 = array('name' => '', 'data' =>'');
 		$arr2 = array('name' => '', 'data' =>'');
 		$arr3 = array('name' => '', 'data' =>'');
 		$arr4 = array('name' => '', 'data' =>'');
 		$arrData1 = array();
 		$arrData2 = array();
 		$arrData3 = array();
 		$arrData4 = array();
		$consultaA = "SELECT COUNT(*) totalAsissts, fecha_cita FROM CITAS WHERE estado = 'A' AND date_format(fecha_cita, '%Y-%m-%d')>= ? AND date_format(fecha_cita, '%Y-%m-%d')<= ?;";
		$consultaC = "SELECT COUNT(*) totalAsissts, fecha_cita FROM CITAS WHERE estado = 'C' AND date_format(fecha_cita, '%Y-%m-%d')>= ? AND date_format(fecha_cita, '%Y-%m-%d')<= ?;";
		$consultaS = "SELECT COUNT(*) totalAsissts, fecha_cita FROM CITAS WHERE estado = 'S' AND date_format(fecha_cita, '%Y-%m-%d')>= ? AND date_format(fecha_cita, '%Y-%m-%d')<= ?;";
		$consultaF = "SELECT COUNT(*) totalAsissts, fecha_cita FROM CITAS WHERE estado = 'F' AND date_format(fecha_cita, '%Y-%m-%d')>= ? AND date_format(fecha_cita, '%Y-%m-%d')<= ?;";
		if ($sentenciaA = mysqli_prepare($enlace, $consultaA) && $sentenciaC = mysqli_prepare($enlace, $consultaC) && $sentenciaS = mysqli_prepare($enlace, $consultaS) && $sentenciaF = mysqli_prepare($enlace, $consultaF)) {
			mysqli_stmt_bind_param($sentenciaA, "ss", $_POST['since'], $_POST['until']);
			mysqli_stmt_bind_param($sentenciaC, "ss", $_POST['since'], $_POST['until']);
			mysqli_stmt_bind_param($sentenciaS, "ss", $_POST['since'], $_POST['until']);
			mysqli_stmt_bind_param($sentenciaF, "ss", $_POST['since'], $_POST['until']);
			mysqli_stmt_execute($sentenciaA);
			mysqli_stmt_execute($sentenciaC);
			mysqli_stmt_execute($sentenciaS);
			mysqli_stmt_execute($sentenciaF);
			mysqli_stmt_bind_result($sentenciaA, $totalAsissts, $fecha_cita);
			mysqli_stmt_bind_result($sentenciaC, $totalAsissts, $fecha_cita);
			mysqli_stmt_bind_result($sentenciaS, $totalAsissts, $fecha_cita);
			mysqli_stmt_bind_result($sentenciaF, $totalAsissts, $fecha_cita);
			mysqli_stmt_store_result($sentenciaA);
			mysqli_stmt_store_result($sentenciaC);
			mysqli_stmt_store_result($sentenciaS);
			mysqli_stmt_store_result($sentenciaF);
			$arr1['name']="AGENDADA";
			$arr2['name']="SIN CONFIRMAR";
			$arr3['name']="CONFIRMADA";
			$arr4['name']="FINALIZADA";
			while (mysqli_stmt_fetch($sentenciaA)) {
				$obj['categories']=$fecha_cita;
				$arrData1[]=$totalAsissts;
			}
			while (mysqli_stmt_fetch($sentenciaC)) {
				$obj['categories']=$fecha_cita;
				$arrData2[]=$totalAsissts;
			}
			while (mysqli_stmt_fetch($sentenciaS)) {
				$obj['categories']=$fecha_cita;
				$arrData3[]=$totalAsissts;
			}
			while (mysqli_stmt_fetch($sentenciaF)) {
				$obj['categories']=$fecha_cita;
				$arrData4[]=$totalAsissts;
			}
			$arr1['data']=json_encode($arrData1);
			$arr2['data']=json_encode($arrData2);
			$arr3['data']=json_encode($arrData3);
			$arr4['data']=json_encode($arrData4);
			$obj['series'] = $arr1.','.$arr2.','.$arr3.','.$arr4;
			echo json_encode($obj);
		    mysqli_stmt_close($sentenciaA);
		    mysqli_stmt_close($sentenciaC);
		    mysqli_stmt_close($sentenciaS);
		    mysqli_stmt_close($sentenciaF);
		}
		require_once('bd/cerrar.php');
} else {
	header('Location: index.php');
} ?>