<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление товаров</title>
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
            text-align: center;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #e74c3c;
        }

        .product-block {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            gap: 15px;
        }

        input[type="text"], input[type="number"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 25px;
            width: 100%;
        }

        input[type="number"] {
            -moz-appearance: textfield;
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
        }

        button:hover {
            background-color: #0056b3;
        }

        .add-product-btn {
            background-color: #28a745;
        }

        .add-product-btn:hover {
            background-color: #218838;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }

        .create-products {
            background-color: #28a745;
        }

        .create-products:hover {
            background-color: #218838;
        }

        .back-button {
            background-color: #6c757d;
        }

        .back-button:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Добавление товаров</h1>

        <form id="productForm" action="/products" method="POST">
            <div id="productsContainer">
                <div class="product-block">
                    <input type="text" name="title[]" placeholder="Название товара" required>
                    <input type="number" name="price[]" placeholder="Цена" step="1.00" required>
                </div>
            </div>
            <button type="button" class="add-product-btn" onclick="addProductBlock()">+</button>

            <div class="form-actions">
                <button type="button" class="back-button" onclick="window.location.href='/'">Назад</button>
                <button type="submit" class="create-products">Создать товары</button>
            </div>
        </form>
    </div>

    <script>
        function addProductBlock() {
            const productsContainer = document.getElementById('productsContainer');

            const productBlock = document.createElement('div');
            productBlock.classList.add('product-block');

            const productNameInput = document.createElement('input');
            productNameInput.type = 'text';
            productNameInput.name = 'title[]';
            productNameInput.placeholder = 'Название товара';
            productNameInput.required = true;

            const productPriceInput = document.createElement('input');
            productPriceInput.type = 'number';
            productPriceInput.name = 'price[]';
            productPriceInput.placeholder = 'Цена';
            productPriceInput.step = '1.00';
            productPriceInput.required = true;

            productBlock.appendChild(productNameInput);
            productBlock.appendChild(productPriceInput);

            productsContainer.appendChild(productBlock);
        }
    </script>
</body>
</html>