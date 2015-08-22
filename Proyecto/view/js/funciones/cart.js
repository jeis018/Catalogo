var list;
var listProducts;
var total = 0;


main();


function main(){
    list = JSON.parse(sessionStorage.getItem('list'));
    loadProducts();
}


function loadProducts() {
    $.ajax({
        url: '../controller/COrderCart.php',
        data: 'peticion=' + JSON.stringify({
            data : list
        }),
        type: 'POST',
        success: function (response) {
            response = JSON.parse(response);
            if(_.size(response) >=  1){
                $('#removeAll').css('display', 'block');
            }else{
                $('#removeAll').css('display', 'none');
            }
            setProducts(response);
            setListProducts(response);
        },
        error: function (xhr, status) {
            alert('Error! No se cargaron los productos correctamente');
        }
    });
}


function setProducts(data){
    listProducts = data;
}


function setListProducts(data){
    var temp = _.template($('#temp_list').html());
    $('#list_products').html(temp({products : data}));
    calcular_total();
    
    $('#list_products tr button[data-role="up"]').click(function(){
        var id = $(this).attr('data-id');
        var precio = parseInt($(this).attr('data-precio'));
        var inp = $(this).parent().find("input[name='quantity']");
        var cant = parseInt(inp.val()) + 1;
        inp.val(cant);
        var act = cant * precio;
        $(this).parent().parent().parent().find("td[class='cart_total']").children().text(accounting.formatMoney(act));
        
        recalcular(id, act);
    });
    
    $('#list_products tr button[data-role="down"]').click(function(){
        var id = $(this).attr('data-id');
        var precio = parseInt($(this).attr('data-precio'));
        var ptot = parseInt($(this).parent().parent().parent().find("td[class='cart_total']").children().text().replace('$','').replace(',',''));
        var inp = $(this).parent().find("input[name='quantity']");
        var cant = parseInt(inp.val()) - 1;
        
        if(cant > 0){
            inp.val(cant);
            var act = ptot - precio;
            $(this).parent().parent().parent().find("td[class='cart_total']").children().text(accounting.formatMoney(act));

            recalcular(id, act);
        }
    });
    
    $('#list_products tr button[data-role="delete"]').click(function(){
        var id = $(this).attr('data-id');
        quitar(id);
    });
}


function calcular_total(){
    total = 0;
    _.each(listProducts, function(i){
        total += parseInt(i.precio_total);
    });
    
    $('#totalCompra').text(accounting.formatMoney(total));
}


function recalcular(id, precioAc){
    var obj = _.findWhere(listProducts, {id: id});
    obj.precio_total = ''+precioAc;
    
    calcular_total();
}


function quitar(id){
    list = _.without(list, _.findWhere(list, id));
    sessionStorage.setItem('list', JSON.stringify(list));
    
    listProducts = _.without(listProducts, _.findWhere(listProducts, {id : id}));    
    setListProducts(listProducts);
}


function insertOrden(i, t, l){      
    $.ajax({
        url: '../controller/CCart.php',
        data: 'peticion=' + JSON.stringify({
            type : i,
            total : t,
            data : l
        }),
        type: 'POST',
        success: function (response) {
            response = JSON.parse(response);
            if(i === 1){
                location.href='../model/reportsPDF/generarPdf.php?id='+response;
            }else{
                //location.href='../controller/CCart.php?orderType=2&totalPedido='+total+'&products='+getProducts(); 
            }
        }
    });
}


function remove_data(){
    sessionStorage.removeItem('list');
    $('#removeAll').css('display', 'none');
}



$('#contizar').click(function(){
    if(total > 0){
        insertOrden(1, total, list);
    }else{
        alert('No hay productos en la lista');
    }
});


$('#ordenCompra').click(function(){
    if(total > 0){
        insertOrden(2, total, list);
        remove_data();
    }else{
        alert('No hay productos en la lista');
    }
});


$('#removeAll').click(function(){
    remove_data();
    location.href='shop.php?indicator=0';
});

