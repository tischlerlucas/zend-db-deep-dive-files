<?php


namespace Db\Services;


use Zend\Db\Adapter\Adapter;

class AdapterFactory
{
    private $adapter;

    public function create() : Adapter
    {
        if (!($this->adapter instanceof Adapter)) {
            $configArray = require __DIR__ . '/../../../../config/adapter.php';
            $this->adapter = new Adapter($configArray);
        }

        return $this->adapter;
    }
}