<?php

require 'vendor/autoload.php';

$sql = (new \Db\Services\SqlFactory())->create();
$update = $sql->update();

$update->table('capital')
    ->set(['population' => 700000])
    ->where->like('name', 'Washington%')
    ->and->equalTo('country_id', 4)
;

$sql->prepareStatementForSqlObject($update)->execute();