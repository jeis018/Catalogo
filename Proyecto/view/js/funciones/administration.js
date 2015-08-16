function validateFields(){
    if($('#nombre').val().trim() == ''){
        errorNotification('nombre');
        return 1;
    } else {
        reset('nombre'); 
    }
    if($('#descripcion').val().trim() == ''){
        errorNotification('descripcion');
        return 1;
    } else {
        reset('descripcion');
    }
    if($('#precio').val().trim() == ''){
        errorNotification('precio');
        return 1;
    } else {
        reset('precio');
    }
    if($('#referencia').val().trim() == ''){
        errorNotification('referencia');
        return 1;
    }else {
        reset('referencia');
    }
    if($('#unidad').val().trim() == ''){
        errorNotification('unidad');
        return 1;
    }else {
        reset('unidad');
    }
    if($('#categoria').val().trim() == ''){
        errorNotification('categoria');
        return 1;
    }else {
        reset('categoria');
    }
    return 0;
}

function errorNotification(field){
    $('#' + field).css('border', '1px solid #A41010');
    $('span[data-id = "' + field + '"]').css('display', '');
}

function reset(field){
    $('#' + field).focus(function(){
        $('span[data-id = "' + field + '"]').css('display', 'none');
        $('#' + field).css('border', '1px solid #A9A9A9');
    });
}

//===============================================
//      EVENTOS
//===============================================



$('#btn_agregar').click(function () {
    if(validateFields() == 0){
        var formData =  new FormData($('#form_nuevo_producto')[0]);
        console.log('form data - ', formData)
    
        $.ajax({
            url: '../controller/agregarProductos.php',
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos)   
            {                           
                console.log(datos)
                datos = JSON.parse(datos);
                alert(datos['msg']);
                if(datos['estado'] === 1){
                    $('#form_nuevo_producto').trigger('reset');                
                }
            }
        });
    }
});



$('#descripcion').focus(function(){
    $(this).val(''); 
});