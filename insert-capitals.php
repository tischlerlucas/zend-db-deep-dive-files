<?php

require 'vendor/autoload.php';

$sql = (new \Db\Services\SqlFactory())->create();

$insert = $sql->insert();

$capitals = [
    ['Canberra', 356585, 1],
    ['Berlin', 3502000, 2],
    ['London', 8539000, 3],
    ['Washington DC', 658893, 4],
    ['Brasília', 2606800,5],
    ['Tokyo', 13185500,6],
    ['Mexico City', 8841900, 7],
    ['Madrid', 3232400,8],
    ['Buenos Aires', 3021800, 9],
    ['Rome', 2503000, 10],
    ['Havana', 2236800, 11],
    ['Paris', 2103600, 12],
    ['Bogota', 7220900, 13],
    ['Ottawa', 898100,14],
    ['Jerusalem', 780200, 15],
    ['Asuncion', 520700, 16],
    ['New Deli', 292300, 17],
    ['Beijing', 7741200, 18],
    ['Berna', 121400, 19],
    ['Dublin', 1045700, 20],
    ['Damasco', 350000, 21],
    ['Santiago', 5012900, 22],
    ['Moscow', 101264000, 23],
];


foreach ($capitals as $capital) {
    $insert->into('capital')
        ->columns(['name', 'population', 'country_id'])
        ->values($capital);

    $results = $sql->prepareStatementForSqlObject($insert)->execute();
}

$query = "insert into capital (name, population, country_id) values ('Sidney', 4500000, 1)";
$adapter = (new \Db\Services\AdapterFactory())->create();
$adapter->createStatement($query)->execute();