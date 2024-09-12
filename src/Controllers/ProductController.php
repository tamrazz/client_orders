<?php

namespace Src\Controllers;

use Src\Models\Client;
use Src\Models\Product;

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
}

