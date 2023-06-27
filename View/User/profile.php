<div class="profile">
    <div class="container">
        <p>Vous êtes connectés en tant que <?= $user->pseudo; ?></p>
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
    </div>
</div>