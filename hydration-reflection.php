<?php

use Db\Hydration\Reflection\MayorSalaryEntity;
use Db\Services\SqlFactory;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Hydrator\Reflection;

require 'vendor/autoload.php';

$sql = (new SqlFactory())->create();

$select = $sql->select();
$select->from([
    'ca' => 'capital'
])
    ->columns([
        'capital' => 'name',
    ])
    ->join(
        [
            'ma' => 'mayor'
        ],
        'ma.capital_id = ca.id',
        [
            'mayor' => 'name',
            'salary' => new \Zend\Db\Sql\Expression('sum(ma.salary)')
        ]
    )
    ->group('ma.name');

$expression = (new \Zend\Db\Sql\Having())->expression('sum(ma.salary) > ?', [130000]);

$select->having($expression);

$results = $sql->prepareStatementForSqlObject($select)->execute();

if ($results instanceof ResultInterface && $results->isQueryResult()) {
    $resultSet = new HydratingResultSet(
        new Reflection(),
        new MayorSalaryEntity()
    );

    $resultSet->initialize($results);
}

foreach ($resultSet as $result) {
    printf(
        "%s, %s, %s\n",
        $result->getCapital(),
        $result->getMayor(),
        $result->getSalary()
    );
}
