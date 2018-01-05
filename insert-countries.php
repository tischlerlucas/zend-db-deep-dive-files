<?php

require 'vendor/autoload.php';

$sql = (new \Db\Services\SqlFactory())->create();
$insert = $sql->insert();

$countries = [
    'Australia',
    'Germany',
    'United Kingdom',
    'United States',
    'Brazil',
    'Japan',
    'Mexico',
    'Spain',
    'Argentina',
    'Italy',
    'Cuba',
    'France',
    'Equator',
    'Canada',
    'Israel',
    'Paraguay',
    'India',
    'China',
    'Switzerland',
    'Ireland',
    'Sirya',
    'Chile',
    'Russia',
];


foreach ($countries as $country) {
    $insert->into('country');
    $insert->values(['name' => $country]);

    $results = $sql->prepareStatementForSqlObject($insert)
        ->execute();
}

//print $insert->getSqlString($expressive->getAdapterClone()->getPlatform());
