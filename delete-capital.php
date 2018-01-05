<?php

require 'vendor/autoload.php';

$sql = (new \Db\Services\SqlFactory())->create();

$delete = $sql->delete();
$delete->from('capital')
    ->where->equalTo('name', 'London')
    ->nest()
    ->and->greaterThan('country_id', 2)
    ->and->lessThan('country_id', 4)
    ->unnest()
;

$statement = $sql->prepareStatementForSqlObject($delete)->execute();
