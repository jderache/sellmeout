<?php
// Contrôleur Panier
namespace Controller;

class BasketController {
    

    public function AddToCart($article, $name, $quantite, $price) {
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = array();
        }
        if(isset($_SESSION['panier'][$article])){
            $previousQte = $_SESSION['panier'][$article]['quantite'];
            $quantite += $previousQte;
            $_SESSION['panier'][$article]['quantite'] = $quantite;
            $_SESSION['panier'][$article]["prix"] = $_SESSION['panier'][$article]['quantite']*$price;
        }else{
            $_SESSION['panier'][$article]['name'] = $name;
            $_SESSION['panier'][$article]['quantite'] = $quantite;
            $_SESSION['panier'][$article]["prix"] = $quantite * $price;
        }
    }

    public function DeleteFromCart($article) {
        if (isset($_SESSION['panier'])) {
            unset($_SESSION['panier'][$article]);
        }
    }

    public function UpdateQuantity($article, $quantite) {
        if(isset($_SESSION['panier'][$article])){
            $_SESSION['panier'][$article]['quantite']= $quantite;
        }
    }

    public function calculatePrice() {
        $total = 0;

        
        if (isset($_SESSION['panier'])) {
            
            foreach ($_SESSION['panier'] as $article => $PannierElement) {
                    
               $total += $PannierElement['prix'];
            }
        }

        return $total;   
    }
}



 $panierController = new BasketController();

