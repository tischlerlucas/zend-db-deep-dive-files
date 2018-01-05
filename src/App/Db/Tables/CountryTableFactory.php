<?php


namespace Db\Tables;


use Db\Services\AdapterFactory;
use Db\Services\SqlFactory;

class CountryTableFactory
{
    public function create() : CountryTable
    {
        return new CountryTable(
            (new AdapterFactory())->create(),
            (new SqlFactory())->create()
        );
    }
}