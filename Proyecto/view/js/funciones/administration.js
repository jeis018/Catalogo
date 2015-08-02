









//===============================================
//      EVENTOS
//===============================================


$('#btn_agregar').click(function () {
    
    var formData =  new FormData($('#form_nuevo_producto')[0]);
    
    $.ajax({
        url: '../controller/agregarProductos.php',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos)   
        {                           console.log(datos)
            datos = JSON.parse(datos);
            
            alert(datos['msg']);
            
            if(datos['estado'] === 1){
                $('#form_nuevo_producto').trigger('reset');                
            }
        }

    });
    
});



$('#descripcion').focus(function(){
   $(this).val(''); 
});