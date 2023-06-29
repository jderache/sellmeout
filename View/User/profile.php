<div class="profile">
    <div class="container">
        <!-- <p>Vous êtes connectés en tant que <?= $user->pseudo; ?></p> -->
        <?php if(isset($_SESSION['user']) && $_SESSION['user']->role == "buyer"){ ?>
            <?php if(empty($orders)): ?>
                  <p>Vous n'avez passer aucune commande</p>
            <?php else: ?>
                  <h1>Mes commandes</h1>
                  <?php foreach($orders as $order): ?>
                        <?php $totalPrice = 0; ?>
                        <div class="order">
                        <details>
                              <?php $date = new DateTime($order->created_at);
                              $formattedDate = $date->format('d/m/Y'); ?>
                              <summary class="order">Commande n°<?= $order->id; ?>&nbsp;-&nbsp;<?= $formattedDate ?></summary>
                              <?php foreach($order->products as $product): ?>
                                    <?php $productTotalPrice = $product->price * $product->quantity; 
                                          $totalPrice += $productTotalPrice;
                                    ?>
                                    <div class="product">
                                          <img src="<?= $product->image; ?>" alt="" srcset="">
                                          <div class="desc">
                                                <p>Produit : <?= $product->nom; ?></p>
                                                <p>Quantité : <?= $product->quantity; ?></p>
                                                <p>Prix : <?= $product->price; ?> €</p>
                                                <form method="POST" action="products/<?= $product->id ?>/rate">
                                                      Note du produit : <input class="form-input" type="number" id="rate" name="rate" step="1" min="0"  max='5' required>

                                                </form>
                                          </div>
                                    </div>
                                    <?php endforeach; ?>
                              <div class="container-price">
                                    <p class="price">Prix total de la commande : <?= $totalPrice; ?> €</p>
                              </div>
                        </details>
                        </div>
                  <?php endforeach; ?>
            <?php endif; ?>
      <?php } ?>
      <?php if(isset($_SESSION['user']) && $_SESSION['user']->role == "seller"){ ?>
            <h1>Mes ventes</h1>
            <?php if(empty($orders)): ?>
                  <p>Vous n'avez aucune vente</p>
            <?php else: ?>
                  <?php foreach($orders as $order): ?>
                        <?php $totalPrice = 0; ?>
                        <div class="order">
                        <details>
                              <?php $date = new DateTime($order->created_at);
                              $formattedDate = $date->format('d/m/Y'); ?>
                              <summary class="order">Commande n°<?= $order->id; ?>&nbsp;-&nbsp;<?= $formattedDate ?></summary>
                              <?php foreach($order->products as $product): ?>
                                    <?php if ($product->userId == $_SESSION['user']->id) : ?> 
                                          <?php $productTotalPrice = $product->price * $product->quantity; 
                                                $totalPrice += $productTotalPrice;
                                          ?>
                                          <div class="product">
                                                <img src="<?= $product->image; ?>" alt="" srcset="">
                                                <div class="desc">
                                                      <p>Produit : <?= $product->nom; ?></p>
                                                      <p>Quantité : <?= $product->quantity; ?></p>
                                                      <p>Prix : <?= $product->price; ?> €</p>
                                                </div>
                                          </div>
                                    <?php endif; ?>
                              <?php endforeach; ?>
                              <div class="container-price">
                                    <p class="price">Prix total de la commande : <?= $totalPrice; ?> €</p>
                              </div>
                        </details>
                        </div>
                  <?php endforeach; ?>
            <?php endif; ?>
      <?php } ?>
    </div>
</div>