<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Src/icono.png" />
    <title>POLIFASA</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../libreria/Style.css">
    <link rel="stylesheet" href="../libreria/style_card.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel='stylesheet' href="https://netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,500,300italic,400italic" rel='stylesheet'
        type='text/css'>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

    <script src="../Js/Capturar_datos.js"></script>
    <script src="../Js/Funcion_panel.js"></script>
</head>
<body>
  <?php
  require_once("../php/db.php");
    $conectar = conexion();
   ?>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top ">
        <div class="container-fluid logo">
            <a href="Index.php" class="navbar-brand"><img src="../Src/footer.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="../Index.php" class="nav-link ">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="Productos.php" class="nav-link active text-danger ">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a href="acercaDe.html" class="nav-link">Acerca de</a>
                    </li>
                    <li class="nav-item">
                        <a href="Contactanos.html" class="nav-link">Contáctanos</a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link" href="Blog.php">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Welcome Section-->
    <?php
        require_once("../php/Productos.php");

        $categoria = new rescatar_categoria();

        $matrizCategoria = $categoria->get_categoria();

    ?>
    <?php

        foreach ($matrizCategoria  as $ver ){
            $captura_categoria = $ver['id_categoria'];
    ?>


    <div class="container-fluid padding">
        <div class="row welcome text-center">
            <div class="col-12">
                <h1 class="title display-4"> <?php echo $ver['p_categoria'] ?> </h1>
            </div>
            <hr>
            <div class="col-12">
                <p class="lead">Todos estos podructos que usted puede visualisar estan a la venta en nuestro negocio,
                    cada semana se ira subiendo mas productos de los cuales usted podra visualisar .</p>
            </div>
        </div>
    </div>
    <!--  Cards-->
    <div class="container mt-n4">
        <div class="row padding mb-2">
      <?php
            $sql = "SELECT * , ROUND(sum(pro_precio - (pro_precio * (pro_desuento/100))),2) as PrecioP FROM poli_productos WHERE id_categoria = '$captura_categoria' group by id_productos  ";
           $resultado = mysqli_query($conectar,$sql);
          global  $dato;
           while ($ver= mysqli_fetch_row($resultado)) {
                $dato = $ver[0];
      ?>
                <div class="col-lg-3 col-sm-3 mb-2">
                    <a href="javascript:void(0)" id="Card_productos" name="Card_productos" onclick="Captura_id_producto('<?php echo $dato ?>')">
                        <div class="card">
                            <div class="content-img">
                               <?php echo "<img  class='img-fluid img-productos'  src='data:image/jpeg; base64 ," . base64_encode ($ver[8])."'>"?>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">Desde <strong><?php if ($ver[4] !=0){ echo "$".$ver[10] ."</strong>" ."<del>"." $".$ver[3] ."</del>"; } else {  echo " $".$ver[3]. "</strong>";} ?></h5>
                                <p class="leard"><?php if($ver[4] != 0){ echo " Descuento del: " . $ver[4] . "%";}else { echo "<br>";} ?></p>
                                <p class="text-center"><?php echo $ver[2] ?></p>
                            </div>
                        </div>
                        <input type="hidden" name="id_producto" value="<?php echo $ver[0];?>">
                    </a>
                </div>
          <?php
        }
        echo "<h1>".$ver[0]."</h1>";
        ?>
  </div>
  </div>
        <?php
      }
          ?>
          <div id="Mymodal_productos">
            
          </div>

    <!---Footer section--------------->
    <footer>
        <div class="container-fluid padding">
            <div class="row text-center">
                <div class="col-md-4">
                    <img src="../Src/polifasa.png">
                    <hr class="ligth">
                    <p>098 848 0579 </p>
                    <p>polifasaec@gmail.com</p>
                    <p>Provincia: Guayas</p>
                    <p>Ciudad: Milagro</p>
                </div>
                <div class="col-md-4">
                    <hr class="ligth">
                    <h5>Horario de Atención</h5>
                    <hr class="ligth">
                    <p>De Lunes a Viernes; 7:30am - 21:30pm</p>
                    <p>Sabados: 9:00am - 17:00pm</p>
                    <p>Domingos: 09:00 - 19:00pm</p>
                </div>
                <div class="col-md-4">
                    <hr class="ligth">
                    <h5>Lugar</h5>
                    <hr class="ligth">
                    <p>Ciudad : Milagro</p>
                    <p>Ciudad : Milagro</p>
                </div>
                <div class="col-12">
                    <hr class="ligth-100">
                    <h5>&copy; Propietario Polifasa</h5>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
