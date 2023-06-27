<div class="profile">
    <div class="userinfos">
        Pseudo:
        <?= $user->role; ?>
    </div>

    <?php if ($user->role === "seller") { ?>
        <div class="product">
            <div class="products-list">
                <?php foreach ($listSellerProduct as $product) : ?> 
                    <div class="product-card" data-href="/Product/<?= $product->id ?>">
                        <img src="<?= $product->image ?>" alt="">
                        <h3><?= $product->nom ?></h3>
                        <p><?= $product->description ?></p>
                        <p><?= $product->price ?> €</p>
                        <p><?= $product->pseudo ?></p>
                        <form method="post" action="/Product/Status/<?= $product->id; ?>">
                            <button class="status <?= $product->statut == 1 ? "on" : "off"; ?>">
                                <span class="status-marker"></span>
                                <?= $product->statut == 1 ? "actif" : "inactif"; ?>
                            </button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php } ?>
</div>