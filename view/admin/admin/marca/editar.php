<?php
	include("header.php");
	include("../../mireca.class.php");
	$mireca= new Mireca;
	$mireca->conexion();
	if(isset($_GET['id'])){
		$idreloj=$_GET['id'];
		if(is_numeric($idreloj)){
			$sql= "SELECT * from reloj WHERE idreloj=$idreloj";
		    $datos= $mireca->sqlArray($sql);

		}
		else{ die("Se requiere que sea numero");}
	}
	else{ die("Se requiere que este puesto");
	}


?>
	<br><br>
	<form method="POST" action="actualizar.php" enctype="multipart/form-data">
		<label>Nombre del Reloj: </label>
		<input type="text"  required name="nombre" value="<?php echo $datos[0]['nombre'] ?>"><br>

			<label for="">Seleccione la marca: </label>
			<select name="marca">
				<?php
				include("../mireca.class.php");
				$mireca = new Mireca;
				$campo="marca";
				$id="idmarca";
				$sql="select $id,$campo from marca";
				$mireca->genOpciones($sql,$campo,$id);
				 ?>
			</select><br>

			<label for="">Seleccione el estilo: </label>
			<select name="estilo">
				<?php
				$campo="estilo";
				$id="idestilo";
				$sql="select $id,$campo from estilo";
				$mireca->genOpciones($sql,$campo,$id);
				 ?>
			</select><br>

			<label for="">Seleccione el genero del reloj: </label>
			<select name="genero">
				<?php
				$campo="genero";
				$id="idgenero";
				$sql="select $id,$campo from genero";
				$mireca->genOpciones($sql,$campo,$id);
				 ?>
			</select><br>


			<label for="">Seleccione el material: </label>
			<select name="material">
				<?php
				$campo="material";
				$id="idmaterial";
				$sql="select $id,$campo from material";
				$mireca->genOpciones($sql,$campo,$id);
				 ?>
			</select><br>


			<label for="">Seleccione el mecanismo:</label>
			<select name="mecanismo">
				<?php
				$campo="mecanismo";
				$id="idmecanismo";
				$sql="select $id,$campo from mecanismo";
				$mireca->genOpciones($sql,$campo,$id);
				 ?>
			</select><br>

			<label for="">Descripción del reloj: </label><br>
			<textarea name="descripcion" rows="3" cols="80"><?php echo $datos[0]['descripcion']?></textarea><br><br>
			<label for="">Precio</label>
			<input type="text" name="precio" value="<?php echo $datos[0]['precio']?>"><br><br>
			<label for="">Seleccionar imagen: </label>
			<input type="file" name="imagen"><br><br>
			<br />
			<input type="hidden" name="id" value="<?php echo $idreloj ?>">
			<input type="hidden" name="first_imagen" value="<?php echo $datos[0]['imagen'] ?>">
			<input type="submit" name="Enviar" value="Enviar">

		</form>


	<?php include("footer.php"); ?>
