<?php

define('APP_PATH', dirname(__DIR__));

require_once '../vendor/autoload.php';

use App\Kernel\App;

$app = new App();

$app->run();

