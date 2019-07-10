<?php
    require_once("Conexion.php");
       $base = Conectar();

    try {
          /*Utilizaremos la clase PDO*/
          //$base = new PDO('mysql:host=localhost; dbname=Db_polifasa','root','');
          $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          /* MARCADORES :LOGIN Y :PASWORD*/
          $sql = "SELECT * FROM poli_admin WHERE p_correo= :login AND  p_password= :password";
          /*CREAREMOS UNA CONSULTA PREPARADA*/
          $resultado = $base->prepare($sql);
          /*Vamos a recatarr el usuario y la password;a*/
          $login = htmlentities(addslashes($_POST["login"]));
          $password = htmlentities(addslashes($_POST["password"]));

          $resultado->bindValue(":login", $login);
          $resultado->bindValue(":password", $password);

          /*Ahora ejecutamos nuesta instruccion SQL*/
          $resultado->execute();

          $numero_registro = $resultado->rowCount();

            if ($numero_registro != 0) {
              session_start();
              $_SESSION["usuario"]= $_POST["login"];
              header("location:../Panel/Home.php");
            }else{
              echo '<script> alert ("ERROR usuario o contraseña incorrectos")</script>';
              header("location:../panel.php");
            }

          } catch (Exception $e) {
          /* DIE para matar cualquier proceso */
          die("Error: " . $e->getMessage());
          }
    ?>