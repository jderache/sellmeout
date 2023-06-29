<div class="container">
  <h1>Produit <?= $product->nom ?></h1>
  <div class="product">
    <div class="product-card">
      <div class="product-image">
        <img src="<?= $product->image ?>" alt="">
      </div>
      <div>
        <h3><?= $product->nom ?></h3>
        <p><?= $product->description ?></p>
        <p><?= $product->price ?> €</p>
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
        <div class="stars">
          <?php 
          for ($i = 0; $i < $product->rate; $i++) {
              echo '<i class="fa-solid fa-star" id="stars"></i>';
          }
          ?>
        </div>
      </div>
    </div>
</div>