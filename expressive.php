<?php

require 'Expressive.php';
$adapter = require 'config/adapter.php';

return new Expressive($adapter);