<?php
	include("../../mireca.class.php");
	$mireca= new Mireca;
	$mireca -> conexion();
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		if(is_numeric($id)){
			$sql= "DELETE from reloj Where idreloj=".$id;
		   $filas= $mireca->db->exec($sql);
		    if($filas==1){
		    	header("Location: ../ver_reloj.php"); //redirigir el flujo a este archivo
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
