<?php

use Db\Services\SqlFactory;

require 'vendor/autoload.php';

$sql = (new SqlFactory())->create();

$select = $sql->select();
$select->from(['ca' => 'capital'])
    ->columns([
        'capital' => 'name',
    ])
    ->join(
        ['ma' => 'mayor'],
        'ma.capital_id = ca.id',
        [
            'mayor' => 'name',
            'salary' => new \Zend\Db\Sql\Expression('sum(salary)'),
        ]
    )
    ->group('mayor')
    ->having('salary > 130000')
;

$results = $sql->prepareStatementForSqlObject($select)->execute();
foreach ($results as $result) {
    var_dump($result);
}
