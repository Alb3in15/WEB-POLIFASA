function preguntarSiNo(id){
	alertify.confirm('Eliminar imagen', 'Desea Eliminar esta imagen?...',
										function() { eliminarimgSlider(id) }
	                , function(){ alertify.error('Accion Cancelada')});

}

function eliminarimgSlider(id){
	cadena= "id=" + id;
			$.ajax({
					type: "POST",
					url:"../php/F_imagen/eliminar_imgSlider.php",
					data: cadena,
					success:function(r){
						if(r==0){
								alertify.error("Fallo el Servidor :( )");
						}else{
                            //alert(r);
                            alertify.success("Los Datos an sido Eliminado :) ");
                            window.location.href='Home.php';
						}
					}
			});
}
function updateSliderImg(matrizImagen){
	d=matrizImagen.split('||');
	$('#id_update_img').val(d[0]);
	$('#up_titulo_img').val(d[1]);
    $('#up_tipo_img').val(d[2]);
}

/*FUNCION PARA AGREGAR LOS DATOS DE PRODUCTOS */
function agregarProductos(Select_Cproducto,txt_producto,txt_precio,txt_descuento,Select_disponibilidad,txt_fecha,txt_descripcion,imagen_pro){
    cadena= "Select_Cproducto=" + Select_Cproducto +
                "&txt_producto=" + txt_producto +
                "&txt_precio=" + txt_precio+
                "&txt_descuento=" + txt_descuento+
                "&Select_disponibilidad=" + Select_disponibilidad+
                "&txt_fecha=" + txt_fecha +
                "&txt_descripcion=" + txt_descripcion +
                "&imagen_pro=" + imagen_pro;
            if(Select_Cproducto.length=="" || txt_producto.length=="" || txt_precio.length=="" || txt_descuento.length=="" || Select_disponibilidad.length=="" || txt_fecha.length=="" || txt_descripcion.length=="" || imagen_pro.length=="")
            {
                 alertify.error("Campos vacios debes rellenarlos");
                 return false;
                }
    $.ajax({
            type:"POST",
            url:"../php/Agregar_productos.php",
            data: cadena,
            success:function(r){
                if(r==0){
                    alertify.error("Fallo el Servidor :( ");
                }else{
					alert(r)
                    alertify.success("Se agrego un Nuevo Prodcuto :)");
                }
              }
           });
}
function agregarCategoria(txt_categoria){
	cadena="txt_categoria="+ txt_categoria;
	if( txt_categoria.length=="" )
            {
                 alertify.error("Campos vacios debes rellenarlos");
                 return false;
                }
    $.ajax({
            type:"POST",
            url:"../php/Agregar_Categoria.php",
            data: cadena,
            success:function(r){
                if(r==0){
                    alertify.error("Fallo el Servidor :( ");
                }else{
					alert("Se agrego una Nueva Categoria :)");
                    //alertify.success("Se agrego una Nueva Categoria :)");
                    window.location.href='Home.php';
                    //alertify.alert('Mensaje deConfirmacion', 'Se agrego una Nueva Categoria 😊!', function(){ alertify.success('Ok'); });
                }
              }
           });
}

/* AGREGAR DATOS A LA TABLA DETALLES */
function agregarDetallePro(Select_pro_detalles,txt_cara_uno,txt_cara_dos,txt_cara_tres,txt_cara_cuatro){
    cadena="Select_pro_detalles="+ Select_pro_detalles+
            "&txt_cara_uno=" + txt_cara_uno +
            "&txt_cara_dos=" + txt_cara_dos+
            "&txt_cara_tres=" + txt_cara_tres+
            "&txt_cara_cuatro=" + txt_cara_cuatro;

	if( Select_pro_detalles.length=="" || txt_cara_uno.length=="" || txt_cara_dos.length=="" || txt_cara_tres.length=="" || txt_cara_cuatro.length==""  )
            {
                 alertify.error("Campos vacios debes rellenarlos");
                 return false;
                }
    $.ajax({
            type:"POST",
            url:"../php/Agregar_detalles.php",
            data: cadena,
            success:function(r){
                if(r==0){
                    alertify.error("Fallo el Servidor :( ");
                }else{
                    alertify.success("Se agregaron los detalles :)");
                }
              }
           });
}
