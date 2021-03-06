<?php
session_start();
require_once ('../model/products/Products.php');

$idProd = $_GET["idProducto"];

$productIns = new Products();
$product = $productIns->getProductById($idProd);
$b = $_SESSION["user"][0];
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Product Details | E-Shopper</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/price-range.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <link href="css/zoomy.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
        <script>var batc="<?php echo $b;?>";</script>
    </head><!--/head-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.js"></script>
    <script src="js/zoomy.min.js"></script>
    <script type="text/javascript" language="javascript">

        $(function () {
            $('.detalleimg').zoomy();
        });
    </script>

    <script type="text/javascript">
        var gaJsHost = (("https:" === document.location.protocol) ? "https://ssl." : "http://www.");
        document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
    </script>

    <script type="text/javascript">
        try {
            var pageTracker = _gat._getTracker("UA-2030729-5");
            pageTracker._initData();
            pageTracker._trackPageview();
        } catch (ex) {
        }
    </script>

    <body>
        <?php
        require_once './header.php';
        ?>

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
                                        <h4 class="panel-title"><a href="shop.php?indicator=11">Corretores</a></h4>
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
                                        <h4 class="panel-title"><a href="shop.php?indicator=3">Lápices de Colores</a></h4>
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
                        <div class="product-details"><!--product-details-->
                            <div class="col-sm-5">
                                <div class="view-product">
                                    <?php
                                    echo '<a href="images/catalogo/' . $product->getNombreImagen() . '" class="detalleimg"><img  src="images/catalogo/' . $product->getNombreImagen() . '" WIDTH=512px HEIGHT=384px  />                                    </a>
';
                                    ?>
                                </div> 
                            </div>
                            <div class="col-sm-7">
                                <div class="product-information"><!--/product-information-->
                                    <?php
                                    echo '<h2>' . $product->getNombre() . ' ' . $product->getDescripcion() . '</h2>';
                                    echo '<p>Referencia: ' . $product->getReferencia() . '</p>';
                                    echo '<span>';
                                    echo '<span>$' . $product->getPrecio() . '</span>';
                                    echo '</span>';
                                    echo '<a onclick="add('.$product->getIdProducto().')"
                                        class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Agregar al carrito</a>';
                                    echo '<p><b>Presentación: </b>' . $product->getUnidadVenta() . '</p>';
                                    ?>
                                </div><!--/product-information-->
                            </div>
                        </div><!--/product-details-->
                    </div>
                </div>
            </div>
        </section>

        
        <div class="msg-add" style="display: none">
            <p>Agregado al carrito</p>
        </div>
        
        
        <?php
        require_once './footer.php';
        ?>



        <script src="js/price-range.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/main.js"></script>
        <script src="js/utilities2.js"></script>
        <script src="js/funciones/addProduct.js"></script>



    </body>
</html>
