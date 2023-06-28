<div class="container">
    <div class="products">
        <h2>Liste des produits en vente</h2>
        <div class="products-list">
            <?php if(empty($products)): ?>
                <p style="text-align: center; color:#F81649;">Il n'y a pas de produit en vente pour le moment.<br>Revenez plus tard !</p>
            <?php endif; ?>

            <?php foreach($products as $product): ?>
                <div class="product-card" data-href="/Product/<?= $product->id ?>">
                    <img src="<?= $product->image ?>" alt="">
                    <h3><?= $product->nom ?></h3>
                    <p><?= $product->description ?></p>
                    <p><?= $product->price ?> €</p>
                    <p><?= $product->pseudo ?></p>
                    <form method="post" action="/basket/add">
                        <input type="hidden" name="id" value="<?= $product->id ?>">
                        <input type="submit" value="Ajouter au panier">
                    </form>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>