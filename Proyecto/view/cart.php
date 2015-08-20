<?php
session_start();
require_once ('../model/cart/Cart.php');
$cart = new Cart();
if (isset($_SESSION["logedOn"])) {
    $logedOn = $_SESSION["logedOn"];
    if ($logedOn == FALSE) {
        echo "<script type=\"text/javascript\">alert('Por favor inicie sesión para adicionar productos al carrito.!'); javascript:window.history.back();</script>";
    } else {
        if (isset($_GET["idProducto"])) {
            $idProd = $_GET["idProducto"];
        } else {
            $idProd = 0;
        }
        if (isset($_GET["operation"])) {
            $operation = $_GET["operation"];
        } else {
            $operation = 0;
        }
        $carProducts = $_SESSION["carProducts"];
        if ($operation == 0) {
            if ($cart->validateExistence($carProducts, $idProd) == 0) {
                $carProducts[] = $idProd;
                $_SESSION["carProducts"] = $carProducts;
            }
        } else {
            for ($i = 0; $i < count($carProducts); $i++) {
                echo $carProducts[$i] . '==' . $idProd . "?";
                if ($carProducts[$i] == $idProd) {
                    $carProducts[$i] = 0;
                    break;
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Cart | Madessa</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/price-range.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
        
        <script src="js/utilidad3.js"></script>
        <script>
            accounting.settings = {
                    currency: {
                            symbol : "$",   // default currency symbol is '$'
                            format: "%s%v", // controls output: %s = symbol, %v = value/number (can be object: see below)
                            decimal : ".",  // decimal point separator
                            thousand: ",",  // thousands separator
                            precision : 0   // decimal places
                    },
                    number: {
                            precision : 0,  // default precision on numbers is 0
                            thousand: ",",
                            decimal : "."
                    }
            }
        </script>
    </head><!--/head-->
    <body>
        <?php
        require_once './header.php';
        ?>

        <section id="cart_items">
            <div class="container">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Inicio</a></li>
                        <li class="active">Carrito</li>
                    </ol>
                </div>
                <!--<div  style="height: 330px; overflow-y: auto; margin-bottom: 50px">-->
                    <div class="cart_info" style="/*width: 98%*/">
                        <table class="table table-condensed table-responsive">
                            <thead>
                                <tr class="cart_menu">
                                    <td class="description">Descripción</td>
                                    <td class="price">Precio</td>
                                    <td class="quantity">Cantidad</td>
                                    <td class="total">Total</td>
                                    <td></td>
                                </tr>
                            </thead> 
                            <tbody id="list_products">

                            </tbody>
                        </table>
                    </div>
                <!--</div>-->
            </div>
        </section> <!--/#cart_items-->

        <section id="do_action">
            <div class="container">
                <div class="heading">
                    <h3>¿Que desea hacer ahora?</h3>
                    <p>A continuación se presenta la información de 
                        su pedido total, por favor seleccione que desea 
                        realizar. Recuerde que si selecciona la orden de 
                        compra, el plazo máximo de entrega de su pedido es de 3 días.</p>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="total_area">
                            <ul>                                
                                <li>Costos de entrega<span>Gratis</span></li>
                                <li>Total <span id="totalCompra"></span></li>
                            </ul>
                            <?php
                            /*$productsString = "";
                            for ($i = 0; $i < count($carProducts); $i++) {
                                $productsString .= $carProducts[$i] . "-";
                            }
                            echo '<a class="btn btn-default update" href="../controller/CCart.php?orderType=1&totalPedido=' . $totalOrder . '&products=' . $productsString . '">Cotización</a>';
                            echo '<a class="btn btn-default check_out" href="../controller/CCart.php?orderType=2&totalPedido=' . $totalOrder . '&products=' . $productsString . '">Orden de compra</a>';
                            */?>
                            <a class="btn btn-default update" id="contizar">Cotización</a>
                            <a class="btn btn-default check_out" id="ordenCompra">Orden de compra</a>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--/#do_action-->

        <?php
        require_once './footer.php';
        ?>
        
        
        <script type="text/template" id="temp_list">
            <%_.each(products, function(product){%>
                <tr>
                    <td class="cart_description">
                        <h4><%-product.nombre%></h4>
                        <p>Referencia: <%-product.referencia%></p>
                    </td>
                    <td class="cart_price">
                        <p><%-accounting.formatMoney(product.precio)%></p>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">
                            <button type="button" class="cart_quantity_up btn_acc pull-left" data-role="up" data-id="<%-product.id%>" data-precio="<%-product.precio%>"> + </button>
                            <input class="cart_quantity_input" type="text" name="quantity" value="<%-product.cant%>" autocomplete="off" size="2">
                            <button type="button" class="cart_quantity_down btn_acc" data-role="down" data-id="<%-product.id%>" data-precio="<%-product.precio%>"> - </button>
                        </div>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price"><%-accounting.formatMoney(product.precio_total)%></p>
                    </td>
                    <td class="cart_delete">
                        <button type="button" class="btn btn-danger btn-sm" data-role="delete" data-id="<%-product.id%>">Borrar</borrar>
                    </td>
                </tr>
            <%});%>
        </script>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/main.js"></script>
        <script src="js/utilities2.js"></script>
        <script src="js/funciones/cart.js"></script>
    </body>
</html>
