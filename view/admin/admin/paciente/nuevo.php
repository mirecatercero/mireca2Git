<?php
	include('../../mireca.class.php');
	$mireca=new Mireca;
	$nombre=$_POST['nombre'];
	$marca=$_POST['marca'];
	$estilo=$_POST['estilo'];
	$genero=$_POST['genero'];
	$material=$_POST['material'];
	$mecanismo=$_POST['mecanismo'];
	$descripcion=$_POST['descripcion'];
	$precio=$_POST['precio'];
    $name=$_FILES['imagen']['name'];
    $tmp_name=$_FILES['imagen']['tmp_name'];
    $type=$_FILES['imagen']['type'];
    $size=$_FILES['imagen']['size'];
		echo $genero;
    if(move_uploaded_file($tmp_name, "C:/xampp/htdocs/mirecaStore/img".$name)){
    	$mireca -> conexion();
	    $sql="INSERT INTO reloj(nombre,idmarca,idmecanismo,idgenero,idestilo,idmaterial,precio,imagen,descripcion) values('$nombre',$marca,$mecanismo,$genero,$estilo,$material,$precio,'$name','$descripcion')";
			echo $sql;
	    $filas= $mireca->db->exec($sql);

	    if($filas==1){
	    	header("Location: ../index.html"); //redirigir el flujo a este archivo
	    }
	    else{
	    	die("No se pudo insertar el registro");
	    }
    }

?>
