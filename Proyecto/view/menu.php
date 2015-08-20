<?php
$includeAux = basename($_SERVER['PHP_SELF']);

$trozos = explode(".", $includeAux);
$cuantos = count($trozos);
$include = $trozos[0];
?>
<div class="mainmenu pull-left">
    <ul class="nav navbar-nav collapse navbar-collapse">
        <li>
            <a <?php echo ($include === 'index') ? 'class="active"' : '' ?> href="index.php">Inicio</a>
        </li>
        <li>
            <a <?php echo ($include === 'shop') ? 'class="active"' : '' ?> href="shop.php?indicator=0" >Productos</a>
        </li>
        <li>
            <a <?php echo ($include === 'contact-us') ? 'class="active"' : '' ?> href="contact-us.php">Contáctenos</a>
        </li>
        <?php
        if (isset($_SESSION["user"])) {
            $user = $_SESSION["user"];
            $userType = $user[1];
            if ($userType == 'A') {
                ?>
                <li class = "dropdown">
                    <a <?php echo ($include === 'orders' || $include === 'administration') ? '' : '' ?> href = "#">
                        Administración<i class = "fa fa-angle-down"></i>
                    </a>
                    <ul role = "menu" class = "sub-menu">
                        <li>
                            <a <?php echo ($include === 'orders') ? 'class="active"' : '' ?> href = "orders.php">Ordenes de Compra</a>
                        </li>
                        <!--<h7 class="h7">Productos</h7>-->
                        <li>
                            <a <?php echo ($include === 'administration') ? 'class="active"' : '' ?> href = "administration.php">Agregar Producto</a>
                        </li>
                        <li>
                            <a <?php echo ($include === 'listaProductos') ? 'class="active"' : '' ?> href = "listaProductos.php">Listar Productos</a>
                        </li>
                    </ul>
                </li>
                <?php
            }
        }
        ?>
    </ul>
</div>

