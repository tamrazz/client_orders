<?php

namespace Src\Controllers;

use Src\Models\Product;
use Src\Responses\Response;

class ProductController extends ModelController
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

    public function massStore(): Response
    {
        $titles = $this->request['title'] ?? [];
        $prices = $this->request['price'] ?? [];

        if (count($titles) !== count($prices)) {
            return Response::make(400, [], 'Not all fields are filled in'); 
        }

        foreach ($titles as $key => $title) {
            $data = [
                'title' => trim(htmlspecialchars($title, ENT_QUOTES, 'UTF-8')),
                'price' => filter_var($prices[$key], FILTER_VALIDATE_FLOAT),
            ];
            $this->model->create($data);
        }

        return Response::make(201, [
            'view' => Controller::VIEWS_PATH . 'index.html',
        ]); 
    }
}

