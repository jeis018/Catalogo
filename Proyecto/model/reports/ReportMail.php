<?php

require_once('../../lib/PHPMailer-master/class.phpmailer.php');

class ReportMail {

    public function sendReportMail($attach, $idOrder) {
        $mail = new PHPMailer();
        $body = "Se ha solicitado una nueva orden de compra. En el archivo excel 
            adjunto se encuentran detalles de la misma.";

        $mail->SetFrom('info@madessa.co', 'Información administrativa Madessa.co');
        $mail->AddReplyTo("info@madessa.co", "Información administrativa Madessa.co");
        $address = "info@madessa.co";
        $mail->AddAddress($address, "Información administrativa Madessa.co");

        $mail->Subject = "Orden de compra número: " . $idOrder;
        $mail-> MsgHTML($body);
        $mail-> AddAttachment($attach);

        if (!$mail->Send()) {
            echo "<script type=\"text/javascript\">alert('Ha ocurrido un error solicitando la orden de compra, Contacte al administrador'); window.location='../view/index.php';</script>";
        } else {
            echo "<script type=\"text/javascript\">alert('Su orden de compra fué radicada correctamente.'); window.location='../view/index.php';</script>";
        }
    }

}

?>
