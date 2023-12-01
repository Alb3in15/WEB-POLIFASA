<?php
  require_once "../../php/Conexion.php";
  $conexion = Conectar();

  $id= $_POST['id'];


  $productos = array();
    $sql= "SELECT * FROM poli_productos WHERE id_productos=$id";
    $consulta = $conexion->query($sql);
    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
        
        $productos=['id' => $fila['id_productos'],
                    'id_categoria' => $fila['id_categoria'],
                    'nombre' => $fila['pro_nombre'],
                    'precio' => $fila['pro_precio'],
                    'descuento' => $fila['pro_desuento'],
                    'estado' => $fila['pro_disponibilidad'],
                    'fecha' => $fila['pro_fecha'],
                     'descripcion' => $fila['pro_descripcion'],
                    ];
       
    }
   echo json_encode($productos);
    
/*      $re = $consulta->rowCount();
    return $re;
    if  ($re != 0){
        echo json_encode($productos);
    }else {
        echo json_encode(['mensaje' => 'no se encontro registro']);
    } */
 ?>