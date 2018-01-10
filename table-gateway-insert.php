<?php

use Db\Services\AdapterFactory;
use Zend\Db\TableGateway\TableGateway;

require 'vendor/autoload.php';

$adapter = (new AdapterFactory())->create();

$table = new TableGateway('capital', $adapter);

$table->insert(
    [
        'name' => 'Brisbane',
        'country_id' => 1,
        'population' => 1500000,
    ]
);
