<?php

// Script to deploy SQL-dump

if (!file_exists('vendor/autoload.php')) {
    die('Autolader not ran.');
}

require_once('vendor/autoload.php');

$dumpFiles = [
    'database/products.sql',
    'database/user_order.sql',
    'database/user.sql',
];

foreach ($dumpFiles as $file) {
    importSQL($file);
}

function importSQL($file) {
    $db = Src\Database::getInstance()->getConnection();
    $query = file_get_contents($file);

    if ($db->multi_query($query)) {
        do {
            if ($result = $db->store_result()) {
                $result->free();
            }
        } while ($db->more_results() && $db->next_result());
        echo 'Database import successful: ' . $file . PHP_EOL;
    } else {
        echo 'Error importing database: ' . $db->error;
    }
}
