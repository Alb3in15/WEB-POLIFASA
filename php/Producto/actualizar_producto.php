<?php
// Conexion a la base de datos

require_once('../db.php');

$conexion = conexion();
    $id_producto = $_POST['actualizar_id_producto'];
    $Select_Cproducto= $_POST['Select_Cproducto']; 
    $txt_producto= $_POST['txt_producto']; 
    $txt_precio= $_POST['txt_precio'];
    $txt_descuento= $_POST['txt_descuento'] == null ? 0 : $_POST['txt_descuento'] ;
    $Select_disponibilidad= $_POST['Select_disponibilidad'];
    $txt_fecha= $_POST['txt_fecha']; 
    $txt_descripcion= $_POST['txt_descripcion'];
    //$imagen_pro= $_POST['imagen_pro'];
   // var_dump($_FILES['imagen_pro']);
    if ($_FILES['imagen_pro']['name'] == null)
    {
                    // Insertamos en la base de datos.
                    $sql= "UPDATE poli_productos SET id_categoria='$Select_Cproducto',
                    pro_nombre = '$txt_producto',
                    pro_precio = '$txt_precio',
                    pro_desuento = '$txt_descuento',
                    pro_disponibilidad = '$Select_disponibilidad',
                    pro_fecha = '$txt_fecha',
                    pro_descripcion = '$txt_descripcion' 
                    WHERE id_productos = '$id_producto'";
        
                        echo $result =mysqli_query($conexion,$sql);
                    if ($result)
                    {
                        //header("location:../../Panel/Home.php");
                         echo "<script> alert ('Los datos se han actualizado Correctamente.'); window.location.href='../../Panel/Panel_Productos.php'; </script>" ;
                        // echo "El archivo ha sido copiado exitosamente.";
                    }
                    else
                    {
                        echo "Ocurrió algun error al copiar el archivo.";
                    }
    }
    else
    {
        // Verificamos si el tipo de archivo es un tipo de imagen permitido.
        // y que el tamaño del archivo no exceda los 16MB
        $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
        $limite_kb = 16384;
        if (in_array($_FILES['imagen_pro']['type'], $permitidos) && $_FILES['imagen_pro']['size'] <= $limite_kb * 1024)
        {
    
            // Archivo temporal
            $imagen_temporal = $_FILES['imagen_pro']['tmp_name'];
    
            // Tipo de archivo
            $tipo = $_FILES['imagen_pro']['type'];
    
            // Leemos el contenido del archivo temporal en binario.
            $fp = fopen($imagen_temporal, 'r+b');
            $data = fread($fp, filesize($imagen_temporal));
            fclose($fp);
    
            //Podríamos utilizar también la siguiente instrucción en lugar de las 3 anteriores.
            // $data=file_get_contents($imagen_temporal);
    
            // Escapamos los caracteres para que se puedan almacenar en la base de datos correctamente.
            $data = mysqli_escape_string($conexion,$data);

                        // Insertamos en la base de datos.
                        $sql= "UPDATE poli_productos SET id_categoria='$Select_Cproducto',
                        pro_nombre = '$txt_producto',
                        pro_precio = '$txt_precio',
                        pro_desuento = '$txt_descuento',
                        pro_disponibilidad = '$Select_disponibilidad',
                        pro_fecha = '$txt_fecha',
                        pro_descripcion = '$txt_descripcion',
                        pro_imagen='$data',
                        pro_tipo_imagen='$tipo'
                        WHERE id_productos = '$id_producto'";
            
                            echo $result =mysqli_query($conexion,$sql);
                        if ($result)
                        {
                            //header("location:../../Panel/Home.php");
                             echo "<script> alert ('Los datos se han actualizado Correctamente.'); window.location.href='../../Panel/Panel_Productos.php'; </script>" ;
                            // echo "El archivo ha sido copiado exitosamente.";
                        }
                        else
                        {
                            echo "Ocurrió algun error al copiar el archivo.";
                        }
        }
        else
        {
            echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
        }
    }

 ?>