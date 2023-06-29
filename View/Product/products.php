<div class="container">
    <div class="products">
        <h2>Liste des produits en vente</h2>
        <?php if(!empty($products)): ?>
        <div class="search-bar">
            <input type="search" id="search">
            <a href="/products/search/" id="search-btn">Rechercher</a>
        </div>
        <?php endif; ?>
        <div class="products-list">
        <?php if(empty($products) && strpos($_SERVER['REQUEST_URI'], '/search/') !== false): ?>
            <p style="text-align: center; color:#F81649;">Aucun produit n'a été trouvé.<br/><a href="/products" >Retourner à la liste des produits</a></p>
        <?php elseif(empty($products)): ?>
            <p style="text-align: center; color:#F81649;">Il n'y a pas de produit en vente pour le moment.<br>Revenez plus tard !</p>
        <?php endif; ?>

            <?php foreach($products as $product): ?>
                <a href="/product/<?= $product->id ?>">
                <div class="product-card" data-href="/product/<?= $product->id ?>">
                    <img src="<?= $product->image ?>" alt="">
                    <h3><?= $product->nom ?></h3>
                    <p><?= $product->description ?></p>
                    <p><?= $product->price ?> €</p>
                    <p>Notes :</p>
                    <div class="stars">
                        <?php 
                        for ($i = 0; $i < $product->rate; $i++) {
                            echo '<i class="fa-solid fa-star" id="stars"></i>';
                        }
                        ?>
                    </div>
                    <p><?= $product->pseudo ?></p>

                    <?php if(isset($_SESSION['user']) && $_SESSION['user']->role == "seller"): ?>
                    <?php else: ?>
                        <form method="post" action="/basket/add">
                            <input type="hidden" name="id" value="<?= $product->id ?>">
                            <div class="button-add">
                                <button type="submit" class="button-add-to-cart" value="Ajouter au panier"> 
                                    Ajouter au panier
                                    <i class="fa-sharp fa-solid fa-cart-plus"></i>
                                </button>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
                </a>
            <?php endforeach; ?>

            <script>
                document.getElementById("search").addEventListener("keyup", function(event) {
                    document.getElementById("search-btn").href = encodeURI("/products/search/" + event.target.value);
                });
            </script>
        </div>
    </div>
</div>