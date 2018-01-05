<?php

require 'vendor/autoload.php';

$capital = (new \Db\Tables\CapitalTableFactory())->create();
$capital->alterTable();