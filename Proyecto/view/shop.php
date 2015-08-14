<?php
session_start();
require_once ('../model/products/Products.php');
require_once ('../lib/Zebra_Pagination.php');

$indicatorCategory = $_GET["indicator"];

$product = new Products();
$zebraPage = new Zebra_Pagination();

$productsPerPage = 12;
$limit = ($zebraPage->get_page() - 1) * $productsPerPage;

$regProducts = $product->loadProducts($limit, $productsPerPage, $indicatorCategory);
$totalProducts = $product->totalRows($indicatorCategory);

$zebraPage->records($totalProducts);
$zebraPage->records_per_page($productsPerPage);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Shop | Masessa</title>
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
    <?php
        require_once './banner.php';
        ?>
    <body>
        <header id="header"><!--header-->
            <div class="header-middle"><!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
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
                            
                            <?php
                            $include = basename(__FILE__, '.php');
                            require_once './menu.php';
                            ?>
                            
                        </div>
                    </div>      <!--<hr>-->
                </div>
            </div><!--/header-bottom-->
        </header><!--/header-->

        <section id="advertisement">
<!--            <div class="container">
                <img src="images/shop/advertisement.jpg" alt="" />
            </div>-->
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Categorías</h2>
                            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="shop.php?indicator=1">Bolígrafos</a></h4>
                                    </div>
                                </div>
                                   <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="shop.php?indicator=6">Compas</a></h4>
                                    </div>
                                </div>
                                 <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="shop.php?indicator=15">Tajalápiz</a></h4>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="shop.php?indicator=8">Pegantes</a></h4>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="shop.php?indicator=11">Corretor</a></h4>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="shop.php?indicator=9">Portaminas</a></h4>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="shop.php?indicator=13">Marcador</a></h4>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="shop.php?indicator=10">Resaltadores</a></h4>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="shop.php?indicator=12">Tijeras</a></h4>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="shop.php?indicator=7">Lápices </a></h4>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="shop.php?indicator=3">Lápices de colores</a></h4>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="shop.php?indicator=2">Borradores</a></h4>
                                    </div>
                                </div>                               
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="shop.php?indicator=4">Carpetas</a></h4>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="shop.php?indicator=5">Cintas Decorativas</a></h4>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="shop.php?indicator=14">Kits de Variedades</a></h4>
                                    </div>
                                </div>
                            </div><!--/category-productsr-->
                        </div>
                    </div>

                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                            <?php
                            if ($indicatorCategory == 0) {
                                echo '<h2 class="title text-center">Productos</h2>';
                            } else {
                                echo '<h2 class = "title text-center">Productos - ' . $regProducts[0]["Categoria"] . '</h2>';
                            }
                            if (isset($regProducts)) {
                                for ($i = 0; $i < count($regProducts); $i++) {
                                    $img = $regProducts[$i]["NombreImagen"];
                                    ?>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <?php
                                                    echo '<tr>';
                                                    echo '<img src="images/catalogo/' . $img . '" alt="Imagen" WIDTH=338px HEIGHT=254px />';
                                                    echo '<h2>$' . $regProducts[$i]["Precio"] . '</h2>';
                                                    echo '<p>' . $regProducts[$i]["Nombre"] . '</p>';
                                                    echo '</tr>';
                                                    echo '<a href="' . $regProducts[$i]["idProducto"] . '" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Agregar al carrito</a>';
                                                    ?>
                                                </div>
                                                <div class="product-overlay">
                                                    <div class="overlay-content">
                                                        <?php
                                                        echo '<h2>$' . $regProducts[$i]["Precio"] . '</h2>';
                                                        echo '<p>' . $regProducts[$i]["Nombre"] . '</p>';
                                                        echo '<a href="cart.php?idProducto=' . $regProducts[$i]["idProducto"] . '" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Agregar al carrito</a>';
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="choose">
                                                <ul class="nav nav-pills nav-justified">
                                                    <?php
                                                    echo '<li><a href=product-details.php?idProducto="' . $regProducts[$i]["idProducto"] . '"><i class="fa fa-plus-square"></i>Consultar detalle</a></li>';
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>   


                        </div><!--features_items-->
                    </div>

                </div>

            </div>   
            <center>
                <?php
                echo '<ul class="pagination">';
                $zebraPage->render();
                echo '</ul>';
                ?>
            </center>

        </section>

        <?php
        require_once './footer.php';
        ?>


        <script src="js/jquery.js"></script>
        <script src="js/price-range.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
