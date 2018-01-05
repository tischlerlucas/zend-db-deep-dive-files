<?php

require 'vendor/autoload.php';

$sql = (new \Db\Services\SqlFactory())->create();
$insert = $sql->insert();

$countries = [
    'Australia',
    'Germany',
    'United Kingdom',
    'United States',
];


foreach ($countries as $country) {
    $insert->into('country');
    $insert->values(['name' => $country]);

    $results = $sql->prepareStatementForSqlObject($insert)
        ->execute();
}

//print $insert->getSqlString($expressive->getAdapterClone()->getPlatform());
