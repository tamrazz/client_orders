<?php

namespace Src\Models;

use Src\Database;
use mysqli as Mysql;

abstract class Model implements ModelInterface
{
    protected Mysql $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }
}
