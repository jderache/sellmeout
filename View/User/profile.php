<div class="profile">
    <div class="container">
        <p>Vous êtes connectés en tant que <?= $user->pseudo; ?></p>
    </div>
   <?php
   var_dump($orders);
   ?>
   <p>Vous avez commandé :</p>
    <?php foreach($orders as $order): ?>
          <div class="order">
                <p>Commande n°<?= $order->id; ?></p>
                <p>Le <?= $order->created_at; ?></p>
                <p>Produit : <?= $order->nom; ?></p>
                <p>Quantité : <?= $order->quantite; ?></p>
                <p>Prix : <?= $order->prix; ?> €</p>
          </div>
    <?php endforeach; ?>
</div>