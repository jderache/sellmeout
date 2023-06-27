<?php
// Contrôleur Panier
namespace Controller;

class BasketController extends BaseController{

    function ShowCart(){
        if (isset($_SESSION['panier'])) {
            $products = $_SESSION['panier'];
            $this->compact(["products" => $products]);
            $total = $this -> calculatePrice();
            $this->compact(["total" => $total]);
        }
        $this->view("Basket");
    }

    public function AddToCart($id) {
        $product = $this->productManager->getById($id);

        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = array();
        }
        if(isset($_SESSION['panier'][$id])){
            $previousQte = $_SESSION['panier'][$id]['quantite'];
            $quantite = $previousQte++;
            $_SESSION['panier'][$id]['quantite'] = $quantite;
            $_SESSION['panier'][$id]["prix"] = $_SESSION['panier'][$id]['quantite'] * $product->price;
        }else{
            $_SESSION['panier'][$id]['id'] = $id;
            $_SESSION['panier'][$id]['name'] = $product->nom;
            $_SESSION['panier'][$id]["quantite"] = 1;
            $_SESSION['panier'][$id]["prix"] = $product->price * 1;
            $_SESSION['panier'][$id]["description"] = $product->description;
            $_SESSION['panier'][$id]["image"] = $product->image;
        }
        header('Location: /basket');
    }

    public function DeleteFromCart($id) {
        if (isset($_SESSION['panier'])) {
            unset($_SESSION['panier'][$id]);
        }
        header('Location: /basket');
    }

    public function UpdateQuantity($id , $quantite) {
        if(isset($_SESSION['panier'][$id])){
            $_SESSION['panier'][$id]['quantite']= $quantite;
        }
        header('Location: /basket');
    }

    public function calculatePrice() {
        $total = 0;
        if (isset($_SESSION['panier'])) {
            foreach ($_SESSION['panier'] as $article => $basketElement) {     
               $total += $basketElement['prix'] * $basketElement['quantite'];
            }
            return $total;
        }
        return $total;
    }
}




