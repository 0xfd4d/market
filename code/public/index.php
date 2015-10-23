<?php
ini_set('display_errors', 1);

require_once __DIR__.'/../vendor/autoload.php';

use App\Library\Bootstrap;

$dotenv = new Dotenv\Dotenv(__DIR__.'/../');
$dotenv->load();

$bootstrap = new Bootstrap();
$bootstrap->run();
