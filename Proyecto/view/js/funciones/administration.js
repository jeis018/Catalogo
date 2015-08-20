function errorNotification(field) {
    $('#' + field).css('border', '1px solid #A41010');
    $('span[data-id = "' + field + '"]').css('display', '');
}


function reset(field) {
    $('span[data-id = "' + field + '"]').css('display', 'none');
    $('#' + field).css('border', '1px solid #A9A9A9');
}


function validate() {
    var bvc = true;
    $('#form_nuevo_producto > input, textarea').each(function () {
        var field = $(this).attr('id');
        var value = $(this).val();
        if (value.trim() === '' && field !== 'imagenUp') {
            errorNotification(field);
            bvc = false;
        }
    });
    return bvc;
}




$('#btn_agregar').click(function () {
    if (validate()) {
        var formData = new FormData($('#form_nuevo_producto')[0]);

        $.ajax({
            url: '../controller/agregarProductos.php',
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos)
            {
                datos = JSON.parse(datos);
                alert(datos['msg']);
                if (datos['estado'] === 1) {
                    $('#form_nuevo_producto').trigger('reset');
                }
            }
        });
    }
});



$('#descripcion').focus(function () {
    $(this).val('');
});


$('#form_nuevo_producto > input, textarea').on('input', function(){
    reset($(this).attr('id'));
});




































//function validateFields() {
//    if ($('#nombre').val().trim() === '') {
//        errorNotification('nombre');
//        return 1;
//    } else {
//        reset('nombre');
//    }
//    if ($('#descripcion').val().trim() === '') {
//        errorNotification('descripcion');
//        return 1;
//    } else {
//        reset('descripcion');
//    }
//    if ($('#precio').val().trim() === '') {
//        errorNotification('precio');
//        return 1;
//    } else {
//        reset('precio');
//    }
//    if ($('#referencia').val().trim() === '') {
//        errorNotification('referencia');
//        return 1;
//    } else {
//        reset('referencia');
//    }
//    if ($('#unidad').val().trim() === '') {
//        errorNotification('unidad');
//        return 1;
//    } else {
//        reset('unidad');
//    }
//    if ($('#categoria').val().trim() === '') {
//        errorNotification('categoria');
//        return 1;
//    } else {
//        reset('categoria');
//    }
//    return 0;
//}