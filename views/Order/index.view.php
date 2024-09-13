<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Orders</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            max-width: 800px;
            background-color: white;
            padding: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #e74c3c;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 15px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            font-size: 18px;
        }

        li {
            margin-bottom: 10px;
        }

        button {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            white-space: nowrap;
            margin-top: 20px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .back-button {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php $client = '' ?>
        <ul>
            <?php foreach ($data['data'] ?? [] as $order): ?>
                <?php
                    if ($order['full_name'] !== $client) {
                        $client = htmlspecialchars($order['full_name']);
                        echo "<h1>Client: $client</h1>";
                        echo "<h2>Orders:</h2>";
                    }
                ?>
                <li>
                    <strong>Title:</strong> <?= htmlspecialchars($order['title']) ?>,
                    <strong>Price:</strong> <?= htmlspecialchars($order['price']) ?>
                </li>
            <?php endforeach; ?>
        </ul>

        <div class="back-button">
            <button onclick="window.location.href='/'">Назад</button>
        </div>
    </div>
</body>
</html>