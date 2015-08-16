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

            function cargar() {
                $("#slidercarga").load("index.php");
            }
        </script>
    </head><!--/head-->
        <?php
        require_once './banner.php';
        ?>
    <body id="slidercarga">
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
                                <a href="../controls"
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
                    </div>
                </div>
            </div><!--/header-bottom-->
        </header><!--/header-->

        <section id="slider"><!--slider-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                    </div>
                </div>
            </div>
        </section><!--/slider-->

        <section>
            <div class="container">
                <div class="row">
                    <div id="gmap" class="contact-map">
                        <h2 class="title text-center">Conózcanos</h2>
                        <p><br>
                        Bienvenido a <b>Madessa.co</b>, su sitio web para la compra de productos escolares. En este podrá encontrar útiles escolares de optima calidad a los mejores precios. En la sección Productos, encontrará un catálogo con la descripción detallada de los productos ofrecidos.<br/>
                        <br>para realizar su compra y/o cotización, realice los siguientes pasos:</br>                        
                        <ol type=1>
                          <li>Regístrese o inicie sesión en el sistema.</li><br/>
                            <li>Consulte los productos que desea adquirir y para cada uno de ellos seleccione la opción:  <b>Agregar al carrito</b>. 
                                Cada vez que adicione un producto, podrá visualizar el listado de productos que actualmente tiene en el carrito.</li><br/>
                            <li>Una vez que tenga en el carrito los productos que desea adquirir, verifique su solicitud adicionando o borrando lo 
                                que crea necesario y seleccione la opción  <b>Cotización</b> para descargar un archivo PDF, con la cotización de los productos 
                                que se encuentran en el carrito de compras; o seleccione <b>Orden de compra</b>, para descargar en un archivo PDF 
                                la orden de compra, y solicitar el despacho de la misma, teniendo en cuenta la información proporcionada durante 
                                su registro en el sistema.</li><br/>
                        </ol>
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
