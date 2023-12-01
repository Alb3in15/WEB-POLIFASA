<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Src/icono.png"/>
    <title>POLIFASA</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../libreria/Style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top ">
        <div class="container-fluid logo">
            <a href="Index.php" class="navbar-brand"><img src="../Src/footer.png" alt=""></a>
            <h4 class="display-5 mt-2" style="color: #144CA2 ;font-weight: 800;">POLIFASA</h4>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="../Index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="Productos.php" class="nav-link">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a href="acercaDe.php" class="nav-link">Acerca de</a>
                    </li>
                    <li class="nav-item">
                        <a href="Contactanos.php" class="nav-link active text-danger">Contáctanos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Welcome Section-->
    <div class="container-fluid padding">
        <div class="row welcome text-center">
            <div class="col-12">
                <h1 class="title display-4"> Ponte en Contacto</h1>
            </div>
             </div>
            <hr>
     <div class="container">
         <div class="row">
                    <div class="col-md-6">
                <h3 class="text-center">Local Polifasa</h3>
                <p class="leard" style="text-align: justify">Proporcionamos a todos los clientes unos excelentes servicios, productos de buena calidad, con precios competitivos, la incorporación de nuevos productos artículos y servicios requeridas por los clientes. Brindamos descuentos y reducir costos de productos para un beneficio directo al cliente.</p>
            </div>
            <div class="col-md-6">
                <form action="correo.php" method="post">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nombre</label>
                        <input type="text" class="form-control" name="nombre" required placeholder="Nombre">
                    </div>
                     <div class="form-group">
                        <label for="formGroupExampleInput">Email</label>
                        <input type="email" class="form-control" name="email" required placeholder="Email">
                    </div>

                     <div class="form-group">
                        <label for="formGroupExampleInput">Asunto</label>
                        <input type="text" class="form-control" name="asunto" required placeholder="Asunto">
                    </div>
                     <div class="form-group">
                        <label for="formGroupExampleInput">Mensaje</label>
                        <textarea class="form-control" name="mensaje" required placeholder="Mensaje" rows="3"></textarea>
                    </div>
                 <button type="submit" style="width: 100%;" name="enviar" class="btn btn-danger">Enviar</button>
                </form>
            </div>
         </div>
     </div>
    </div>
    <!---------------------------------------Footer section--------------->
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
                </div>
                <div class="col-12">
                    <hr class="ligth-100">
                     <h5>&copy; Propietario Polifasa</h5>
                </div>
            </div>
        </div>
    </footer>
</body></html>
