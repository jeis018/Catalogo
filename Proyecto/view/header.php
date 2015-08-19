<header id="header"><!--header-->
    <?php
    require_once './banner.php';
    ?>
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
                                    echo '<li><a href="../controller/CCloseSession.php"><i class="fa fa-lock"></i> Cerrar sesión</a></li>';
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
                    require_once './menu.php';
                    ?>
                </div>
            </div>      <!--<hr>-->
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->