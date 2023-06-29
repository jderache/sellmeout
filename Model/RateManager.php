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

    // permet de noter un produit
    public function takeRateProduct($product_id, $rate){
        $req = $this->bdd->prepare("INSERT INTO rates (id, productId, rating, userId) VALUES (NULL, :productId, :rating, :userId)");;
        $req->bindParam(":productId", $product_id);
        $req->bindParam(":rating", $rate);
        $req->bindParam(":userId", $_SESSION["user"]->id);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetch();
    }

}