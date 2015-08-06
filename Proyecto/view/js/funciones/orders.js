main();


function main(){
    Post('../controller/ctrl_ordenes.php',
    function(){
        var peticion = 'peticion=';
        peticion += JSON.stringify({
            accion : 'buscar'
        });
        return peticion;    console.log(peticion)
    },function(respuesta){      console.log('ordenes: ', respuesta)
        respuesta = JSON.parse(respuesta);      
        cargarPedidos(respuesta);        
    });   
}


function cargarPedidos(datos){
    var temp = _.template($('#temp_lista_ordenes').html());
    $('#listado_ordenes').html(temp({ordenes : datos}));
    
    
    $('#lista tr button[data-role="atender"]').click(function(){
        //console.log('id pedido: ', $(this).attr('data-id'));
        var id = $(this).attr('data-id');
        cambiarEstadoPedido(id);
    });
}


function cambiarEstadoPedido(id){
    Post('../controller/ctrl_ordenes.php',
    function(){
        var peticion = 'peticion=';
        peticion += JSON.stringify({
            accion : 'cambiar estado',
            id : id
        });
        return peticion;            
    },function(respuesta){      
        console.log('ordenes cambio estado: ', respuesta); 
    });
}