<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt - <?= $transactions[0]['reference_no'] ?? 'N/A' ?></title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            width: 300px;
            margin: 20px auto;
            padding: 10px;
            border: 1px solid #eee;
            background-color: #fff;
        }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .header { margin-bottom: 20px; }
        .brand { font-size: 1.2rem; font-weight: bold; text-transform: uppercase; }
        .info { font-size: 0.8rem; color: #666; margin-bottom: 5px; }
        .divider { border-top: 1px dashed #000; margin: 10px 0; }
        .item-table { width: 100%; font-size: 0.9rem; margin: 10px 0; }
        .footer { margin-top: 20px; font-size: 0.8rem; color: #666; }
        @media print {
            body { border: none; margin: 0; width: 100%; }
            .no-print { display: none; }
        }
        .btn-print {
            display: block;
            width: 100%;
            padding: 10px;
            background: #3b82f6;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 10px;
            font-family: 'Inter', sans-serif;
            font-weight: bold;
        }
        .btn-back {
            display: block;
            width: 100%;
            padding: 10px;
            background: #f1f5f9;
            color: #475569;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-family: 'Inter', sans-serif;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="no-print" style="margin-bottom: 20px;">
        <a href="javascript:window.print()" class="btn-print">Print Receipt</a>
        <a href="<?= base_url('sales/history') ?>" class="btn-back">Back to History</a>
    </div>

    <div class="text-center header">
        <div class="brand">EJ RICE RETAILING</div>
        <div class="info">Brgy. Example, City Name</div>
        <div class="info">Contact: 0912-345-6789</div>
    </div>

    <div class="divider"></div>

    <div class="info"><strong>REF NO:</strong> <?= $transactions[0]['reference_no'] ?? 'N/A' ?></div>
    <div class="info"><strong>DATE:</strong> <?= date('M d, Y h:i A', strtotime($transactions[0]['transaction_date'])) ?></div>
    <div class="info"><strong>CUST:</strong> <?= esc($transactions[0]['customer_name']) ?></div>

    <div class="divider"></div>

    <table class="item-table">
        <thead>
            <tr>
                <th align="left">Item</th>
                <th align="center">Qty</th>
                <th align="right">Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $grand_total = 0;
            foreach ($transactions as $item): 
                $grand_total += $item['total_price'];
            ?>
            <tr>
                <td>
                    <?= esc($item['variety']) ?><br>
                    <small><?= esc($item['grade']) ?></small>
                </td>
                <td align="center"><?= number_format($item['quantity_kg'], 2) ?>kg</td>
                <td align="right">₱<?= number_format($item['total_price'], 2) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="divider"></div>

    <table class="item-table">
        <tr>
            <td align="left"><strong>TOTAL</strong></td>
            <td align="right"><strong>₱<?= number_format($grand_total, 2) ?></strong></td>
        </tr>
    </table>

    <div class="divider"></div>

    <div class="text-center footer">
        <p>Thank you for your purchase!</p>
        <p>This serves as your official receipt.</p>
        <p>Keep your receipt for any concerns.</p>
    </div>

    <script>
        // Auto-print prompt on load
        window.onload = function() {
            // Optional: Uncomment if you want auto-print
            // window.print();
        };
    </script>
</body>
</html>
