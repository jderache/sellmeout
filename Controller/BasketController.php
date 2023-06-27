<?php
// Contrôleur Panier
namespace Controller;

class BasketController extends BaseController{
    
    function ShowCart(){
        $products = $_SESSION['panier'];
        $this->compact(["products" => $products]);
        $total = $this -> calculatePrice();
        $this->compact(["total" => $total]);
        $this->view("Basket");
    }

    public function AddToCart($article, $name, $quantite, $image, $description, $price) {
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = array();
        }
        if(isset($_SESSION['panier'][$article])){
            $previousQte = $_SESSION['panier'][$article]['quantite'];
            $quantite += $previousQte;
            $_SESSION['panier'][$article]['quantite'] = $quantite;
            $_SESSION['panier'][$article]["prix"] = $_SESSION['panier'][$article]['quantite']*$price;
        }else{
            $_SESSION['panier'][$article]['id'] = $article;
            $_SESSION['panier'][$article]['name'] = $name;
            $_SESSION['panier'][$article]['quantite'] = $quantite;
            $_SESSION['panier'][$article]["prix"] = $quantite * $price;
            $_SESSION['panier'][$article]["description"] = $description;
            $_SESSION['panier'][$article]["image"] = $image;
        }
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
            
            foreach ($_SESSION['panier'] as $article => $PannierElement) {
                    
               $total += $PannierElement['prix'];
            }
            return $total;
        }
        return $total;
    }
}



 $panierController = new BasketController("basket");

 $panierController->AddToCart(  12, 
                                "Carte Graphique RTX 3060", 
                                1, 
                                "https://placehold.co/250x200?font=roboto", 
                                "GeForce RTX 3060
                                Type de bus : PCI-Express 4.0 x16
                                Horloge boostée : 1777 MHz
                                Interfaces : DisplayPort 1.4a (x3), HDMI 2.1
                                Technologie : GDDR6 
                                API prises en charge : Vulkan RT API, OpenGL 4.6 ", 
                                "350.99");

$panierController->AddToCart(   15, 
                                "Carte Graphique RTX 3060", 
                                1, 
                                "https://placehold.co/250x200?font=roboto   ", 
                                "GeForce RTX 3060
                                Type de bus : PCI-Express 4.0 x16
                                Horloge boostée : 1777 MHz
                                Interfaces : DisplayPort 1.4a (x3), HDMI 2.1
                                Technologie : GDDR6 
                                API prises en charge : Vulkan RT API, OpenGL 4.6 ", 
                                "350.99"
);




