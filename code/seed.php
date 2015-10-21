<?php

require_once __DIR__.'/vendor/autoload.php';

use \App\Library\DBSeed;

$seed = new DBSeed();
$seed->run();
