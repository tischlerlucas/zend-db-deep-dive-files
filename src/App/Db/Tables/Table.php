<?php


namespace Db\Tables;


use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\SqlInterface;

abstract class Table
{
    private $adapter;

    private $sql;

    public function __construct(Adapter $adapter, Sql $sql)
    {
        $this->adapter = $adapter;
        $this->sql = $sql;
    }

    public abstract function createTable();

    public abstract function alterTable();

    public abstract function dropTable();

    protected function executeSql(SqlInterface $table)
    {
        $this->adapter->query(
            $this->sql->buildSqlString($table),
            $this->adapter::QUERY_MODE_EXECUTE
        );
    }
}