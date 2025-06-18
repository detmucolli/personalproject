<?php
require_once '../controllers/AuthController.php';

$authController = new AuthController();

$router = new Router();

$router->post('/signup', [$authController, 'signup']);
$router->post('/login', [$authController, 'login']);

$router->run();
?>