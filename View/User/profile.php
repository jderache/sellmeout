<div class="profile">
    <div class="container">
        <p>Vous êtes connectés en tant que <?= $user->pseudo; ?></p>
        <?php if(isset($_SESSION['user']) && $_SESSION['user']->role == "buyer"){ ?>
            <?php if(empty($orders)): ?>
                  <p>Vous n'avez passer aucune commande</p>
            <?php else: ?>
                  <p>Vous avez commandé récemment:</p>
                  <?php foreach($orders as $order): ?>
                        <div class="order">
                              <p>Commande n°<?= $order->id; ?></p>
                              <p>Le <?= $order->created_at; ?></p>
                              <p>Produit : <?= $order->nom; ?></p>
                              <p>Quantité : <?= $order->quantity; ?></p>
                              <p>Prix : <?= $order->price; ?> €</p>
                        </div>
                  <?php endforeach; ?>
            <?php endif; ?>
      <?php } ?>
    </div>
</div>