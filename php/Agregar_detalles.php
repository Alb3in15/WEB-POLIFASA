<?php
	require_once "db.php";
	$conexion = conexion();

    $Select_pro_detalles = $_POST['Select_pro_detalles'];
    $txt_cara_uno = $_POST['txt_cara_uno'];
    $txt_cara_dos = $_POST['txt_cara_dos'];
    $txt_cara_tres = $_POST['txt_cara_tres'];
    $txt_cara_cuatro = $_POST['txt_cara_cuatro'];

	$sql= "INSERT INTO poli_pro_carac (id_productos,cara_uno,cara_dos,
    cara_tres,cara_cuatro)
		values('$Select_pro_detalles','$txt_cara_uno','$txt_cara_dos','$txt_cara_tres','$txt_cara_cuatro')";
		echo $result =mysqli_query($conexion,$sql);
 ?>