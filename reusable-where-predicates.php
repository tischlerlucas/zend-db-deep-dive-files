<?php

use Db\Services\SqlFactory;
use Zend\Db\Sql\Expression;
use Zend\Db\Sql\Predicate\Predicate;

require 'vendor/autoload.php';

$sql = (new SqlFactory())->create();

$populationPredicate = new Predicate();
$populationPredicate->greaterThanOrEqualTo('population', 100000);

$namePredicate = new Predicate();
$namePredicate->like('ca.name', 'Can%');

$predicate = new Predicate();
$predicate->addPredicates([
    $populationPredicate,
    $namePredicate,
]);

$select = $sql->select()
    ->from(['ca' => 'capital'])
    ->columns([
        'capital' => 'name',
        'population',
    ])
    ->join(
        [
            'ma' => 'mayor'
        ],
        'ma.capital_id = ca.id',
        [
            'mayor' => 'name',
            'salary' => new Expression('sum(salary)')
        ]
    )
    ->where($predicate);

$statement = $sql->prepareStatementForSqlObject($select);
$results = $statement->execute();

//var_dump($results);exit;
foreach ($results as $result) {
    printf("%s, %s, %s \n", $result['capital'], $result['population'], $result['mayor']);
}