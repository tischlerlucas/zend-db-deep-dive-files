<?php


namespace Db\Services;


use Zend\Db\Sql\Sql;

class SqlFactory
{
    public function create()
    {
        return new Sql((new AdapterFactory())->create());
    }
}