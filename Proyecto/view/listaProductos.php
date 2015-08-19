<?php session_start(); ?>

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
    </head><!--/head-->
    
    <body>
        <?php require_once './header.php';?>
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3>Listado</h3>
                            </div>
                            <div class="panel-body" style="height: 800px; overflow-y: auto">
                                <table class="table table-hover">
                                    <thead>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Precio</th>
                                        <th>Referencia</th>
                                        <th>Unidad Venta</th>
                                        <th>Categoria</th>
                                    </thead>
                                    <tbody id="lista_productos">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>      <!--    FIN ROW     -->
            </div>          <!-- FIN CONTAINER  -->
        </section>

        <?php
        require_once './footer.php';
        ?>
        
        <script type="text/template" id="temp_lista_Productos">
            <%_.each(productos, function(producto){     console.log(producto)%>
            <tr>
                <td><%-producto.Nombre%></td>
                <td><%-producto.Descripcion%></td>
                <td><%-producto.Precio%></td>
                <td><%-producto.Referencia%></td>
                <td><%-producto.UnidadVenta%></td>
                <td><%-producto.Categoria%></td>
                <td>
                    <button class="btn btn-danger btn-sm" data-role="delete" data-id="<%-producto.idProducto%>" data-nombreImg="<%-producto.NombreImagen%>">
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>
                </td>
            </tr>
            <%});%>
        </script>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/price-range.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/main.js"></script>
        <script src="js/utilities.js"></script>
        <script src="js/utilities2.js"></script>
        <script src="js/funciones/admin_products.js"></script>
    </body>
</html>
