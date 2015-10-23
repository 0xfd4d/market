<?php
ini_set('display_errors', 1);

require_once __DIR__.'/../vendor/autoload.php';

use App\Library\Bootstrap;

$bootstrap = new Bootstrap();
$bootstrap->run();
