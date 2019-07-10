
   <?php
    function conexion(){
        $servidor = "localhost";
        $usuario = "root";
        $password = "";
        $bd = "Db_polifasa";

        $conexion=mysqli_connect($servidor, $usuario,$password,$bd);
          return $conexion;
    }
 ?>