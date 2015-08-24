<?php

require_once '../reports/ReportMail.php';
$mailReport = new ReportMail();


$peticion = json_decode(filter_input(INPUT_POST, 'peticion'));

$msg = 'Mi nombre es: '.$peticion->data->name.'\nemail: '.$peticion->data->email.'\n\n'.$peticion->data->message;

$asunto = $peticion->data->subject;

$resp = $mailReport->sendMail($msg, $asunto);

die();

