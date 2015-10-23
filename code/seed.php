<?php

require_once __DIR__.'/vendor/autoload.php';

use \App\Library\DBSeed;

$dotenv = new \Dotenv\Dotenv(__DIR__);
$dotenv->load();

$seed = new DBSeed();
$seed->run();
