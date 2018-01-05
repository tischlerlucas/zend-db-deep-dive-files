<?php

use Zend\Db\Sql\Ddl\AlterTable;
use Zend\Db\Sql\Ddl\Column\Varchar;
use Zend\Db\Sql\Ddl\Constraint\ForeignKey;
use Zend\Db\Sql\Ddl\Constraint\PrimaryKey;
use Zend\Db\Sql\Ddl\Constraint\UniqueKey;
use Zend\Db\Sql\Ddl\CreateTable;
use Zend\Db\Sql\Ddl\Column\Integer;
use Zend\Db\Sql\Ddl\Index\Index;
use Zend\Db\Sql\Ddl\SqlInterface;
use Zend\Db\Sql\Sql;
use Zend\Db\Adapter\Adapter;

class Expressive
{
    /**
     * @var Adapter
     */
    private $adapter;

    /**
     * @var Sql
     */
    private $sql;

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->sql = $this->createSql($this->adapter);
    }

    private function createSql(Adapter $adapter) : Sql
    {
        return new Sql($adapter);
    }

    public function run()
    {
        $this->createTables();

        $this->alterTables();
    }

    public function createTables()
    {
        $tableCountry = new CreateTable('country');
        $tableCountry->addColumn(new Integer('id', false, null, ['auto_increment' => true]))
            ->addColumn(new Varchar('name', 40, false))
            ->addConstraint(new PrimaryKey(['id'], 'tblpk_country'))
            ->addConstraint(new UniqueKey(['name'], 'tbluniq_country'));

        $tableCapital = new CreateTable('capital');
        $tableCapital->addColumn(new Integer('id', false, null, ['auto_increment' => true]))
            ->addColumn(new Varchar('name', 200, false))
            ->addConstraint(new PrimaryKey(['id'], 'tblpk_capital'))
            ->addConstraint(new UniqueKey(['name', 'country_id'], 'tbl_uniq_countrycapital'))
            ->addColumn(new Integer('country_id'))
            ->addColumn(new Integer('population', false))
            ->addConstraint(new ForeignKey('fk_country', ['country_id'], 'country', ['id'], 'CASCADE', 'CASCADE'));

        foreach ([$tableCountry, $tableCapital] as $table) {
            $this->executeSql($table);
        }
    }

    public function alterTables()
    {
        $table = new AlterTable('capital');
        $table->changeColumn('name', new Varchar('name', 250, false));
        $table->addConstraint(new Index('name', 'idx_name', [10]));

        $this->executeSql($table);
    }

    public function dropTables()
    {
        $table = new \Zend\Db\Sql\Ddl\DropTable('capital');
        $this->executeSql($table);

        $table = new \Zend\Db\Sql\Ddl\DropTable('country');
        $this->executeSql($table);
    }

    private function executeSql(SqlInterface $table)
    {
        $this->adapter->query(
            $this->sql->buildSqlString($table),
            $this->adapter::QUERY_MODE_EXECUTE
        );
    }
}