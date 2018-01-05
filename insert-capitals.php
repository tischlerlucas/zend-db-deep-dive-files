<?php

/** @var Expressive $expressive */
$expressive = require 'expressive.php';

$sql = $expressive->getSqlClone();

$insert = $sql->insert();

$capitals = [
    ['Canberra', 356585, 1],
    ['Berlin', 3502000, 2],
    ['London', 8539000, 3],
    ['Washington DC', 658893, 4],
];


foreach ($capitals as $capital) {
    $insert->into('capital')
        ->columns(['name', 'population', 'country_id'])
        ->values($capital);

    $results = $sql->prepareStatementForSqlObject($insert)->execute();
}

$query = "insert into capital (name, population, country_id) values ('Sidney', 4500000, 1)";
$adapter = $expressive->getAdapterClone();
$adapter->createStatement($query)->execute();