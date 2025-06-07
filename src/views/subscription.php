<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Il tuo abbonamento</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .subscription-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .subscription-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .subscription-details {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 6px;
            margin-bottom: 1.5rem;
        }

        .subscription-item {
            display: flex;
            justify-content: space-between;
            padding: 0.8rem 0;
            border-bottom: 1px solid #dee2e6;
        }

        .subscription-item:last-child {
            border-bottom: none;
        }

        .back-button {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: var(--primary-color);
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="subscription-container">
        <div class="subscription-header">
            <h1>Il tuo abbonamento</h1>
        </div>

        <?php if ($subscriptionData): ?>
            <div class="subscription-details">
                <?php foreach ($subscriptionData as $purchase): ?>
                    <div class="subscription-item">
                        <div class="purchase-info">
                            <h3><?php echo htmlspecialchars($purchase['name']); ?></h3>
                            <p>Data acquisto: <?php echo htmlspecialchars($purchase['purchase_date']); ?></p>
                            <p>Stato: <?php echo htmlspecialchars($purchase['status']); ?></p>
                            <?php if ($purchase['is_subscription']): ?>
                                <p>Dettagli abbonamento: <?php echo htmlspecialchars($purchase['subscription_details']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="subscription-details">
                <p>Nessun abbonamento trovato.</p>
            </div>
        <?php endif; ?>

        <a href="dashboard.php" class="back-button">Torna alla Dashboard</a>
    </div>
</body>
</html>