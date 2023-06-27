<div class="container">
    <h2>Ajouter un produit à la vente</h2>
</div>
    <form class="my-form" action="/product/new" method="POST">
        <label for="nom">Nom du produit</label>
        <input class="form-input" type="text" id="nom" name="nom" required>
        <label for="description">Description du produit</label>
        <textarea class="form-input" name="description" id="description" cols="30" rows="10" required></textarea>
        <label for="price">Prix du produit</label>
        <div class="icon">
            <i>€</i>
            <input class="form-input" type="number" id="price" name="price" step="0.01" min="0" required>
        </div>
        <label for="statut">Souhaitez-vous publier le produit immédiatement&nbsp;?</label>
        <select class="form-select" id='statut' name='statut' required>
            <option value='1'>Oui</option>
            <option value='0'>Non</option>
        </select>
        <button class="form-button" type="submit">Ajouter</button>
    </form>
