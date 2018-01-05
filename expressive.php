<?php

return call_user_func(function(){
    require 'vendor/autoload.php';
    require 'Expressive.php';
    $adapter = require 'config/adapter.php';

    return new Expressive($adapter);
});
