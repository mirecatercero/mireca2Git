<form method="POST" action="nuevo.php" enctype="multipart/form-data">
	<label>Nombre del Hotel: </label>
	<input type="text"  required name="nombre">
	<br />
	<label>Imagen</label>
	<input type="file" name="imagen">
	<br />
	<label>Domicilio</label>
	<input type="text" name="domicilio">
	<br />
	<label>Descripcion: </label>
	<textarea name="descripcion" cols="30" rows="10"></textarea>
	<br />
	<input type="submit" name="enviar" value="Enviar">
</form>