
<?php

namespace Src\Controllers;

use Src\Models\Order;

class OrderController extends ModelController
{
    public function __construct()
    {
        parent::__construct(Order::class);
    }

    protected function sanitizedRequest(): array
    {
        $request = filter_input_array(INPUT_GET);
        $filtered = [];
        if (isset($request['uid'])) {
            $filtered['uid'] = (int)$request['uid'];
        }
        return $filtered;
    }

    // public function show()
    // {
    //     $request = $this->sanitizedRequest();
    //     $clientId = $request['id'] ?? null;

    //     if ($clientId) {
    //         $client = $this->model->find($clientId);
    //         $orders = $this->model->getOrders($clientId);

    //         if ($client) {
    //             // Render the view with client data and orders
    //             include __DIR__ . '/../../views/client_view.php';
    //         } else {
    //             echo 'Client not found.';
    //         }
    //     } else {
    //         echo 'Client ID is required.';
    //     }
    // }


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
