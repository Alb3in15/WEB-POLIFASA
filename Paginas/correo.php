<?php
$destinatario = "johnnyniebla14@hotmail.com";
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

$header = "Enviado desde la Web POLIFASA";
$mensajeCompleto = $mensaje . "\nAtentamente " . $nombre ." ". $email ;
//funcion Mail
mail($destinatario,$asunto,$mensajeCompleto, $header);
echo "<script>alert('Correo Enviado exitosamente')</script>";
?>
