<?php
  require_once "../../php/Conexion.php";
  $conexion = Conectar();

  $id= $_POST['id'];

    $sql= "DELETE FROM poli_slider WHERE imagen_id='$id'";
    $consulta = $conexion->query($sql);
    $re = $consulta->rowCount();
if  ($re != 0){
    echo $re;
}
 ?>