<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список товаров</title>
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
            min-height: 100vh;
        }

        .container {
            max-width: 800px;
            background-color: white;
            padding: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #e74c3c;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        td {
            font-size: 18px;
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
        }

        button:hover {
            background-color: #0056b3;
        }

        .back-button {
            background-color: #6c757d;
        }

        .back-button:hover {
            background-color: #5a6268;
        }

        .back-container {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Список товаров</h1>
        
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Название товара</th>
                    <th>Цена</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)): ?>
                    <?php echo json_encode($data) ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">Нет товаров для отображения</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="back-container">
            <button class="back-button" onclick="window.location.href='/'">Назад</button>
        </div>
    </div>
</body>
</html>