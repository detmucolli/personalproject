<?php
require_once '../config/db.php';
require_once '../routes/auth.php';
require_once '../routes/products.php';

$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = $_SERVER['REQUEST_URI'];

switch ($requestUri) {
    case '/api/auth/login':
        if ($requestMethod === 'POST') {
            AuthController::login();
        }
        break;
    case '/api/auth/signup':
        if ($requestMethod === 'POST') {
            AuthController::signup();
        }
        break;
    case '/api/products':
        if ($requestMethod === 'GET') {
            ProductController::getAllProducts();
        } elseif ($requestMethod === 'POST') {
            ProductController::createProduct();
        }
        break;
    case preg_match('/\/api\/products\/(\d+)/', $requestUri, $matches) ? true : false:
        $productId = $matches[1];
        if ($requestMethod === 'GET') {
            ProductController::getProduct($productId);
        } elseif ($requestMethod === 'PUT') {
            ProductController::updateProduct($productId);
        } elseif ($requestMethod === 'DELETE') {
            ProductController::deleteProduct($productId);
        }
        break;
    default:
        http_response_code(404);
        echo json_encode(['message' => 'Not Found']);
        break;
}
?>