<?php 
namespace Controller;

class OrderController extends BaseController {

    protected $orderManager;

    public function addOrder() {
        $this->orderManager->addOrder($_SESSION["panier"], $_SESSION["user"]->id);
        echo "Commande enregistrée !";
        unset($_SESSION['panier']);
        header('Location: /basket');
    }
    
}

