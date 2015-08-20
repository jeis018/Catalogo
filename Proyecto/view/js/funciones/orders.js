main();


function main(){
    Post('../controller/ctrl_ordenes.php',
    function(){
        var peticion = 'peticion=';
        peticion += JSON.stringify({
            accion : 'buscar'
        });
        return peticion;    
    },function(respuesta){      
        respuesta = JSON.parse(respuesta);      
        cargarPedidos(respuesta);        
    });   
}


function cargarPedidos(datos){
    var temp = _.template($('#temp_lista_ordenes').html());
    $('#listado_ordenes').html(temp({ordenes : datos}));
    
    $('#lista tr button[data-role="atender"]').click(function(){
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
        console.log('reponse: ', respuesta); 
    });
    
    
    location.href="../model/reportsPDF/generarPdf.php?id="+ id;
    
}