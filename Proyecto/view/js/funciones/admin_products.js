

main();


function main(){
    Post('../controller/CListarProductos.php',
        function(){
            var peticion = 'peticion=';
            peticion += JSON.stringify({
                accion : 'buscar'
            });
            return peticion;
        },function(response){
            response = JSON.parse(response);
            setVistaProductos(response);
        });
}


function setVistaProductos(data){
    var temp = _.template($('#temp_lista_Productos').html());
    $('#lista_productos').html(temp({
        productos : data
    }));
    
    //  EVENTOS
    $('#lista_productos tr button[data-role="delete"]').click(function(){
        var objProduct = {};
        objProduct.id = $(this).attr("data-id");
        objProduct.nombreImg = $(this).attr("data-nombreImg");
    });
}

function deleteProduct(objProduct){
    Post('../controller/CListarProductos.php',
        function(){
            var peticion = 'peticion=';
            peticion += JSON.stringify({
                accion : 'borrar',
                parametros : objProduct
            });
            return peticion;
        },function(response){
            response = JSON.parse(response);
            if(response == 1){
                alert("El producto se eliminó correctamente !!");
                main();
            }else if(response== 0){
                alert("ERROR: El producto no se eliminó. ")
            }
        });
}