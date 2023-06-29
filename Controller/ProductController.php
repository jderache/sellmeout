<?php 
namespace Controller;

class ProductController extends BaseController {
    protected $productManager;
    protected $rateManager;

    function ShowProducts(){
        $products = $this->productManager->getAllWithUser();
        foreach($products as $product){
            $product->rate = $this->rateManager->getAvgRateProduct($product->id);
        }
        $this->compact(["products" => $products]);
        $this->view("products");
    }

    function ShowSearchProducts($search) {
        $products = $this->productManager->getBySearch($search);
        foreach($products as $product){
            $product->rate = $this->rateManager->getAvgRateProduct($product->id);
        }
        $this->compact(["products" => $products, "search" => true]);
        $this->view("products");
    }

    function showProduct($id) {
        $product = $this->productManager->getWithUserById($id);
        if($product == false) {
            header("Location: /products");
            exit;
        }
        $product->rate = $this->rateManager->getAvgRateProduct($product->id);
        $this->compact(["product" => $product]);
        $this->view("product");
    }

    function addProduct($nom, $description, $price, $statut) {
        $product = new \stdClass();
        $product->nom = $nom;
        $product->description = $description;
        $product->price = $price;
        $product->statut = $statut;
        $product->userId = $_SESSION['user']->id;
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

    function status($product_id)
    {
        $this->productManager->ToggleStatus($product_id,$_SESSION['user']->id);
        $this->redirect("/my-products");
    }

    function takeRate($id, $rate){
        $this->rateManager->takeRateProduct(intval($id), $rate);
        header('Location: /user');
    }

    function rateProduct($id, $rating) {
        $rate = $this->rateManager->getCurrentRate($id, $_SESSION["user"]->id);
        if ($rate) {
            $rate->rating = $rating;
            if ($this->rateManager->update($rate)) {
                $this->json([
                    "success" => true
                ]);
                exit;
            }
        }
    }


}
