<div class="container">
  <h1>Produit <?= $product->nom ?></h1>
  <div class="product">
    <div class="product-card">
      <img src="<?= $product->image ?>" alt="">
      <h3><?= $product->nom ?></h3>
      <p><?= $product->description ?></p>
      <p><?= $product->price ?> €</p>
      <p><?= $product->pseudo ?></p>
    </div>
</div>