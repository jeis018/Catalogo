<?php

/**
 * Este control envía el mail, con el formulario de contáctenos, al correo 
 * principal del proyecto.
 */
$asunto = $_POST['email'] . ' - ' . $_POST['name'] . '-' . $_POST['subject'];
$cuerpo = $_POST['message'];
if (isset($_POST['submit'])) {
    $resultadoMail = mail("apolosystems2012@gmail.com", " " . $asunto . " ", " " . $cuerpo . " ");
    if ($resultadoMail) {
        echo"<script type=\"text/javascript\">alert('Se ha recibido su contacto. Gracias!'); window.location='../view/contact-us.html';</script>";
    } else {
        echo"<script type=\"text/javascript\">alert('No se logró enviar el correo'); window.location='../view/contact-us.html';</script>";
    }
}
?>
