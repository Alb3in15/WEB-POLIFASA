<?php
	require_once "Conexion.php";
	$conexion = Conectar();

	$categoria = $_POST['txt_categoria'];


	$sql= "INSERT INTO poli_categoria (p_categoria)
			values('$categoria')";
     $resultado = $conexion->query($sql);
     $re = $resultado->rowCount();
     if ($re != 0){
         echo $re;
     }
 ?>