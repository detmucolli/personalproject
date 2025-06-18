<?php

class ProductController {
    private $productModel;

    public function __construct() {
        require_once '../models/Product.php';
        $this->productModel = new Product();
    }

    public function createProduct($data) {
        return $this->productModel->create($data);
    }

    public function getAllProducts() {
        return $this->productModel->getAll();
    }

    public function getProduct($id) {
        return $this->productModel->getById($id);
    }

    public function updateProduct($id, $data) {
        return $this->productModel->update($id, $data);
    }

    public function deleteProduct($id) {
        return $this->productModel->delete($id);
    }
}