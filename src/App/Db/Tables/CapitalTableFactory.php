<?php


namespace Db\Tables;


use Db\Services\AdapterFactory;
use Db\Services\SqlFactory;

class CapitalTableFactory
{
    public function create() : CapitalTable
    {
        return new CapitalTable(
            (new AdapterFactory())->create(),
            (new SqlFactory())->create()
        );
    }
}