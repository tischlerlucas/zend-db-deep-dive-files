<?php

use Db\Services\AdapterFactory;
use Zend\Db\Sql\Delete;
use Zend\Db\TableGateway\TableGateway;

require 'vendor/autoload.php';

$adapter = (new AdapterFactory())->create();

$table = new TableGateway('capital', $adapter);

$delete = new Delete($table->getTable());

$delete->where->lessThan('population', 200000);
$table->deleteWith($delete);