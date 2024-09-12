<?php

namespace Src\Controllers;

use Src\Models\Client;
use Src\Models\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        parent::__construct(Product::class);
    }

    protected function sanitizedRequest(): array
    {
        // todo: make sanitazing and return only actual safe data
        return $_REQUEST;
    }

    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //     $db = Database::getInstance()->getConnection();
        
    //     $stmt = $db->prepare("INSERT INTO products (title, price) VALUES (?, ?)");
        
    //     $products = $_POST['products'];
        
    //     foreach ($products as $product) {
    //         $stmt->bind_param('sd', $product['title'], $product['price']);
    //         $stmt->execute();
    //     }
        
    //     echo "Products added successfully.";
    // }
}

