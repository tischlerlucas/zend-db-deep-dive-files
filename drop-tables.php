<?php

require 'vendor/autoload.php';

$capital = (new \Db\Tables\CapitalTableFactory())->create();
$capital->dropTable();

$country = (new \Db\Tables\CountryTableFactory())->create();
$country->dropTable();