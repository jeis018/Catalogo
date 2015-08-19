

main();


function main() {
    Post('../controller/CListarProductos.php',
            function () {
                var peticion = 'peticion=';
                peticion += JSON.stringify({
                    accion: 'buscar'
                });
                return peticion;
            }, function (response) {
        response = JSON.parse(response);
        setVistaProductos(response);
    });
}


function setVistaProductos(data) {
    var temp = _.template($('#temp_lista_Productos').html());
    $('#lista_productos').html(temp({
        productos: data
    }));

    //  EVENTOS
    $('#lista_productos tr button[data-role="delete"]').click(function () {
        var objProduct = {};
        objProduct.id = $(this).attr("data-id");
        objProduct.nombreImg = $(this).attr("data-nombreImg");
        
        deleteProduct(objProduct);
    });
}

function deleteProduct(objProduct) {
    Post('../controller/CListarProductos.php',
        function () {
            var peticion = 'peticion=';
            peticion += JSON.stringify({
                accion: 'borrar',
                parametros: objProduct
            });
            return peticion;
        }, function (response) {   
            response = JSON.parse(response);
            if (response == 1) {
                alert("El producto se eliminó correctamente !!");
                main();
            } else if (response == 0) {
                alert("ERROR: El producto no se eliminó. ")
            }
        });
}






$('#search').keyup(function () {
    var regex = new RegExp($(this).val().trim(), 'i');
    $('#lista_productos tr').each(function () {
        if (regex.test($(this).find('td').html()) || regex.test($(this).find('td').eq(3).html()) || regex.test($(this).find('td').eq(5).html())) {
            $(this).css('display', '');
        } else {
            $(this).css('display', 'none');
        }
    });
});