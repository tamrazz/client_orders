
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Orders</title>
</head>
<body>
    <h1>Client: <?= htmlspecialchars($client['name']) ?></h1>
    <h2>Orders:</h2>
    <ul>
        <?php foreach ($data as $order): ?>
            <li>
                <strong>Title:</strong> <?= htmlspecialchars($order['title']) ?>,
                <strong>Price:</strong> <?= htmlspecialchars($order['price']) ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
