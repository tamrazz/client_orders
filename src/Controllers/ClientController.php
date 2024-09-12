<?php

namespace Src\Controllers;

use Src\Models\Client;

class ClientController extends Controller
{
    public function __construct()
    {
        parent::__construct(Client::class);
    }

    protected function sanitizedRequest(): array
    {
        // todo: make sanitazing and return only actual safe data
        return $_REQUEST;
    }
}

