<?php


namespace Db\Services;


use Zend\Db\Sql\Sql;

class SqlFactory
{
    private $sql;

    public function create() : Sql
    {
        if (!($this->sql instanceof Sql)) {
            $this->sql = new Sql((new AdapterFactory())->create());
        }

        return $this->sql;
    }
}