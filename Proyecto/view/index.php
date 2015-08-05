<?php
session_start();

require_once ('../model/products/Products.php');
$randomProduct = new Products();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Home | Madessa</title>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <link> 
        <script type="text/javascript">   
//        $(document).ready(function(){
//        setInterval(cargar,8000);
//        });

        function cargar(){
        $("#slidercarga").load("index.php");
        }
        </script>
    </head><!--/head-->

    <body id="slidercarga">
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
                                   // if (isset($_SESSION["logedOn"])) {
                                        $logedOn = $_SESSION["logedOn"];
                                        if ($logedOn == FALSE) {
                                            echo '<li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>';
                                        } else {
                                            echo '<li><a href="login.php"><i class="fa fa-lock"></i> Cerrar sesión</a></li>';
                                        }
                                    //}
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
                                    if (isset($_SESSION["userType"])) {
                                        $userType = $_SESSION["userType"];
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

        <section id="slider"><!--slider-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#slider-carousel" data-slide-to="1"></li>
                                <li data-target="#slider-carousel" data-slide-to="2"></li>
                            </ol>

                            <div class="carousel-inner" >
                                <div class="item active">
                                    <div class="col-sm-6">
                                        <h1><span>E</span>-SHOPPER</h1>
                                        <h2>Free E-Commerce Template</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                        <button type="button" class="btn btn-default get">Get it now</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="images/home/pricing.png"  class="pricing" alt="" />
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-sm-6">
                                        <h1><span>E</span>-SHOPPER</h1>
                                        <h2>100% Responsive Design</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                        <button type="button" class="btn btn-default get">Get it now</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
                                        <img src="images/home/pricing.png"  class="pricing" alt="" />
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="col-sm-6">
                                        <h1><span>E</span>-SHOPPER</h1>
                                        <h2>Free Ecommerce Template</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                        <button type="button" class="btn btn-default get">Get it now</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
                                        <img src="images/home/pricing.png" class="pricing" alt="" />
                                    </div>
                                </div>

                            </div>

                            <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </section><!--/slider-->

        <section>
            <div class="container">
                <div class="row">
                    <div id="gmap" class="contact-map">
                        <h2 class="title text-center">Conózcanos</h2>
                        Bienvenido a <b>Madessa.com</b>, un sitio web para la compra de productos escolares. En este sitio podrá encontrar los productos de la 
                        mejor calidad a los mejores precios. En la sección <b>Productos</b>, encontrará un catálogo detallado de los productos que ofrecemos. 
                        En este catálogo podrá realizar la consulta detallada de cada producto, y consultar por categoría los mismos. 
                        Realizar una compra, consiste en tres sencillos pasos.<br/><br/>
                        <ol type=1>
                            <li>Regístrese o inicie sesión en el sistema.</li><br/>
                            <li>Consulte el o los productos que desea adquirir y para cada uno de ellos seleccione la opción: <b>Agregar al carrito</b>. 
                                Cada vez que adicione un producto, podrá visualizar el listado de productos que actualmente tiene en el carrito.</li><br/>
                            <li>Solicitar la orden de compra. Una vez que tenga en el carrito los productos que desea adquirir, revise la cantidad de cada uno, 
                                para el pedido, y seleccione cualquiera de las dos opciones; <b>Cotización</b>, para descargar un archivo PDF, con la cotización 
                                de los productos que se encuentran en el carrito de compras. <b>Orden de compra</b>, para descargar en un archivo PDF la factura 
                                de la compra, y solicitar el despacho de la misma, que será enviada en los próximos dos días hábiles, teniendo en cuenta la información 
                                proporcionada durante su registro en el sistema.</li><br/>
                        </ol>
                    </div>
                    
                    <div id="gmap">
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">Algunos productos</h2>
                            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                                                           
                                <div class="carousel-inner" style="alignment-adjust: central; margin-left: 350px;">
                                    
                                    <div class="item active">	
                                        <div class="col-sm-4">
                                  
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <?php 
                                                            $total = "134"; // Numero total de imagenes 
                                                            $extension = ".png"; // Definimos la extension, puede ser .jpg, gif, bmp, etc. 
                                                            $carpeta = "images/catalogo/"; //Carpeta con las imagenes 
                                                            // De aqui para abajo no es necesario modificar nada    
                                                            $random = mt_rand(1, $total);
                                                            $products= $randomProduct->getProductById($random);
                                                            echo '<img src="images/catalogo/'.$products->getNombreImagen().'" border="0" WIDTH=130 HEIGHT=350>'; ?> 
                                                            <?php echo $products->getNombre(); ?></p>
                                                            <?php echo '<a href="cart.php?idProducto=' . $products->getIdProducto() . '" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Agregar al carrito</a>'; ?>;
                                                           
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">	
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <?php 
                                                            $total = "134"; // Numero total de imagenes 
                                                            $extension = ".png"; // Definimos la extension, puede ser .jpg, gif, bmp, etc. 
                                                            $carpeta = "images/catalogo/"; //Carpeta con las imagenes 
                                                            // De aqui para abajo no es necesario modificar nada    
                                                            $random = mt_rand(1, $total);
                                                            $products= $randomProduct->getProductById($random);
                                                            echo '<img src="images/catalogo/'.$products->getNombreImagen().'" border="0" WIDTH=130 HEIGHT=350>'; ?> 
                                                            <?php echo $products->getNombre(); ?></p>
                                                            <?php echo '<a href="cart.php?idProducto=' . $products->getIdProducto() . '" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Agregar al carrito</a>'; ?>;
                                                           
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">	
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <?php 
                                                            $total = "134"; // Numero total de imagenes 
                                                            $extension = ".png"; // Definimos la extension, puede ser .jpg, gif, bmp, etc. 
                                                            $carpeta = "images/catalogo/"; //Carpeta con las imagenes 
                                                            // De aqui para abajo no es necesario modificar nada    
                                                            $random = mt_rand(1, $total);
                                                            $products= $randomProduct->getProductById($random);
                                                           
                                                           echo '<img src="images/catalogo/'.$products->getNombreImagen().'" border="0" WIDTH=130 HEIGHT=350>'; ?> 
                                                            <?php echo $products->getNombre(); ?></p>
                                                            <?php echo '<a href="cart.php?idProducto=' . $products->getIdProducto() . '" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Agregar al carrito</a>'; ?>;
                                                           
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </center>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev" onclick="javascript:cargar();">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next" onclick="javascript:cargar();">
                                    <i class="fa fa-angle-right"></i>
                                </a>			
                            </div>
                        </div><!--/recommended_items-->
                    </div>
                    </center>
                </div>
            </div>
            <?php
            require_once './footer.php';
            ?>
        </section>

        

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/price-range.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
