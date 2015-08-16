

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
        console.log(response)
    });
}