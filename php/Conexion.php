<?php
    function Conectar(){
        
            try{

                $Conectar=new PDO('mysql:host=localhost; dbname=Db_polifasa', 'root', '');

                $Conectar->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $Conectar->exec("SET CHARACTER SET UTF8");

            }catch(Exception $e){
                die("Error" . $e->get_Message());

                echo "Linea del error " . $e->getLine();
            }
            return $Conectar;
    }

?>