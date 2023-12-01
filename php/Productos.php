<?php 
    class rescatar_categoria{
        
        private $db;

        private $categoria;

        public function __construct (){
            require_once("Conexion.php");

            $this->db=Conectar();

            $this->categoria=array();
        }
        public function get_categoria($id_categoria){

          $this->db=Conectar();

          if(isset($id_categoria)){
            $sql = "SELECT * FROM poli_categoria WHERE id_categoria = $id_categoria";
          }else {
            $sql = "SELECT * FROM poli_categoria";
          }

            $consulta = $this->db->query($sql);
            
            while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
                $this->categoria[]=$fila;
            }
                return $this->categoria;
        }
    }
    class rescatar_productos{
        
        private $db;

        private $productos;

        public function __construct (){
            require_once("Conexion.php");

            $this->db=Conectar();

            $this->productos=array();
        }
        public function get_productos(){

          $this->db=Conectar();
          $sql = "SELECT * FROM poli_productos WHERE id_categoria = '$Dato'";
            $consulta = $this->db->query($sql);
            
            while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
                $this->productos[]=$fila;
            }
                return $this->productos;
        }
    }
?>