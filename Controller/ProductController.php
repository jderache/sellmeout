<?php
namespace Controller;

class ProductController extends BaseController{

    public function ShowProductList()
    {
        $productList = $this->productManager->getAll();
        $this->addParam('products', $productList);
        $this->View('productList');
    }

    public function ProductForm()
    {
        $this->View("productForm");
    }
}