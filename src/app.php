<?php

use Silex\Application;

use Sce\RepoMan\Provider\Config as ConfigProvider;
use Sce\RepoMan\Provider\Twig as TwigProvider;
use Sce\RepoMan\Provider\Log as LogProvider;
use Sce\RepoMan\Provider\Route as RouteProvider;
use Sce\RepoMan\Provider\ErrorHandler as ErrorHandlerProvider;

require_once __DIR__ . '/vendor/autoload.php';

$app = new Application();

$app->register(new ConfigProvider(__DIR__));
//$app->register(new LogProvider());
//$app->register(new ErrorHandlerProvider());
//$app->register(new TwigProvider(__DIR__));
$app->register(new RouteProvider());

return $app;