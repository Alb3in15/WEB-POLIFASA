<?php 
    class rescatar_imagen{
        
        private $db;

        private $productos;

        public function __construct (){
            require_once("../php/Conexion.php");

            $db=Conectar();

            $this->productos=array();
        }
        public function get_imagen(){
          require_once("../php/Conexion.php");

          $db=Conectar();
          $sql = "SELECT * FROM poli_slider";
            $consulta = $db->query($sql);
            
            while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
                $this->productos[]=$fila;
            }
                return $this->productos;
        }
    }
?>