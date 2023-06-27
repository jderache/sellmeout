<?php
namespace Model;

class ProductManager extends ModelManager{

    public function __construct()
    {
        parent::__construct("product");
    }

    public function getAllWithUser(){
        $req = $this->bdd->prepare("SELECT * FROM " . $this->table . " INNER JOIN user ON product.userId = user.id WHERE product.statut = :statut");
        $val = 1;
        $req->bindParam(":statut", $val);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetchAll();
    }
}
