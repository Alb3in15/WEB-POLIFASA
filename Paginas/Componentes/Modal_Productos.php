
     <!-- VENTANA MODAL -->
     <?php 
          require_once("../../php/db.php");
          $conectar = conexion();
     ?>
     <!-- Modal -->
     <div class="modal fade bd-example-modal-lg " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <div class="modal-dialog modal-lg" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Caracteristicas del Producto</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <?php
                        $producto = $_REQUEST['productos'];

                        $sql = "SELECT pro.pro_imagen,pro.id_productos,pro.pro_nombre, pro.pro_precio, pro.pro_desuento, ROUND(sum(pro_precio - (pro_precio * (pro_desuento/100))),2) as PrecioP,pro.pro_descripcion,pro.pro_disponibilidad,de.id_productos, de.cara_uno,de.cara_dos,de.cara_tres,de.cara_cuatro
                        FROM poli_productos pro
                        INNER JOIN poli_pro_carac de  on pro.id_productos = de.id_productos
                        WHERE pro.id_productos='$producto'";



                      $resul = mysqli_query($conectar,$sql);
                      while ($ver= mysqli_fetch_row($resul)) {

               ?>
                     <div class="modal-body">
                         <div class="conatiner">
                             <div class="row h-100">
                                 <div class="col-md-5 h-100">
                                     <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                         <div class="carousel-inner">
                                             <div class="carousel-item active">
                                                <?php echo "<img  class='d-block w-100 img_modal'  src='data:image/jpeg; base64 ," . base64_encode ($ver[0])."'>"?>
                                             </div>
                                         </div>
                                         <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                             <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                             <span class="sr-only">Previous</span>
                                         </a>
                                         <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                             <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                             <span class="sr-only">Next</span>
                                         </a>
                                     </div>
                                 </div>
                                 <div class="col-md-7">
                                     <div class="row mb-1">
                                         <div class="col-sm-12">
                                             <h2 class="text-center"><?php echo $ver[2]; ?></h2>
                                         </div>
                                     </div>
                                     <div class="row mb-1">
                                         <div class="col-sm-11">
                                             <h4>Precio Desde : $ <?php if ($ver[4] !=0){ echo  $ver[5]. "<em class='text-muted h5'> <span><del class='w-50 text-danger'>" ." $". $ver[3];}else { echo $ver[3]; } ?></del></span></em></h4>
                                             <span class="badge <?php if($ver[7] !="Disponible"){ echo 'badge-danger';}else{ echo 'badge-primary';} ?>"> <?php echo $ver[7];?></span>
                                         </div>
                                     </div>
                                     <hr class="border border-danger">
                                     <div class="row mb-1">
                                         <div class="col-12 col-ms-12">
                                             <ul class="lista-productos">
                                                 <li> <i class="fa fa-check text-muted"></i> <?php echo $ver[9]; ?></li>
                                                 <li> <i class="fa fa-check text-muted"></i> <?php echo $ver[10]; ?></li>
                                                 <li> <i class="fa fa-check text-muted"></i> <?php echo $ver[11]; ?></li>
                                                 <li> <i class="fa fa-check text-muted"></i> <?php echo $ver[12]; ?></li>
                                             </ul>
                                         </div>
                                     </div>
                                     <div class="row mb-1">
                                         <div class="col-8 col-sm-12">
                                             <h3>Descripcion del Producto</h3>
                                             <hr class="border border-danger">
                                         </div>
                                     </div>
                                     <div class="row mb-1">
                                         <div class="col-12 col-sm-10">
                                             <p class="leard descripcion"><?php echo $ver[6]; ?></p>
                                         </div>
                                     </div>
                                 </div>
                                 <?php

                               }

                                  ?>
                             </div>
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                         <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                     </div>
                 </div>
             </div>
         </div>
