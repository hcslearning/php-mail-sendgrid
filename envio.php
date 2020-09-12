<?php

require_once './vendor/autoload.php';

$email = new \SendGrid\Mail\Mail();
$email->setFrom("tienda@mailer.obsequia.cl");
$email->setSubject("Probando la API de Sendgrid");
$email->addTo("stgoneira@ticbiz.cl");
$email->addContent("text/plain", "Lorem ipsum dolor asit atme");
$email->addContent("text/html", "<h1>Holi</h1><p>Lorem ipsum dolor</p>");
$sendgrid = new \SendGrid( getenv('SENDGRID_API_KEY') );
try {
    $response = $sendgrid->send( $email );
    print $response->statusCode();
    print_r( $response->headers() );
    print $response->body();
} catch (Exception $ex) {
    echo $ex->getMessage();
}
