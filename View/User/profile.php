<script src='/View/User/js/profile.js' defer></script>
<div class="profile">
    <div class="container">
        <!-- <p>Vous êtes connectés en tant que <?= $user->pseudo; ?></p> -->
        <?php if(isset($_SESSION['user']) && $_SESSION['user']->role == "buyer"){ ?>
            <?php if(empty($orders)): ?>
                  <h1>Mes commandes</h1>
                  <p style="text-align: center;">Vous n'avez encore passé aucune commande pour le moment.</p>
            <?php else: ?>
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
                                                      Note du produit : 
                                                      <div class="rating-stars">            
                                                            <i class="fa-solid fa-star" data-value="1"></i>
                                                            <i class="fa-solid fa-star" data-value="2"></i>
                                                            <i class="fa-solid fa-star" data-value="3"></i>
                                                            <i class="fa-solid fa-star" data-value="4"></i>
                                                            <i class="fa-solid fa-star" data-value="5"></i>
                                                      </div>
                                                      <input type="hidden" id="rating-input" name="rate" value="0">
                                                      <input type="submit" class="button-rate" value = "Envoyer ma note"method="POST" action="products/<?= $product->id ?>/rate">
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
                  <p style="text-align: center;">Vous n'avez encore réalisé aucune vente pour le moment.</p>
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