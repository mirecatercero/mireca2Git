<?php
  // Se prendio esta mrd :v
  session_start();

  // Validamos que exista una session y ademas que el cargo que exista sea igual a 1 (Administrador)
  if(!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 1){
    /*
      Para redireccionar en php se utiliza header,
      pero al ser datos enviados por cabereza debe ejecutarse
      antes de mostrar cualquier informacion en el DOM es por eso que inserto este
      codigo antes de la estructura del html, espero haber sido claro
    */
    header('location: ../../../index.php');
  }

?>

 

 
 <?php
  include("header.php");
?>
<section  class="principal">
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Buscar con nombre del paciente..." name="caja_busqueda" id="caja_busqueda">
    </div>
    <div id="datos">

    </div>
</section>
<?php
  include("footer.php");
 ?>
