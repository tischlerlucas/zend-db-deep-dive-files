<?php

require 'vendor/autoload.php';

$adapter = (new \Db\Services\AdapterFactory())->create();

$query = "select ma.name as mayor, sum(ma.salary) as salary, ca.name as capital
    from capital ca
    inner join mayor ma on (ma.capital_id = ca.id)
    group by mayor
    having sum(ma.salary) > :salary";

$results = $adapter->createStatement(
    $query,
    ['salary' => 130000]
)->execute();

foreach ($results as $result) {
    var_dump($result);
}