<?php
// Usamos el operador de fusión null (??) más moderno en PHP
$tx_reference = $_GET['id'] ?? null;
$transaction_successful = !empty($tx_reference);

// Reestructuramos el array de datos
$payment_data = [];

if ($transaction_successful) {
    $payment_data = [
        'code' => 200,
        'reference_id' => $tx_reference,
        'gateway_status' => 'APPROVED',
        'sys_msg' => 'La pasarela procesó el pago correctamente.'
    ];
} else {
    $payment_data = [
        'code' => 400,
        'reference_id' => 'NULL',
        'gateway_status' => 'FAILED/MISSING',
        'sys_msg' => 'Fallo al recuperar los parámetros de PayPhone.'
    ];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>PetTrack - Estado de Orden</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="app-container">
    
    <div class="brand-header">
        <img src="https://cdn-icons-png.flaticon.com/512/2609/2609986.png" alt="PetTrack Logo" class="brand-logo">
    </div>

    <div class="status-card">
        
        <div class="icon-wrapper">
            <?= $transaction_successful ? '🐶' : '❌' ?>
        </div>

        <h1 class="status-title">
            <?= $transaction_successful ? '¡Orden Confirmada!' : 'Error en la Orden' ?>
        </h1>
        
        <p class="status-subtitle"><?= $payment_data['sys_msg'] ?></p>

        <div class="data-list">
            <div class="data-row">
                <span class="label-muted">Estado de Red:</span>
                <span class="<?= $transaction_successful ? 'pill-ok' : 'pill-fail' ?>">
                    <?= $payment_data['gateway_status'] ?>
                </span>
            </div>
            <div class="data-row">
                <span class="label-muted">Tracking ID:</span>
                <span style="font-family: monospace; font-weight: bold;">
                    <?= $payment_data['reference_id'] ?>
                </span>
            </div>
        </div>

        <div class="tech-dump">
            <h4>DEBUG LOG (RAW JSON)</h4>
            <pre><?= json_encode($payment_data, JSON_PRETTY_PRINT) ?></pre>
        </div>

    </div>

</div>

</body>
</html>