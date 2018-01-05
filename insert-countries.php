<?php

/** @var Expressive $expressive */
$expressive = require 'expressive.php';

$sql = $expressive->getSqlClone();
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
