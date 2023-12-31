<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="Src/icono.png" />
    <title>POLIFASA</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="libreria/Style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top ">
        <div class="container-fluid logo">
            <a href="Index.php" class="navbar-brand"><img src="Src/footer.png" alt=""></a>
            <h4 class="display-5 mt-2" style="color: #144CA2 ;font-weight: 800;">POLIFASA</h4>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="Index.php" class="nav-link active text-danger">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="Paginas/Productos.php" class="nav-link">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a href="Paginas/acercaDe.php" class="nav-link">Acerca de</a>
                    </li>
                    <li class="nav-item">
                        <a href="Paginas/Contactanos.php" class="nav-link">Contáctanos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php
    require_once("php/F_imagen/ImgSlider.php");

    $imagen = new rescatar_imagenSlider();
    
    $matrizImagen = $imagen->get_imagenSlider();

?>
    <!-- Image Slider-->
    <div id="slides" class="carousel slide" data-ride="carousel">
   
        <ul class="carousel-indicators">
        <?php
            $cnt = 0;
                foreach($matrizImagen as $imgSlider){ 
                    //$cnt= $imgSlider['imagen_id'];
    ?>
            <li data-target="#slides" data-slide-to="<?php echo $cnt; ?>"></li>
            <?php
                   $cnt++;  
                }
            ?>
        </ul>
        <div class="carousel-inner">
        <?php
                $cnt = 0;
                foreach($matrizImagen as $imgSlider){ 
                    $contenido = $imgSlider['imagen'];
    ?>
            <div class="carousel-item <?php if ($cnt==0){ echo 'active';}?>">
            <?php echo "<img   class='d-block w-100' src='data:image/jpeg; base64 ," . base64_encode ($contenido)."' alt=''>"?>
<!--                 <div class="carousel-caption">
                    <h1 class="display-2">POLIFASA</h1>
                    <h3>Todo lo que necesitas</h3>
                </div>  -->
            </div>
            <?php
                $cnt++;
                }
            ?>
        <!--     <div class="carousel-item active">
                <img src="Src/foto1.png" alt="">
            </div> -->
        </div>
    </div>
    <!-- Jumbotron-->
    <div class="container-fluid padding">
        <div class="row jumbotron ">
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 cold-xl-10">
                <p class="lead text-center">Papeleria, Articulos de oficina, Cyber, Articulos de bazar y mucho mas...</p>
            </div>
        </div>
    </div>
    <!-- Welcome Section-->
    <div class="container-fluid padding">
        <div class="row welcome text-center">
            <div class="col-12">
                <h1 class="title display-4" style="color: #144CA2 ;font-weight: 800; "> Bienvenido a <span style="color:#FDB405 ; font-weight: 800;">POLIFASA</span></h1>
            </div>
            <hr>
            <div class="col-12">
                <p class="lead">Papelería, Artículos de oficina, Cyber, Artículos de bazar y mucho mas...</p>
            </div>
        </div>
    </div>
    <!-- Three Column Section-->
    <div class="container-fluid padding">
        <div class="row text-center padding">
            <div class="col-xs-12 col-sm-6 col-md-4">
                <i class="conten"><img src="Src/contenido/27973699_816669481869157_880627940370803486_n.jpg" alt=""></i>
                <h3>Artículos de Oficina</h3>
                <p>Quienes trabajamos desde una oficina o somos estudiantes, soñamos con tener artículos que nos faciliten la vida, el trabajo y que además nos ayuden a decorar nuestros (muchas veces) aburridos escritorios.</p>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <i class="conten"><img src="Src/contenido/27973699_816669481869157_880627940370803486_n.jpg" alt=""></i>
                <h3>Papelería</h3>
                <p>En este Nuevo Inicio Escolar, PAPELERIA POLIFASA les recuerda a nuestra clientela que contamos con los mejores precios y las mejores marcas para que sus hijos regresen a clases como se debe.</p>
            </div>
            <div class="col-sm-12 col-md-4">
                <i class="conten"><img src="Src/contenido/27972769_816664608536311_4985329938412489897_n.jpg" alt=""></i>
                <h3>Cyber</h3>
                <p>Servicios acordes con sus necesidades. Ofrecemos servicios de internet, copias B/N e impresiones al por mayor y menor.</p>
            </div>
        </div>
        <hr class="my-4">
    </div>
    <!--  Meet the team -->
    <div class="conatiner-fluid padding">
        <div class="row welcome text-center">
            <div class="col-12">
                <h1 class="display-4" style="color: #144CA2 ;font-weight: 800;">PRODUCTOS DE <span style="color:#FDB405 ; font-weight: 800;">POLIFASA</span></h1>
            </div>
        </div>
    </div>
    <!--  Cards-->
    <div class="container-fluid padding">
        <div class="row padding">
            <div class="col-md-2">
                <div class="card">
                    <img class="card-img-top" src="Src/productos/cartera.jpg" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Carteras personalizadas</h4>
                        <p class="card-text">Dependiendo el tamaño el precio va de 8$ en adelante como le gusta a nuestro bolsillo no te quedes sin la tuya y realiza tu pedido y nosotros lo diseñamos a tu gusto✔✔.</p>
                        <a href="Paginas/Productos.php?categoria=3" class="btn btn-outline-secondary">Ver Mas</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <img class="card-img-top" src="Src/productos/26907297_802194683316637_1856052114694750852_n.jpg" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Camisetas/gorras personalizadas </h4>
                        <p class="card-text">Ya se acerca San Valentin, en esta época tan especial polifasa te trae promociones y descuentos para regalar a esa persona especial, no te quedes sin regalar algo bonito✔.</p>
                        <a href="Paginas/Productos.php?categoria=4" class="btn btn-outline-secondary">Ver Mas</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <img class="card-img-top" src="Src/productos/57761946_1113513088851460_7494215145468461056_n.jpg" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Útiles - escolares📚📓📓</h4>
                        <p class="card-text">No te olvides de cotizar tu lista de útiles con nosotros😉😉Aprovecha regalos y descuentos que te ofrecemos por la compra completa de tu lista, tenemos fabulosos jarros personalizados. </p>
                        <a href="Paginas/Productos.php?categoria=8" class="btn btn-outline-secondary">Ver Mas</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <img class="card-img-top" src="Src/productos/26814826_804690943067011_589642744395622422_n.jpg" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Jarros Personalizados</h4>
                        <p class="card-text">Pide tu jarro personalizado con tiempo😉contamos con precios al por mayor cualquier duda pregunté 😊también lo rellenamos con chocolates para que regales sonrisas a esa persona. especial</p>
                        <a href="Paginas/Productos.php?categoria=6" class="btn btn-outline-secondary">Ver Mas</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <img class="card-img-top" src="Src/productos/26903947_802212973314808_87637759309137467_n.jpg" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Almohadas Personalizadas</h4>
                        <p class="card-text">Almohadas personalizadas 😍 con fotos propias, diseños únicos, trabajos en sublimación 38x30cm de buena calidad en materiales antialérgicos. Al por mayor y menor precios.</p>
                        <a href="Paginas/Productos.php?categoria=7" class="btn btn-outline-secondary">Ver Mas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid padding">
        <div class="row text-center padding">
            <div class="col-12">
                <h2>Redes Sociales</h2>
            </div>
            <div class="col-12 social padding">
                <a href="https://www.facebook.com/Polifasa-737686663100773/?epa=SEARCH_BOX"><img src="Src/facebook.PNG" alt=""></a>
                <a href="#"><img src="Src/whatsapp.PNG" alt=""></a>
                <a href="#"><img src="Src/instagram.PNG" alt=""></a>
                <a href="#"><img src="Src/twitter.PNG" alt=""></a>
                <a href="#"><img src="SRC/gmail.PNG" alt=""></a>
            </div>
        </div>
    </div>
    <!---------------------------------------Footer section--------------->
    <footer>
        <div class="container-fluid padding">
            <div class="row text-center">
                <div class="col-md-4">
                    <img src="Src/polifasa.png">
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
