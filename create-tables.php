<?php

require 'vendor/autoload.php';

$country = (new \Db\Tables\CountryTableFactory())->create();
$country->createTable();

$capital = (new \Db\Tables\CapitalTableFactory())->create();
$capital->createTable();

