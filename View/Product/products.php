<div class="container">
    <div class="products">
        <h2>Liste des produits en vente</h2>
        <input type="search" id="search">
        <a href="/products/search/" id="search-btn">Rechercher</a>
        <div class="products-list">
            <?php if(empty($products)): ?>
                <p style="text-align: center; color:#F81649;">Il n'y a pas de produit en vente pour le moment.<br>Revenez plus tard !</p>
            <?php endif; ?>

            <?php foreach($products as $product): ?>
                <div class="product-card" data-href="/product/<?= $product->id ?>">
                    <img src="<?= $product->image ?>" alt="">
                    <h3><?= $product->nom ?></h3>
                    <p><?= $product->description ?></p>
                    <p><?= $product->price ?> €</p>
                    <?php if(isset($product->pseudo)): ?>
                        <p><?= $product->pseudo ?></p>
                    <?php endif; ?>
                    <form method="post" action="/basket/add">
                        <input type="hidden" name="id" value="<?= $product->id ?>">
                        <input type="submit" value="Ajouter au panier">
                    </form>
                </div>
            <?php endforeach; ?>

            <script>
                document.getElementById("search").addEventListener("keyup", function(event) {
                    document.getElementById("search-btn").href = encodeURI("/products/search/" + event.target.value);
                });
            </script>
        </div>
    </div>
</div>