<?php


namespace Db\Tables;


use Zend\Db\Sql\Ddl\AlterTable;
use Zend\Db\Sql\Ddl\Column\Integer;
use Zend\Db\Sql\Ddl\Column\Varchar;
use Zend\Db\Sql\Ddl\Constraint\ForeignKey;
use Zend\Db\Sql\Ddl\Constraint\PrimaryKey;
use Zend\Db\Sql\Ddl\Constraint\UniqueKey;
use Zend\Db\Sql\Ddl\CreateTable;
use Zend\Db\Sql\Ddl\Index\Index;

class CapitalTable extends Table
{
    public function createTable()
    {
        $tableCapital = new CreateTable('capital');
        $tableCapital->addColumn(new Integer('id', false, null, ['auto_increment' => true]))
            ->addColumn(new Varchar('name', 200, false))
            ->addConstraint(new PrimaryKey(['id'], 'tblpk_capital'))
            ->addConstraint(new UniqueKey(['name', 'country_id'], 'tbl_uniq_countrycapital'))
            ->addColumn(new Integer('country_id'))
            ->addColumn(new Integer('population', false))
            ->addConstraint(new ForeignKey('fk_country', ['country_id'], 'country', ['id'], 'CASCADE', 'CASCADE'));

        $this->executeSql($tableCapital);
    }

    public function alterTable()
    {
        $table = new AlterTable('capital');
        $table->changeColumn('name', new Varchar('name', 250, false));
        $table->addConstraint(new Index('name', 'idx_name', [10]));

        $this->executeSql($table);
    }

    public function dropTable()
    {
        $table = new \Zend\Db\Sql\Ddl\DropTable('capital');
        $this->executeSql($table);
    }
}