<?php

require 'vendor/autoload.php';

$adapter = (new \Db\Services\AdapterFactory())->create();

$sql = (new \Db\Services\SqlFactory())->create();

$select = $sql->select()
    ->from('capital')
    ->where(['id' => 3]);

$resultSet = $sql->prepareStatementForSqlObject($select)->execute();

$rowGateway = new \Zend\Db\RowGateway\RowGateway('id', 'capital', $adapter);
$rowGateway->populate($resultSet->current(), true);


$rowGateway->delete();