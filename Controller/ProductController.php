<?php 
namespace Controller;

class ProductController extends BaseController {
    protected $productManager;

    function ShowProducts(){
        $products = $this->productManager->getAll();
        $this->compact(["products" => $products]);
        $this->view("products");
    }

    function showProduct($id) {
        $product = $this->productManager->getById($id);
        $this->compact(["product" => $product]);
        $this->view("product");
    }

    function addProduct($nom, $description, $price, $statut) {
        $product = new \stdClass();
        $product->nom = $nom;
        $product->description = $description;
        $product->price = $price;
        $product->statut = $statut;
        if ($this->productManager->create($product)) {
            $this->compact([
                "success" => "Produit ajouté !"
            ]);

            $this->addProductView();
        }
    }

    function addProductView() {
        $this->view("addProduct");
    }
}
