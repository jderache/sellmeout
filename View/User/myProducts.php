<div class="profile">
  <div class="container">
          <h1>Mes produits</h1>
          <p style="text-align: center;">Votre identifant vendeur est le suivant :&nbsp;<?= $user->mail; ?></p>


      <?php if ($user->role === "seller") { ?>
        
          <div class="product">
              <div class="products-list">
              <?php if (empty($listSellerProduct)): ?>
                <p style="text-align: center;">Aucun produit n'a été ajouté pour le moment.</p>
                <?php else: ?>
                    <?php foreach ($listSellerProduct as $product): ?>
                        <div class="product-card" data-href="/product/<?= $product->id ?>">
                            <img src="<?= $product->image ?>" alt="">
                            <h3><?= $product->nom ?></h3>
                            <p><?= $product->description ?></p>
                            <p><?= $product->price ?> €</p>
                            <p><?= $product->pseudo ?></p>
                            <form method="post" action="/product/status/<?= $product->id; ?>">
                                <button class="status <?= $product->statut == 1 ? "on" : "off"; ?>">
                                    <span class="status-marker"></span>
                                    <?= $product->statut == 1 ? "Article publié" : "Article non publié"; ?>
                                </button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
              </div>
          </div>
      <?php } ?>
</div>
</div>