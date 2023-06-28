<?php
namespace Model;

class OrderItemsManager extends ModelManager {
    public function __construct()
    {
        parent::__construct("order_items");
    }

    function getItemsByCommandId($id) {
      $req = $this->bdd->prepare("SELECT * FROM order_items INNER JOIN product ON product.id=order_items.product_id WHERE order_items.order_id = ?");
      $req->execute([$id]);
      return $req->fetchAll(\PDO::FETCH_OBJ);
    }
}