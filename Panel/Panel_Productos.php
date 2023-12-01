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
                    <li class="nav-item">
                        <a class="nav-link" href="Home.php">Slider</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="Panel_Productos.php">Productos</a>
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


                                $sql = "SELECT id_productos, pro_nombre from poli_productos";
                                $result =  mysqli_query($conexion, $sql);

                                ?>
                                <select name="Select_pro_detalles" id="Select_pro_detalles" class="form-control">
                                    <option value="0">Seleccionar Producto</option>
                                    <?php
                                    while ($ver = mysqli_fetch_row($result)) :
                                    ?>
                                        <option value="<?php echo $ver[0] ?>">
                                            <?php echo $ver[1] ?>
                                        </option>
                                    <?php endwhile; ?>
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
                            <label class="col-sm-4 col-form-label">Registre Dato: </label>
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
<!--                                 <label>Seleccione Categoria <button type="button" class=" btn btn-danger btn-sm" data-toggle="modal" data-target="#id_modal_Categoria">
                                        <span class="fa fa-plus">Agregar Categoria</span>
                                    </button> </label> -->
                                <div class="form-row">
                                    <div class="col-sm-12">
                                        <?php


                                        $sql = "SELECT * from poli_categoria";
                                        $result =  mysqli_query($conexion, $sql);

                                        ?>
                                        <select  class="form-control btn-block" name="Select_Cproducto">
                                            <option value="0" disabled>Seleccionar</option>
                                            <?php
                                            while ($ver = mysqli_fetch_row($result)) :
                                            ?>
                                                <option value="<?php echo $ver[0] ?>">
                                                    <?php echo $ver[1] ?>
                                                </option>
                                            <?php endwhile; ?>
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
                                <input type="number" class="form-control" name="txt_precio" step=".01" id="txt_precio" placeholder="Precio">
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
                                <input type="date" class="form-control" min="2013-01-01" max="3050-12-31" value="<?php echo date("Y-m-d"); ?>" id="txt_fecha" name="txt_fecha" placeholder="Agergar Fecha">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Descripcion</label>
                            <textarea class="form-control" name="txt_descripcion" id="txt_descripcion" rows="8" cols="80" maxlength="300"></textarea>
                           <!--  <p id="limite_descripcion" class="ml-auto"></p> <em>/300</em> -->
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

        <!--VENTANA MODAL DE ACTUALIZAR PRODUCTO-->
        <div class="modal fade" id="modal_actualizar_producto" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Actualizar Producto</h5>
                    <button type="button" class="close" data-dismiss="modal"  aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../php/Producto/actualizar_producto.php" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <label>Seleccione Categoria</label>
                                <div class="form-row">
                                    <div class="col-sm-12">
                                        <?php


                                        $sql = "SELECT * from poli_categoria";
                                        $result =  mysqli_query($conexion, $sql);

                                        ?>
                                        <select  class="form-control btn-block" id="actualizar_Select_Cproducto" name="Select_Cproducto">
                                            <option value="0" disabled>Seleccionar</option>
                                            <?php
                                            while ($ver = mysqli_fetch_row($result)) :
                                            ?>
                                                <option value="<?php echo $ver[0] ?>">
                                                    <?php echo $ver[1] ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <input type="text" class="form-control" name="actualizar_id_producto" id="actualizar_id_producto" hidden>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Producto</label>
                                <input type="text" class="form-control" name="txt_producto" id="actualizar_txt_producto" placeholder="Nombre del Porducto">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPassword4">Precio</label>
                                <input type="number" class="form-control" name="txt_precio" step=".01" id="actualizar_txt_precio" placeholder="Precio">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPassword4">Descuento</label>
                                <input type="number" class="form-control" placeholder="20%" name="txt_descuento" id="actualizar_txt_descuento">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Disponibilidad</label>
                                <select class="form-control" id="actualizar_Select_disponibilidad" name="Select_disponibilidad">
                                    <option disabled>Seleccione</option>
                                    <option>Disponible</option>
                                    <option>Agotado</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Fecha de Publicacion</label>
                                <input type="date" class="form-control" min="2013-01-01" max="3050-12-31" value="<?php echo date("Y-m-d"); ?>" id="actualizar_txt_fecha" name="txt_fecha" placeholder="Agergar Fecha">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Descripcion</label>
                            <textarea class="form-control" name="txt_descripcion" id="actualizar_txt_descripcion" rows="8" cols="80" maxlength="300"></textarea>
                         <!--    <p id="limite_descripcion" class="ml-auto"></p> <em class="ml-auto">/300</em> -->
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputCity">Imagen</label>
                                <input type="file" name="imagen_pro" class="form-control" id="actualizar_imagen_pro">
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary btn-block" id="btn_actualizar_producto">Actualizar Producto</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!--find e ventanal Modal-->
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
            <div class="row">
                    <div class="col-md-3">
                        <button type="button" class="btn btn-danger btn-sm btn-block mb-1" data-toggle="modal" data-target="#exampleModalCenter">
                            <span class="fa fa-plus"></span> Agregar Productos
                        </button>
                    </div>
    <!--                 <div class="col-md-6">
                        <button type="button" class="btn btn-primary btn-sm btn-block mb-1" data-toggle="modal" data-target="#id_modal_Detalles">
                            <span class="fa fa-plus"></span> Agregar detalles
                        </button>
                    </div> -->
                </div>
            </div>
            <div class="card-body">
    
                <?php
    
                $sql = "SELECT pro.id_productos,pro.id_categoria,pro.pro_imagen,pro.pro_nombre, pro.pro_precio, pro.pro_desuento,pro.pro_disponibilidad,pro.pro_fecha,pro.pro_descripcion , ca.p_categoria, de.id_productos , de.cara_id ,de.cara_uno,de.cara_dos,de.cara_tres,de.cara_cuatro
                            FROM poli_productos pro
                            INNER JOIN poli_categoria ca ON pro.id_categoria = ca.id_categoria
                            LEFT JOIN poli_pro_carac de ON pro.id_productos = de.id_productos
                            group by pro.id_productos ,  de.cara_id
                            order by pro.id_productos DESC";
    
                        $productos = mysqli_query($conexion,$sql);
    
                ?>
                <table class="table table-bordered table-sm table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Descuento</th>
                            <th scope="col">Disponibilidad</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Detalles</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                     while ($ver= mysqli_fetch_row($productos)){
                    ?>
                            <tr>
                                <th scope="row">
                                    <button class="btn btn-link fa fa-trash mt-3 text-danger" onclick="preguntarSiNoProducto('<?php echo $ver[0] ?>')"></button>
                                </th>
                                <td> <?php echo $ver[9]; ?> </td>
                                <td><?php echo "<img  class='d-block w-75 h-50 img_modal'  src='data:image/jpeg; base64 ," . base64_encode ($ver[2])."'>"?></td>
                                <td><?php echo $ver[3]; ?></td>
                                <td><?php echo $ver[4]; ?></td>
                                <td><?php echo $ver[5]; ?> %</td>
                                <td><?php echo $ver[6]; ?></td>
                                <td><?php echo $ver[7]; ?></td>
                                <td><?php echo $ver[8]; ?></td>
                                <td>
                                    <?php 
                                        if (is_null($ver[10])) {
                                         echo "<button type='button' class='btn btn-primary btn-sm btn-block mb-1' data-toggle='modal' data-target='#id_modal_Detalles'>
                                         <span class='fa fa-plus'></span> Agregar
                                     </button>" ;
                                        } else {
                                          echo  "<ul>
                                                <li>$ver[12]</li>
                                                <li>$ver[13]</li>
                                                <li>$ver[14]</li>
                                                <li>$ver[15]</li>
                                            </ul>" ;
                                        }
                                        
                                    ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_actualizar_producto" onclick="actualizar_registro_producto('<?php echo $ver[0]; ?>')">Editar</button>
                                </td>
                            </tr>
                    <?php
                     }
                    ?>
                    </tbody>
                </table>
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