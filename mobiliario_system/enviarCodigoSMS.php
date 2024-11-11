<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $telefonoCliente = $_POST['telefono'];
    $codigoVerificacion = rand(100000, 999999);
    session_start();
    $_SESSION['codigoVerificacion'] = $codigoVerificacion;

    $sid = 'TU_ACCOUNT_SID';
    $token = 'TU_AUTH_TOKEN';
    $twilioNumber = 'TU_NUMERO_TWILIO';

    $client = new Client($sid, $token);
    try {
        $client->messages->create($telefonoCliente, [
            'from' => $twilioNumber,
            'body' => "Tu código de verificación es: $codigoVerificacion"
        ]);
        echo 'Código de verificación enviado al teléfono ' . $telefonoCliente;
    } catch (Exception $e) {
        echo 'Error al enviar el SMS: ' . $e->getMessage();
    }
}
?>
