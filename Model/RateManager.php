<?php
namespace Model;

class RateManager extends ModelManager{

    public function __construct()
    {
        parent::__construct("rates");
    }

    // get rate of product according to current user
    public function getCurrentRate($product_id) {
        $req = $this->bdd->prepare("SELECT * FROM rates WHERE productId = :productId");
        $req->bindParam(":productId", $product_id);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetch();
    }

}