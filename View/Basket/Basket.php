<div class="Basket-Wrapper">
<?php
    if(isset($products)){
        foreach ($products as $product):?>
            <div class="ProduitElement">
                <img class="basketImage" src="<?= $product['image']?>" alt="Image">
                <div class="ProduitInfo"> 
                    <h3><?= $product['name'] ?></h3>
                    <form action="/basket/delete" method="post">
                        <input type="hidden" name='id' value="<?=$product['id']?>">
                        <button  class="deleteBasket" type="submit">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                    <span>Prix : <?= $product['prix']?> €</span>
                    <div>
                        <form method="post" action="/basket/update">
                            <input type="hidden" name="id" value="<?=$product['id']?>">
                            <label for="quantite">Quantité : </label>
                            <div class="set-info">
                                <input class='IptQte' id='quantite' name="quantite" type="number" min="0" step="1" value="<?= $product['quantite'];?>">
                                <input type="submit" value="Mettre à jour le panier" class="reload-cart">
                            </div>
                        </form>
                    </div>
                    <p class='description'>Description : <?=$product['description']?></p>
                </div>
            </div>     
        <?php  endforeach;?>
                <h3>Prix total : <?=$total?>€</h3>
                <form method="POST" action="/basket/confirm">
                <button class="Commander">
                    <i class="fa-solid fa-credit-card"></i>
                    Commander
                </button>
                </form>
            <?php } else{ ?>
                <div class="EmptyCart">
                    <span>Aucun article dans votre panier.</span>
                </div>
            <?php
                }
            ?>
</div>
