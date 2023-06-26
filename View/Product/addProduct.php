<h2>Ajout produit</h2>

<form action="/product/new" method="POST">
    <label for="nom">Nom</label>
    <input type="text" id="nom" name="nom">
    <label for="description">Description</label>
    <textarea name="description" id="description" cols="30" rows="10"></textarea>
    <label for="price">prix</label>
    <input type="number" id="price" name="price" step="0.01" min="0">
    <select for='statut' name='statut'>
        <option value='Publié'>Publié</option>
        <option value='Non publié'>Non publié</option>
    </select>
    <button type="submit">Ajouter</button>

</form>