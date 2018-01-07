<?php

require 'vendor/autoload.php';

$adapter = (new \Db\Services\AdapterFactory())->create();

$rowGateway = new \Zend\Db\RowGateway\RowGateway('id', 'capital', $adapter);
$rowGateway->name = 'Zagreb';
$rowGateway->country_id = 24;
$rowGateway->population = 790000;

$rowGateway->save();
