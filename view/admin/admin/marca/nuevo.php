<?php
	include('../../mireca.class.php');
	$mireca=new Mireca;
	$nombre=$_POST['nombre'];
    $name=$_FILES['imagen']['name'];
    $tmp_name=$_FILES['imagen']['tmp_name'];
    $type=$_FILES['imagen']['type'];
    $size=$_FILES['imagen']['size'];

    if(move_uploaded_file($tmp_name, "C:/xampp/htdocs/mirecaStore/img".$name)){
    	$mireca -> conexion();
	    $sql="INSERT INTO marca(marca,imagen) values('$nombre','$name')";
	    $filas= $mireca->db->exec($sql);
			ECHO $sql;
	    if($filas==1){
	    	header("Location: ../ver_reloj.php"); //redirigir el flujo a este archivo
	    }
	    else{
	    	die("No se pudo insertar el registro");
	    }
    }

?>
