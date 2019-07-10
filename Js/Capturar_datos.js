/*  $(document).ready(function(){
    $('#btn_AgregarProductos').click(function(){
          Select_Cproducto= $('#Select_Cproducto').val();
          txt_producto= $('#txt_producto').val();
          txt_precio= $('#txt_precio').val();
          txt_descuento= $('#txt_descuento').val();
          Select_disponibilidad= $('#Select_disponibilidad').val();
          txt_fecha= $('#txt_fecha').val();
          txt_descripcion= $('#txt_descripcion').val();
          imagen_pro= $('#imagen_pro').val();

          agregarProductos(Select_Cproducto,txt_producto,txt_precio,txt_descuento,Select_disponibilidad,txt_fecha,txt_descripcion,imagen_pro);
    });
  });  */

  $(document).ready(function(){
    $('#btn_Agregar_Categoria').click(function(){
        txt_categoria= $('#txt_categoria').val();
          agregarCategoria(txt_categoria);
    });
  });

  $(document).ready(function(){
    $('#btn_Agregar_DetallesPro').click(function(){
      Select_pro_detalles= $('#Select_pro_detalles').val();
      txt_cara_uno= $('#txt_cara_uno').val();
      txt_cara_dos= $('#txt_cara_dos').val();
      txt_cara_tres= $('#txt_cara_tres').val();
      txt_cara_cuatro= $('#txt_cara_cuatro').val();

      agregarDetallePro(Select_pro_detalles,txt_cara_uno,txt_cara_dos,txt_cara_tres,txt_cara_cuatro);
    });
  });
  function Captura_id_producto(id){
    var ruta = 'Componentes/Modal_Productos.php?productos=' + id;
    $.get(ruta, function(data){
      $('#Mymodal_productos').html(data);
      $('#exampleModal').modal('show');
    });
  }