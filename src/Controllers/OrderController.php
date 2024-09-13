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
        if (isset($request['uids'])) {
            $uids = explode(',', $request['uids']);
            $filtered['uids'] = array_map('intval', $uids);
        }
        return $filtered;
    }
}
