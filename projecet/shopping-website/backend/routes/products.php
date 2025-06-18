<?php
require_once '../controllers/ProductController.php';

$productController = new ProductController();

$router = new Router();

$router->get('/products', function() use ($productController) {
    $productController->index();
});

$router->post('/products', function() use ($productController) {
    $productController->store();
});

$router->get('/products/{id}', function($id) use ($productController) {
    $productController->show($id);
});

$router->put('/products/{id}', function($id) use ($productController) {
    $productController->update($id);
});

$router->delete('/products/{id}', function($id) use ($productController) {
    $productController->destroy($id);
});
?>