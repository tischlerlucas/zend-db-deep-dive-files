<?php

use Db\Services\AdapterFactory;
use Zend\Db\TableGateway\TableGateway;

require 'vendor/autoload.php';

$adapter = (new AdapterFactory())->create();

$table = new TableGateway('capital', $adapter);

$table->update(
    [
        'population' => 3021803,
    ],
    [
        'name' => 'Buenos Aires',
    ]
);

//$table->update(
//    [
//        'population' => 3021803,
//    ],
//    "name = 'Buenos Aires'"
//);