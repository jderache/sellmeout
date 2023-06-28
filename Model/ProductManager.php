<?php
namespace Model;

use Exception;

class ProductManager extends ModelManager{

    public function __construct()
    {
        parent::__construct("product");
    }

    public function getAllWithUser(){
        $req = $this->bdd->prepare("SELECT product.*,user.pseudo FROM " . $this->table . " INNER JOIN user ON product.userId = user.id WHERE product.statut = :statut");
        $val = 1;
        $req->bindParam(":statut", $val);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetchAll();
    }

    public function getAllSeller($seller_id)
    {
        $req = $this->bdd->prepare("SELECT product.*,user.pseudo as pseudo FROM product INNER JOIN user ON product.userId = user.id WHERE userId = :seller_id");
        $req->bindParam(":seller_id", $seller_id);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetchAll();
    }

    public function ToggleStatus($product_id,$seller_id)
    {
        $req = $this->bdd->prepare("SELECT * FROM product WHERE id = :product_id");
        $req->bindParam(":product_id", $product_id);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        $product = $req->fetch();
        var_dump($product);
        if($product->userId == $seller_id){
            $req = $this->bdd->prepare("UPDATE product SET statut = :status WHERE id = :product_id");
            $req->bindParam(":product_id", $product_id);
            $status = $product->statut == 1?0:1;
            $req->bindParam(":status", $status);
            $req->execute();
            return $req->rowCount() == 1;
        }else{
            throw new Exception("Vous n'avez pas les droits pour modifier ce produit");
        }
       
    }

    public function getBySearch($search)
    {
        $req = $this->bdd->prepare("SELECT * FROM product
        WHERE product.nom LIKE :search AND product.statut = 1");
        $req->bindValue(":search", "%" . $search . "%");
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetchAll();
    }
    
}
