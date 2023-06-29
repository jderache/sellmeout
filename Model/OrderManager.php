<?php
namespace Model;

class OrderManager extends ModelManager {
    public function __construct() {
        parent::__construct("orders"); // Appel du constructeur parent avec le nom de la table "orders"
    }

    public function addOrder($orderItems, $userId) {
      // Insérer la commande principale dans la table "orders"
      $query = "INSERT INTO " . $this->table . " (created_at, userId) VALUES (CURRENT_TIMESTAMP, ?)";
      $req = $this->bdd->prepare($query);
      $req->execute([$userId]);
  
      $orderId = $this->bdd->lastInsertId();
  
      // Insérer les éléments de commande dans la table "order_items"
      foreach ($orderItems as $item) {
          $productId = $item['id'];
          $quantity = $item['quantite'];
          $price = $item['prix'] * $quantity;
          $query = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)";
          $req = $this->bdd->prepare($query);
          $req->execute([$orderId, $productId, $quantity, $price]);
      }
    }
    public function getByUserId($userId) {
        $query = "SELECT orders.id, orders.created_at
        FROM orders
        WHERE orders.userId = ? ORDER BY orders.created_at DESC";
        
        $req = $this->bdd->prepare($query);
        $req->execute([$userId]);
    
        return $req->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getBySellerId($userId) {
        $query = "SELECT orders.id, orders.created_at
        FROM orders
        INNER JOIN order_items ON orders.id = order_items.order_id
        INNER JOIN product ON order_items.product_id = product.id
        WHERE product.userId = ? ORDER BY orders.created_at DESC";

        $req = $this->bdd->prepare($query);
        $req->execute([$userId]);
        
        return $req->fetchAll(\PDO::FETCH_OBJ);
    }
    
    
    
}
