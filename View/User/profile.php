<div class="profile">
    <div class="container">
        <!-- <p>Vous êtes connectés en tant que <?= $user->pseudo; ?></p> -->
        <?php if(isset($_SESSION['user']) && $_SESSION['user']->role == "buyer"){ ?>
            <?php if(empty($orders)): ?>
                  <p>Vous n'avez passer aucune commande</p>
            <?php else: ?>
                  <h1>Mes commandes</h1>
                  <?php foreach($orders as $order): ?>
                        <div class="order">
                        <details>
                              <?php $date = new DateTime($order->created_at);
                              $formattedDate = $date->format('d/m/Y'); ?>
                        
                              <summary class="order">Commande n°<?= $order->id; ?>&nbsp;-&nbsp;<?= $formattedDate ?></summary>
                              <?php foreach($order->products as $product): ?>
                                    <div class="product">
                                          <img src="<?= $product->image; ?>" alt="" srcset="">
                                          <div class="desc">
                                                <p>Produit : <?= $product->nom; ?></p>
                                                <p>Quantité : <?= $product->quantity; ?></p>
                                                <p>Prix : <?= $product->price; ?> €</p>
                                          </div>
                                    </div>
                              <?php endforeach; ?>
                        </details>
                        </div>
                  <?php endforeach; ?>
            <?php endif; ?>
      <?php } ?>
    </div>
</div>