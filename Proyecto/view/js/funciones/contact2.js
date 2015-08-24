function send(){
    var obj = $('#main-contact-form').serializeForm();
    
    $.ajax({
        url: '../model/contactus/CContactUs.php',
        data: 'peticion=' + JSON.stringify({
            data : obj
        }),
        type: 'POST',
        success: function (response) {      
            response = JSON.parse(response);
            
            if(response === '0'){
                alert('Ha ocurrido un error solicitando la orden de compra, Contacte al administrador');
            }else{
                $('#main-contact-form').trigger('reset');
                alert('Correo enviado exitosamente');
            }
        }
    });
}



$('#main-contact-form').submit(function(e){
    e.preventDefault();
    send();
});


