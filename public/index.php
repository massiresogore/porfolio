<?php
session_start();

use App\Autoloader;
use App\Controller\SiteController;
use App\Core\Application;

require_once dirname(__DIR__) . "/Autoloader.php";

Autoloader::register();

$app = new Application;
$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->get('/resume', [SiteController::class, 'resume']);

$app->router->post('/contact', [SiteController::class, 'contact']);

define('URL', __DIR__);

$app->run();