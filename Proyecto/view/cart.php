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
<html lang="en">
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
    </head><!--/head-->

    <body>
        <header id="header"><!--header-->
            <div class="header-middle"><!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                <a href="index.php"><img src="images/home/logo.png" alt="" /></a>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Carrito</a></li>
                                    <?php
                                    if (isset($_SESSION["logedOn"])) {
                                        $logedOn = $_SESSION["logedOn"];
                                        if ($logedOn == FALSE) {
                                            echo '<li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>';
                                        } else {
                                            echo '<li><a href="login.php"><i class="fa fa-lock"></i> Cerrar sesión</a></li>';
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-middle-->

            <div class="header-bottom"><!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li><a href="index.php" class="active">Inicio</a></li>
                                    <li><a href="shop.php?indicator=0" >Productos</a></li>
                                    <li><a href="contact-us.php">Contáctenos</a></li>
                                    <?php
                                    if (isset($_SESSION["user"])) {
                                        $user = $_SESSION["user"];
                                        $userType = $user[1];
                                        if ($userType == 'A') {
                                            echo
                                            '<li class = "dropdown"><a href = "#">Administración<i class = "fa fa-angle-down"></i></a>
                                            <ul role = "menu" class = "sub-menu">
                                            <li><a href = "orders.php">Ordenes de Compra</a></li>
                                            <li><a href = "administration.php">Agregar Productos</a></li>
                                            </ul>
                                            </li>';
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-bottom-->
        </header><!--/header-->

        <section id="cart_items">
            <div class="container">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Inicio</a></li>
                        <li class="active">Carrito</li>
                    </ol>
                </div>
                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="description">Descripción</td>
                                <td class="price">Precio</td>
                                <td class="quantity">Cantidad</td>
                                <td class="total">Total</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($carProducts)) {
                                require_once ('../model/products/Products.php');
                                $productMaster = new Products();
                                $totalOrder = 0;
                                for ($i = 0; $i < count($carProducts); $i++) {
                                    if ($carProducts[$i] != 0) {
                                        $product = $productMaster->getProductById($carProducts[$i]);
                                        ?>
                                        <tr>
                                            <td class="cart_description">
                                                <h4><a href=""><?php echo $product->getNombre() . ' ' . $product->getDescripcion(); ?></a></h4>
                                                <p>Referencia: <?php echo $product->getReferencia(); ?></p>
                                            </td>
                                            <td class="cart_price">
                                                <p>$<?php echo $product->getPrecio(); ?></p>
                                            </td>
                                            <td class="cart_quantity">
                                                <div class="cart_quantity_button">
                                                    <a class="cart_quantity_up" href=""> + </a>
                                                    <input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
                                                    <a class="cart_quantity_down" href=""> - </a>
                                                </div>
                                            </td>
                                            <td class="cart_total">
                                                <p class="cart_total_price">$<?php echo $product->getPrecio(); ?></p>
                                            </td>
                                            <td class="cart_delete">
                                                <?php echo '<a class="cart_quantity_delete" href="cart.php?idProducto=' . $product->getIdProducto() . '&operation=1"><i class="fa fa-times"></i></a>'; ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $totalOrder+=$product->getPrecio();
                                    }
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
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
                                <?php
                                $iva = ($totalOrder * 0.16);
                                $subTotal = $totalOrder - $iva;
                                ?>
                                <li>Subtotal de productos en el carrito<span>$<?php echo $subTotal; ?></span></li>
                                <li>Iva <span>$<?php echo $iva; ?></span></li>
                                <li>Costos de entrega<span>Gratis</span></li>
                                <li>Total <span>$<?php echo $totalOrder; ?></span></li>
                            </ul>
                            <?php
                            $productsString = "";
                            for ($i = 0; $i < count($carProducts); $i++) {
                                $productsString .= $carProducts[$i] . "-";
                            }

                            echo '<a class="btn btn-default update" href="../controller/CCart.php?orderType=1&totalPedido=' . $totalOrder . '&products=' . $productsString . '">Cotización</a>';
                            echo '<a class="btn btn-default check_out" href="../controller/CCart.php?orderType=2&totalPedido="' . $totalOrder . '&products=' . $productsString . '">Orden de compra</a>';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--/#do_action-->

        <?php
        require_once './footer.php';
        ?>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
