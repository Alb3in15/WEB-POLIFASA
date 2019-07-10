<?php 
    class rescatar_imagenSlider{
        
        private $db;

        private $imgslider;

        public function __construct (){
            require_once("php/Conexion.php");

            $db=Conectar();

            $this->imgslider=array();
        }
        public function get_imagenSlider(){
          require_once("php/Conexion.php");
          $db=Conectar();
          $sql = "SELECT * FROM poli_slider";
            $consulta = $db->query($sql);
            
            while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
                $this->imgslider[]=$fila;
            }
                return $this->imgslider;
        }
    }
?>
