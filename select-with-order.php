<?php

use Db\Services\SqlFactory;

require 'vendor/autoload.php';

$sql = (new SqlFactory())->create();

$select = $sql->select();
$select->from(['ca' => 'capital'])
    ->columns([
        'capital' => 'name',
        'population'
    ])
    ->join(
        ['co' => 'country'],
        'co.id = ca.country_id',
        ['countryName' => 'name']
    )
    ->order(['countryName desc'])
    ->order(['capital asc'])
    ->offset(4)
    ->limit(2)
;

$results = $sql->prepareStatementForSqlObject($select)->execute();
foreach ($results as $result) {
    var_dump($result);
}
