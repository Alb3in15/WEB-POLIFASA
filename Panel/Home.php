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
            <ul class="navbar-nav">
                <h4>Administradora:</h4>
                <h6> <?php echo $_SESSION["usuario"] ?> </h6>
                <a class="btn btn-secondary  btn-md ml-3 role=" target="_blank" button" href="https://polifasa.000webhostapp.com/home/Index.php">Ver mi Web</a>
            </ul>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <!-- ALGUN CONTENIDO -->
                <!--                 <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                        <a href="Paginas/Productos.html" class="nav-link">Blog</a>
                    </li>
                </ul> -->
                <a class="btn btn-danger btn-md ml-auto" role="button" href="../php/cerrar.php">Cerrar Sesion</a>
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
    <!--INICIO DE VENTANA MODAL PARA DETALLES-->
    <!-- Modal -->
    <div class="modal fade" id="id_modal_Detalles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar Detalles</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <?php
	    

        $sql= "SELECT id_productos, pro_nombre from poli_productos";
        $result=  mysqli_query($conexion,$sql);

?>
                                <select name="Select_pro_detalles" id="Select_pro_detalles" class="form-control">
                                    <option value="0">Seleccionar Producto</option>
                                    <?php
                     while ($ver=mysqli_fetch_row($result)):
                ?>
                                    <option value="<?php echo $ver[0]?>">
                                        <?php echo $ver[1]?>
                                    </option>
                                    <?php endwhile;?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Detalles 1</label>
                                <input type="text" class="form-control" id="txt_cara_uno" placeholder="Ingrese Detalles 1">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Detalles 2:</label>
                                <input type="text" class="form-control" id="txt_cara_dos" placeholder="Ingrese Detalles 2">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Detalles 3</label>
                                <input type="text" class="form-control" id="txt_cara_tres" placeholder="Ingrese Detalles 3">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Detalles 4:</label>
                                <input type="text" class="form-control" id="txt_cara_cuatro" placeholder="Ingrese Detalles 4">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="btn_Agregar_DetallesPro">Registrar</button>
                </div>
            </div>
        </div>
    </div>
    <!---FIN DE VENTANA MODAL DE DETALLES->

 <!--INICIO DE VENTANA MODAL PARA CATEGORAI-->
    <div class="modal fade" id="id_modal_Categoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar Nueva Categorias de Productos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Registe Dato: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="txt_categoria" placeholder="Ingrese una nueva categoria">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="btn_Agregar_Categoria">Registrar</button>
                </div>
            </div>
        </div>
    </div>
    <!---FIN DE VENTANA MODAL DE CATEGORIA->

    <!--VENTANA MODAL DE PRODUCTOS-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Agregar Productos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../php/Agregar_productos.php" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <label>Seleccione Categoria <button type="button" class=" btn btn-danger btn-sm" data-toggle="modal" data-target="#id_modal_Categoria">
                                        <span class="fa fa-plus">Agregar Categoria</span>
                                    </button> </label>
                                <div class="form-row">
                                    <div class="col-sm-12">
                                        <?php
	    

        $sql= "SELECT * from poli_categoria";
        $result=  mysqli_query($conexion,$sql);

?>
                                        <select id="Select_Cproducto" class="form-control btn-block" name="Select_Cproducto">
                                            <option value="0" disabled>Seleccionar</option>
                                            <?php
                                            while ($ver=mysqli_fetch_row($result)):
                                        ?>
                                            <option value="<?php echo $ver[0]?>">
                                                <?php echo $ver[1]?>
                                            </option>
                                            <?php endwhile;?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Producto</label>
                                <input type="text" class="form-control" name="txt_producto" id="txt_producto" placeholder="Nombre del Porducto">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPassword4">Precio</label>
                                <input type="number" class="form-control" name="txt_precio" id="txt_precio" placeholder="Precio">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPassword4">Descuento</label>
                                <input type="number" class="form-control" placeholder="20%" name="txt_descuento" id="txt_descuento">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Disponibilidad</label>
                                <select class="form-control" id="Select_disponibilidad" name="Select_disponibilidad">
                                    <option disabled>Seleccione</option>
                                    <option>Disponible</option>
                                    <option>Agotado</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Fecha de Publicacion</label>
                                <input type="date" class="form-control" min="2013-01-01" max="3050-12-31" value="<?php echo date("Y-m-d");?>" id="txt_fecha" name="txt_fecha" placeholder="Agergar Fecha">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Descripcion</label>
                            <textarea class="form-control" name="txt_descripcion" id="txt_descripcion" rows="8" cols="80"></textarea>
                            <p id="limite_descripcion" class="ml-auto"></p> <em>/300</em>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputCity">Imagen</label>
                                <input type="file" id="imagen_pro" name="imagen_pro" class="form-control" id="inputCity">
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary btn-block" id="btn_AgregarProductos">Agregar Producto</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!--find e ventanal Modal-->
    <div id="accordion" class="container mt-2">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Creacion de Blog
                    </button>
                </h5>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-md-offset-2">
                                    <h1>Crear post</h1>
                                    <form action="" method="POST">

                                        <div class="form-group has-error">
                                            <label for="slug">Slug <span class="require">*</span> <small>(This field use in url path.)</small></label>
                                            <input type="text" class="form-control" name="slug" />
                                            <span class="help-block">Field not entered!</span>
                                        </div>

                                        <div class="form-group">
                                            <label for="title">Titulo <span class="require">*</span></label>
                                            <input type="text" class="form-control" name="title" />
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Descipción</label>
                                            <textarea rows="5" class="form-control" name="description"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <p><span class="require">*</span> - Campos Obligatorios</p>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                                Crear
                                            </button>
                                            <button class="btn btn-default">
                                                Cancelar
                                            </button>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Slider
                    </button>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
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

    foreach ($matrizImagen  as $ver ){

        $captura=$ver['imagen_id']."||".
                 $ver['titulo_img']."||".
                 $ver['tipo_imagen'];
     $contenido = $ver['imagen'];
?>
                        <div class="col-md-4 mb-2">
                            <div class="card">
                                <?php echo "<img  class='card-img-top'  src='data:image/jpeg; base64 ," . base64_encode ($contenido)."'>"?>
                                <!-- <img class="card-img-top" src="../Src/foto2.png" alt=""> -->
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $ver['titulo_img']?> </h4>
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
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Productos
                    </button>
                </h5>
            </div>

            <!--PRODUCTOS-->
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                    <div class="row padding">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-danger btn-sm btn-block mb-1" data-toggle="modal" data-target="#exampleModalCenter">
                                <span class="fa fa-plus"></span> Agregar Productos
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary btn-sm btn-block mb-1" data-toggle="modal" data-target="#id_modal_Detalles">
                                <span class="fa fa-plus"></span> Agregar detalles
                            </button>
                        </div>
                    </div>
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseCuatro" aria-expanded="false" aria-controls="collapseThree">
                        Productos535
                    </button>
                </h5>
            </div>
            <div id="collapseCuatro" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                    <!-- Algo Ira en su momento-->
                </div>
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
