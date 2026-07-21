<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetTrack Pro plus - Checkout</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<main class="app-container">
    
    <header class="brand-header">
        <img src="https://cdn-icons-png.flaticon.com/512/2609/2609986.png" alt="PetTrack Logo" class="brand-logo">
    </header>

    <section class="checkout-panel">
        
        <div class="visual-section">
            <img src="apm.avif" alt="Mascotas usando collares inteligentes GPS">
        </div>

        <div class="info-section">
            <span class="badge-tech">GPS & MONITOREO</span>
            <h1 class="product-title">Smart Collar</h1>
            <p class="product-desc">Mantén a tu mejor amigo seguro. Monitoreo en tiempo real, historial de actividad y batería de 14 días. Resistente al agua (IP68).</p>
            
            <div class="summary-box">
                <div class="price-row">
                    <span class="price-label">Subtotal a procesar</span>
                    <span class="price-value">$30.00</span>
                </div>
            </div>

            <div class="payment-gateway-wrapper">
                <p class="gateway-hint">Transacción encriptada vía PayPhone</p>
                <div id="payment-widget-container"></div> 
            </div>
        </div>

    </section>
</main>

<script src="https://pay.payphonetodoesposible.com/api/button/js?appId=HplC1EanEOzvz4Ey1uvLA"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        
        const payphoneConfig = {
            
            token: 'aF039Oz-UxympLwKpnt5XDqwSmtIfWJLRk-EEn8my7NY_ulNyk2uD9mDFzR0wSuDleI4NqqxofRqa7Hs_WuYDH2lXTS3TzeCO0NYkVhD5z3cAn3lkqoMyM8BBwdi8wEg0IF35dv5VzItkqWMLBcH0ANTuIc62rl0yV-k85NyTW--7wnR2XFgCYaBtfv6ijUnYSyA7lZHuiUuLkpupItlAwZy8qtHt3D5FQrr01IEjWrAsVpX3ckn0aU7N8HeY83mD1AkjlGzgKsrkYV3lbnIxW3BV4rInffP6aAqB106XcgpKv0yYEZjLlT5eW7RxfRtxnrO87Wxbhnt-kU0gOxUPOgR8Oc',
            
            createOrder: (actions) => actions.prepare({
                amount: 4500, // $45.00
                amountWithoutTax: 4500,
                amountWithTax: 0,
                tax: 0,
                clientTransactionId: `PET-${Date.now()}` 
            }),
            
            onComplete: (model, actions) => {
                window.location.assign(`respuesta.php?id=${model.transactionId}`);
            }
        };

        payphone.Button(payphoneConfig).render("#payment-widget-container");
    });
</script>

</body>
</html>
