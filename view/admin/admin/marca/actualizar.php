<?php
 	include('../../mireca.class.php');
	$web=new Mireca;
	$nombre=$_POST['nombre'];
	$marca=$_POST['marca'];
	$estilo=$_POST['estilo'];
  $genero=$_POST['genero'];
  $material=$_POST['material'];
  $mecanismo=$_POST['mecanismo'];
  $descripcion=$_POST['descripcion'];
  $precio = $_POST['precio'];
	$id=$_POST['id'];
  $first=$_POST['first_imagen'];
    if (isset($_FILES['imagen'])) {
      $name=$_FILES['imagen']['name'];
      $tmp_name=$_FILES['imagen']['tmp_name'];
      $type=$_FILES['imagen']['type'];
      $size=$_FILES['imagen']['size'];
    }else {
      $first=$_POST['first_imagen'];
    }

    if(move_uploaded_file($tmp_name, "C:/xampp/htdocs/mirecaStore/img/".$name)){
	    $web -> conexion();
	    $sql="UPDATE reloj set nombre='$nombre', idmarca='$marca',idmecanismo='$mecanismo', idgenero='$genero',idestilo='$estilo',idmaterial='$material',precio='$precio',imagen='$name',descripcion='$descripcion' WHERE idreloj='$id'";
      echo $sql;
      $filas= $web->db->exec($sql);
	    if($filas==1){
	    	header("Location: ../ver_reloj.php"); //redirigir el flujo a este archivo
	    }
	    else{
	    	die("No se pudo actualizar el registro");
	    }
	}else
    {	    $web -> conexion();
    	    $sql="UPDATE reloj set nombre='$nombre', idmarca='$marca',idmecanismo='$mecanismo', idgenero='$genero',idestilo='$estilo',idmaterial='$material',precio='$precio',imagen='$first',descripcion='$descripcion' WHERE idreloj='$id'";
          echo $sql;
          $filas= $web->db->exec($sql);
          header("Location: ../ver_reloj.php");
       }
?>
