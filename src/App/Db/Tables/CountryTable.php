<?php


namespace Db\Tables;


use Zend\Db\Sql\Ddl\Column\Integer;
use Zend\Db\Sql\Ddl\Column\Varchar;
use Zend\Db\Sql\Ddl\Constraint\PrimaryKey;
use Zend\Db\Sql\Ddl\Constraint\UniqueKey;
use Zend\Db\Sql\Ddl\CreateTable;

class CountryTable extends Table
{
    public function createTable()
    {
        $tableCountry = new CreateTable('country');
        $tableCountry->addColumn(new Integer('id', false, null, ['auto_increment' => true]))
            ->addColumn(new Varchar('name', 40, false))
            ->addConstraint(new PrimaryKey(['id'], 'tblpk_country'))
            ->addConstraint(new UniqueKey(['name'], 'tbluniq_country'));

        $this->executeSql($tableCountry);
    }

    public function alterTable(){}

    public function dropTable()
    {
        $table = new \Zend\Db\Sql\Ddl\DropTable('country');
        $this->executeSql($table);
    }
}