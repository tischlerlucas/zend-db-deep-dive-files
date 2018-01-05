<?php


namespace Db\Services;


use Zend\Db\Adapter\Adapter;

class AdapterFactory
{
    public function create()
    {
        $configArray = require __DIR__ . '/../../../../config/adapter.php';
        return new Adapter($configArray);
    }
}