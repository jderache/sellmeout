<?php
namespace Model;

class RateManager extends ModelManager{

    public function __construct()
    {
        parent::__construct("rates");
    }

    // permet d'avoir la dernière note d'un produit
    public function getCurrentRate($product_id) {
        $req = $this->bdd->prepare("SELECT * FROM rates WHERE productId = :productId");
        $req->bindParam(":productId", $product_id);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetch();
    }

    // permet de noter un produit et vérifier si il a déja noté 
    public function takeRateProduct($product_id, $rate) {
        $user_id = $_SESSION["user"]->id;
        $req = $this->bdd->prepare("SELECT * FROM rates WHERE productId = :productId AND userId = :userId");
        $req->bindParam(":productId", $product_id);
        $req->bindParam(":userId", $user_id);
        $req->execute();
        $existingRate = $req->fetch(\PDO::FETCH_OBJ);
    
        if ($existingRate) {
            $req = $this->bdd->prepare("UPDATE rates SET rating = :rating WHERE id = :rateId");
            $req->bindParam(":rating", $rate);
            $req->bindParam(":rateId", $existingRate->id);
            $req->execute();
            return $existingRate->id;
        } else {
            // Insérer une nouvelle note
            $req = $this->bdd->prepare("INSERT INTO rates (productId, rating, userId) VALUES (:productId, :rating, :userId)");
            $req->bindParam(":productId", $product_id);
            $req->bindParam(":rating", $rate);
            $req->bindParam(":userId", $user_id);
            $req->execute();
            $req->setFetchMode(\PDO::FETCH_OBJ);
            return $req->fetch();
        }
    }

    // permet d'avoir la moyenne des notes d'un produit
    public function getAvgRateProduct($product_id) {
        $req = $this->bdd->prepare("SELECT AVG(rating) AS moyenne_note FROM rates WHERE productId = :productId ;");
        $req->bindParam(":productId", $product_id);
        $req->execute();
        $result = $req->fetch(\PDO::FETCH_ASSOC);
        $average_rating = $result['moyenne_note'] !== null ? number_format($result['moyenne_note'], 0, '', '') : null;
        return $average_rating;
    }

    public function getRateFromUser($product_id, $user_id) {
        $req = $this->bdd->prepare("SELECT * FROM rates WHERE productId = :productId AND userId = :userId");
        $req->bindParam(":productId", $product_id);
        $req->bindParam(":userId", $user_id);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetch();
    }
}