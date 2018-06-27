<?php
class Consultorio {
  var $db = NULL;
  function conexion(){
    $usuario="root";
    $contraseña="mirecatres3";
    $dbname="consultorio";
    $sgbd="mysql";
    $host="localhost";
    $this->db= new PDO($sgbd.':host='.$host.';dbname='.$dbname,$usuario,$contraseña);
  }
  function sqlArray($sql){
    if(!Empty($sql)){
    $this->conexion();
    $datos=array();
    foreach($this-> db->query($sql)->fetchAll(PDO::FETCH_ASSOC) as $fila) {
           array_push($datos, $fila);
       }
       return $datos;
    }
    else{
      die('Es necesario definir una consulta');
    }
  }
  function deleteFT($arreglo,$nom_tabla,$id_tabla){
    $dato = $arreglo[0][$id_tabla];
    $consulta = "DELETE from $nom_tabla where $id_tabla = '$dato'";
    $fila= $this->db->exec($consulta);

  }
  function genOpciones($consulta,$campo,$id){
    $arreglo=$this->sqlArray($consulta);
    foreach ($arreglo as $fila) {
      $nombre=$fila[$campo];
      $idnombre=$fila[$id];
      echo "<option value='$idnombre'>$nombre</option>";

    }
  }

  function recOpciones($consulta,$campo,$id,$seleccion){
    $arreglo=$this->sqlArray($consulta);
    foreach ($arreglo as $fila) {
      $nombre=$fila[$campo];
      $idnombre=$fila[$id];
        if ($nombre == $seleccion) {
          echo "<option value='$idnombre' selected = 'selected'>$nombre</option>";
        }else {
          echo "<option value='$idnombre'>$nombre</option>";
        }

    }
  }

  function recOpcionExtr($campo){
    if ($campo == 'Izquierdo') {
      echo "<option value='$campo' selected = 'selected'>$campo</option>";
      echo "<option value='Derecho'>Derecho</option>";  }

    if ($campo == 'Derecho') {
      echo "<option value='$campo' selected = 'selected'>$campo</option>";
      echo "<option value='Izquierdo'>Izquierdo</option>";}

    if ($campo == 'Normal') {
      echo "<option value='$campo' selected = 'selected'>$campo</option>";
      echo "<option value='Limitada'>Limitada</option>";}

      if ($campo == 'Limitada') {
        echo "<option value='$campo' selected = 'selected'>$campo</option>";
        echo "<option value='Normal'>Normal</option>";}
    }



  function asigRadio($opcion,$padecimiento){
    if ($opcion == 'SI') {
   echo '<td><input type="radio" name="'.$padecimiento.'" value="SI" checked="checked"></td>';
     echo '<td><input type="radio" name="'.$padecimiento.'" value="NO"></td>';
   }if($opcion == 'NO') {
     echo '<td><input type="radio" name="'.$padecimiento.'" value="SI"></td>';
     echo '<td><input type="radio" name="'.$padecimiento.'" value="NO" checked="checked"></td>';
   }
   if($opcion !== 'SI' && $opcion !== 'NO') {
     echo '<td><input type="radio" name="'.$padecimiento.'" value="SI"></td>';
     echo '<td><input type="radio" name="'.$padecimiento.'" value="NO"></td>';
   }

  }

  function tablaDatos($arreglo){
  $table="<table class='table table-hover table-dark' align='left' id='tablaPacientes'>";
    $table=$table."<tr>";
    $id="";
    $Datos=$arreglo[0];
    foreach ($Datos as $key => $value) {
      $table=$table."<th style='color:white;'>".$key."</th>";
    }
    $table=$table."<th style='color:red;'>Subsecuente</th>";
    $table=$table."<th style='color:red;'>PDF</th>";
    $table=$table."<th style='color:red;'>RMN</th>";
    $table=$table."<th style='color:red;'>TAC</th>";
    $table=$table."<th style='color:red;'>RayosX</th>";
    $table=$table."<th style='color:red;'>Editar/Ver</th>";
     $table=$table."<th style='color:red;'>Eliminar</th>";
     $table=$table."</tr>";

  foreach ($arreglo as $indice => $arregloD) {
    $table=$table."<tr>";
    foreach ($arregloD as $key => $value) {
        if($key=="idpaciente"){
          $id="idpaciente";
        }
        //if ($key=="imagen") {
          //$table=$table."<td><img src='../img/".$arregloD['imagen']."' alt='imagen' width='82' height='82'>"."</td>";
        //}else {
          $table=$table."<td>".$value."</td>";
        //}
      }
      //print_r($arregloD);

      $direccion="../img/delete.PNG";
      $table=$table.'<td><button class="btn btn-primary" onclick="vistaSub('.$arregloD[$id].')">
      				Ver
      				<span class="glyphicon glyphicon-plus"></span>
      			</button>
            <button class="btn btn-primary"  style="background:#2F4F4F;"  onclick="abreModalNewSub('.$arregloD[$id].')">
            				Nuevo
            				<span class="glyphicon glyphicon-plus"></span>
            </button>
            </td>';
      $table=$table."<td><a href='lib/pdf.php?id=".$arregloD[$id]."'>Imprimir</a> </td>";
      $table=$table."<td><a href='paciente/fileUploaded/index.php?id=".$arregloD[$id]."&idtipo=RMN'>Agregar</a> </td>";
      $table=$table."<td><a href='paciente/fileUploaded/index.php?id=".$arregloD[$id]."&idtipo=TAC'>Agregar</a> </td>";
      $table=$table."<td><a href='paciente/fileUploaded/index.php?id=".$arregloD[$id]."&idtipo=RayosX'>Agregar</a> </td>";
      $table=$table."<td><a href='editar_paciente.php?id=".$arregloD[$id]."'> <img src='../img/editar.PNG' alt='Editar' /></a> </td>";
      $table=$table.'<td><button class="btn btn-danger glyphicon glyphicon-remove"
					onclick="preguntarSiNo('."'".$arregloD[$id]."'".')">ELIMINAR

					</button></td>';

      $table=$table."</tr>";

  }
    $table=$table."</table>";
    return $table;
}

  function getFotos($sql){
    $stmt = $this->db->prepare($sql);
    $run = $stmt->execute();
    $array = array();
    while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
      array_push($array,$rs['foto']);
    }
    return $array;
  }

  function deleteFotos($foto,$idtipo){
    $stmt = $this->db->prepare("DELETE from rayosx where foto = :foto and idtipo =:idtipo");
    $stmt->bindValue(":foto",$foto);
    $stmt->bindValue(":idtipo",$idtipo);
    $run = $stmt->execute();
  }

  function insertFotos($foto,$idpaciente,$idtipo){
    $stmt = $this->db->prepare("INSERT INTO rayosx(idpaciente,foto,idtipo) values (:idpaciente,:foto,:idtipo)");
    $stmt->bindValue(":foto",$foto);
    $stmt->bindValue(":idpaciente",$idpaciente);
    $stmt->bindValue(":idtipo",$idtipo);
    $run = $stmt->execute();
  }

}
 ?>
