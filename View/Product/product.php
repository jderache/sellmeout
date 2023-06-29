<div class="container">
<div class="return">
      <i class="fa-solid fa-arrow-left"></i>&nbsp;<a href="/products">Retour à la liste des produits</a>
  </div>
  <div class="product">
    <h1><?= $product->nom ?></h1>
    <div class="product-card">
      <div class="product-image">
        <img src="<?= $product->image ?>" alt="">
      </div>
      <div class="desc">
        <h3><?= $product->price ?> €</h3>
        <p><?= $product->description ?></p>
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
            <div class="stars">
              <?php 
          for ($i = 0; $i < $product->rate; $i++) {
            echo '<i class="fa-solid fa-star" id="stars"></i>';
          }
          ?>
        </div>
        <p>Seller&nbsp;: <?= $product->pseudo ?></p>
      </div>
    </div>
</div>