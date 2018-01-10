<?php

use Db\Services\SqlFactory;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Hydrator\ClassMethods;
use Zend\Hydrator\ObjectProperty;

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

class MayorSalaryEntity
{
    private $capital;
    private $mayor;
    private $salary;

    public function setCapital(string $capital)
    {
        $this->capital = $capital;
    }

    public function getCapital()
    {
        return $this->capital;
    }

    public function setMayor(string $mayor)
    {
        $this->mayor = $mayor;
    }

    public function getMayor()
    {
        return $this->mayor;
    }

    public function setSalary(string $salary)
    {
        $this->salary = $salary;
    }

    public function getSalary()
    {
        return $this->salary;
    }
}

if ($results instanceof ResultInterface && $results->isQueryResult()) {
    $resultSet = new HydratingResultSet(
        new ClassMethods(),
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
