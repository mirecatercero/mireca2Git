<?php
	include("../../consultorio.class.php");
	$mireca= new Consultorio;
	$mireca -> conexion();
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		if(is_numeric($id)){

			$arreglo = array();
			$idapp = "SELECT idapp from paciente where idpaciente = $id";
			$arreglo_app = $mireca->sqlArray($idapp);

			$idapnp = "SELECT idapnp from paciente where idpaciente = $id";
			$arreglo_apnp = $mireca->sqlArray($idapnp);

			$idahf = "SELECT idahf from paciente where idpaciente = $id";
			$arreglo_ahf = $mireca->sqlArray($idahf);

			$idpa = "SELECT idpa from paciente where idpaciente = $id";
			$arreglo_pa =$mireca->sqlArray($idpa);

			$idsuperior = "SELECT idsuperior from paciente where idpaciente = $id";
			$arreglo_sup =$mireca->sqlArray($idsuperior);

			$idinferior = "SELECT idinferior from paciente where idpaciente = $id";
			$arreglo_inf =$mireca->sqlArray($idinferior);

			$idcolumna = "SELECT idcolumna from paciente where idpaciente = $id";
			$arreglo_col =$mireca->sqlArray($idcolumna);

			$idmarcha = "SELECT idmarcha from paciente where idpaciente = $id";
			$arreglo_ma =$mireca->sqlArray($idmarcha);

		   $mireca->deleteFT($arreglo_app,"app","idapp");
			 $mireca->deleteFT($arreglo_apnp,"apnp","idapnp");
			 $mireca->deleteFT($arreglo_ahf,"ahf","idahf");
			 $mireca->deleteFT($arreglo_pa,"pa","idpa");
			 $mireca->deleteFT($arreglo_sup,"superior","idsuperior");
			 $mireca->deleteFT($arreglo_inf,"inferior","idinferior");
			 $mireca->deleteFT($arreglo_col,"columna","idcolumna");
			 $mireca->deleteFT($arreglo_ma,"marcha","idmarcha");
			 $sql= "DELETE from paciente where idpaciente=$id";
			 $filas = $mireca->db->exec($sql);
		    if($filas==0){
		    	header("Location: ../ver_pacientes.php"); //redirigir el flujo a este archivo
		    }else{
		    	die("No se pudo eliminar el registro");
		    }
		}
		else{ die("Se requiere que sea numero");}
	}
	else{
		die("Se requiere que este puesto");
	}

?>
