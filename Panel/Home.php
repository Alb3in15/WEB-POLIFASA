<!DOCTYPE html>
<html lang="en">
<?php
require_once "../php/db.php";
$conexion = conexion();
session_start();
if (!isset($_SESSION["usuario"])) {
    header("location:../panel.php");
}
?>

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../Src/icono.png" />
    <title>POLIFASA</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../libreria/Style.css">
    <link rel="stylesheet" href="../libreria/Style_panel.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="../libreria/Alertify/css/alertify.css">
    <link rel="stylesheet" href="../libreria/Alertify/css/themes/default.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script src="../libreria/Alertify/alertify.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="../libreria/maxLength/maxLength.js"> </script>
    <script src="../Js/panel.js"></script>
    <script src="../Js/Funcion_panel.js"> </script>
    <script src="../Js/Capturar_datos.js"></script>
    <title>Panel Administrador</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top ">
        <div class="container-fluid logo">
            <a href="Index.html" class="navbar-brand"><img src="../Src/footer.png" alt=""></a>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="Panel_Slider.php">Slider</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Panel_Productos.php">Productos</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $_SESSION["usuario"] ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="../php/cerrar.php">Cerrar Sesion</a>
                            </div>
                        </li>
                    </ul>
                </span>
            </div>
        </div>
    </nav>
    <!--VENTANA MODAL DE SLIDER-->
    <div class="modal fade" id="modalSlider" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Agregar Imagen Para Slider</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <form action="../php/F_imagen/almacenar.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nombre: </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="titulo_img" id="titulo_img" placeholder="Ingrese Nombre">
                                    </div>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="imagen" name="imagen">
                                    <label class="custom-file-label" for="customFile">Escoger Imagen</label>
                                </div><br><br>
                                <div class="form-group col-md-12">
                                    <img id="imgSalida" name="imgSalida" class="border border-danger" width="100%" height="300px" src="../Src/incognito.png" />
                                </div>
                                <hr>
                                <button type="submit" name="subir" id="subir" class="btn btn-primary btn-block">Agregar Imagen</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!--                 <div class="modal-footer">
                    <button type="submit" name="subir" class="btn btn-primary">Agregar Imagen</button>
                </div> -->
            </div>
        </div>
    </div>
    <!--FIN DE VENTANA MODAL SLIDER-->


    <!--VENTANA MODAL PARA MODIFICAR LA IMAGEN DEL SLIDER-->
    <div class="modal fade" id="Update_modal_slider" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modificar Imagen Slider</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <form action="../php/F_imagen/update_imgS.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id_update_img" id="id_update_img">
                                <input type="hidden" name="up_tipo_img" id="up_tipo_img">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nombre: </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="up_titulo_img" id="up_titulo_img">
                                    </div>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="up_imagen" name="up_imagen">
                                    <label class="custom-file-label" for="customFile">Escoger Imagen</label>
                                </div><br><br>
                                <div class="form-group col-md-12">
                                    <!-- <img id="imgSalida" class="border border-danger" width="100%" height="300px" src="../Src/incognito.png" /> -->
                                </div>
                                <hr>
                                <button type="submit" name="Update_img" id="Update_img" class="btn btn-primary btn-block">Actualizar Imagen</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!--                 <div class="modal-footer">
                    <button type="submit" name="subir" class="btn btn-primary">Agregar Imagen</button>
                </div> -->
            </div>
        </div>
    </div>
    <!--FIN DE VENTANA MODAL DE MODIFCACION DE IMG SLIDER-->
    <div class="card container mt-4">
    <div class="card-body">
                    <div class="row padding">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalSlider">
                                <span class="fa fa-plus"></span> Agregar Imagen
                            </button>
                        </div>
                    </div>
                    <div class="row padding">

                        <?php
                        require_once("../php/F_imagen/cargoimg.php");

                        $imagen = new rescatar_imagen();

                        $matrizImagen = $imagen->get_imagen();

                        ?>
                        <?php

                        foreach ($matrizImagen  as $ver) {

                            $captura = $ver['imagen_id'] . "||" .
                                $ver['titulo_img'] . "||" .
                                $ver['tipo_imagen'];
                            $contenido = $ver['imagen'];
                        ?>
                            <div class="col-md-4 mb-2">
                                <div class="card">
                                    <?php echo "<img  class='card-img-top'  src='data:image/jpeg; base64 ," . base64_encode($contenido) . "'>" ?>
                                    <!-- <img class="card-img-top" src="../Src/foto2.png" alt=""> -->
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $ver['titulo_img'] ?> </h4>
                                        <div class="row">
                                            <div class="col">
                                                <button type="button" class="btn  btn-block btn-warning mb-1" data-toggle="modal" data-target="#Update_modal_slider" onclick="updateSliderImg('<?php echo $captura; ?>')">Actualizar</button>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn  btn-block btn-danger" onclick="preguntarSiNo('<?php echo $ver['imagen_id'] ?>')">Eliminar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <!-- 
                        <div class="col-md-4">
                            <div class="card">
                                <img class="card-img-top" src="../Src/foto2.png" alt="">
                                <div class="card-body">
                                    <h4 class="card-title">Imagen Slider </h4>
                                    <div class="row">
                                        <div class="col">
                                            <button type="button" class="btn  btn-block btn-warning ">Actualizar</button>
                                        </div>
                                        <div class="col">
                                            <button type="button" class="btn  btn-block btn-danger">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
</body>

</html>
<script type="text/javascript">
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>