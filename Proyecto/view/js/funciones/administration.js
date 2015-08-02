









//===============================================
//      EVENTOS
//===============================================


$('#btn_agregar').click(function () {

    var producto = $('#form_nuevo_producto').serializeForm();
    var formData;
    
    if($('#imagen').val() !== ""){
        formData = new FormData($('#form_nuevo_producto')[0]);      //console.log(formData);        
        //producto.imagen = formData;
    }else{
        //producto.imagen = '';        
    }
    
    
    if(producto.nombre === "" || producto.precio === "" || producto.unidad === ""){
        alert('Los campos de nombre, precio y unidad de venta, son obligatorios ');
        return;
    }

    
    console.log(producto);
    
    
    var peticion = 'peticion=';
    peticion += JSON.stringify({datos : producto});
    
    console.log(peticion)
    
    $.ajax({
        url: '../controller/agregarProductos.php',
        type: "POST",
        data: peticion,
        /*contentType: false,
        processData: false,*/
        success: function (datos)
        {
            alert(datos);
        }

    });
});



$('#descripcion').focus(function(){
   $(this).val(''); 
});