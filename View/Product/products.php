<div class="container">
    <div class="products">
        <h2>Liste des produits</h2>
        <div class="products-list">
            <?php foreach($products as $product): ?>
                <div class="product-card" data-href="/Product/<?= $product->id ?>">
                    <img src="<?= $product->image ?>" alt="">
                    <h3><?= $product->nom ?></h3>
                    <p><?= $product->description ?></p>
                    <p><?= $product->price ?> €</p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>