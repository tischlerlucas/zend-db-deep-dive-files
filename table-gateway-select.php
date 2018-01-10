<?php

use Db\Services\AdapterFactory;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;

require 'vendor/autoload.php';

$adapter = (new AdapterFactory())->create();

$table = new TableGateway('capital', $adapter);

$rowset = $table->select(function (Select $select) {
    $select->where->greaterThan('population', 360000);
    $select->order('population DESC');
});

foreach ($rowset as $row) {
    printf("%s, %s %s", $row['name'], number_format($row['population'], 0, ',', '.'), PHP_EOL);
}