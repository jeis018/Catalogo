<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Login | Madessa</title>
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
        <?php 
            require_once './header.php';
        ?>

        <section id="form"><!--form-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-1">
                        <div class="login-form"><!--login form-->
                            <h2>Accede a tu cuenta</h2>
                            <form method="POST" name="formLogin" action="../controller/CLogin.php">
                                <input type="email" name="mail" placeholder="Correo" required/>
                                <input type="password" name="pass" placeholder="Contraseña" required/>
                                <!--<span>
                                    <input type="checkbox" class="checkbox"> 
                                    Keep me signed in
                                </span>-->
                                <button type="submit" name="submit2" class="btn btn-default">Entrar</button>
                            </form>
                        </div><!--/login form-->
                    </div>
                    <div class="col-sm-1">
                        <h2 class="/*or*/">O</h2>
                    </div>
                    <div class="col-sm-4">
                        <div class="signup-form"><!--sign up form-->
                            <h2>Nuevo Usuario, Registrate!</h2>
                            <form method="POST" name="formLogin" action="../controller/CRegistro.php">
                                <div class="row">
                                    <div class="col-md-4">
                                        <select id="tipo_doc" style="background-color: white">
                                            <option value="">C.C.</option>
                                            <option value="">C.E.</option>
                                            <option value="">CONT.</option>
                                            <option value="">NIT.</option>
                                            <option value=""></option>
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="number" name="docu" placeholder="No. Documento" required/>
                                    </div>
                                </div>

                                <input type="text" name="name" placeholder="Nombres" required/>
                                <input type="text" name="cel" placeholder="Celular" required/>
                                <input type="text" name="tel" placeholder="Telefono" required/>
                                <input type="text" name="dir" placeholder="Dirección" required/>
                                <input type="email" name="mail" placeholder="Correo Electronico" required/>
                                <input type="password" name="pass" placeholder="Contraseña" required/>
                                <button type="submit" name="submit1" class="btn btn-default">Registrar</button>
                            </form>
                        </div><!--/sign up form-->
                    </div>
                </div>
            </div>
        </section><!--/form-->

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