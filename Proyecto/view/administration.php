<?php session_start(); ?>

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
                            
                            <?php
                            $include = basename(__FILE__, '.php');
                            require_once './menu.php';
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div><!--/header-bottom-->
        </header><!--/header-->



        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <h3>Agregar Producto</h3>
                        <div class="signup-form" style="height: 700px">
                            <form id="form_nuevo_producto" enctype="multipart/form-data">
                                <label>Nombre</label>
                                <input type="text" class="" id="nombre" name="nombre" placeholder="Nombre" autofocus>
                                <label>Descripción</label>
                                <textarea class="" id="descripcion" name="descripcion" rows="5"></textarea>
                                <label>Precio</label>
                                <input type="text" class="" id="precio" name="precio" placeholder="Precio">
                                <label>Referencia</label>
                                <input type="text" class="" id="referencia" name="referencia" placeholder="Referencia">
                                <label>Unidad de vanta</label>
                                <input type="text" class="" id="unidad" name="unidad" placeholder="Unidad de venta">
                                <label>Categoria</label>
                                <input type="text" class="" id="categoria" name="categoria" placeholder="Categoria">
                                <label>Imagen</label>
                                <input type="file" class="" id="imagen" name="imagen">
                                <button type="button" id="btn_agregar" class="btn btn-default">Agregar</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>      <!--    FIN ROW     -->
            </div>          <!-- FIN CONTAINER  -->
        </section>

        <?php
        require_once './footer.php';
        ?>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/price-range.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/main.js"></script>
        <script src="js/utilities.js"></script>
        <script src="js/funciones/administration.js"></script>
    </body>
</html>
