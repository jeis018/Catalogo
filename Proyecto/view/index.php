<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
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
    </head><!--/head-->
    <body>
        <?php
        require_once './header.php';
        ?>

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
