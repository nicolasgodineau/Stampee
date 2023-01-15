{{ include('header.php', {title: 'Produit',pageHeader: 'Saisir le produit à ajouter'})}}
<main>

    <span class="error">{{ errors|raw }}</span>

    <form action="{{ path }}produit/store" method="post">
        <label>Nom
            <input type="text" name="nom" value="{{ data.nom }}">
        </label>
        <label>Description
            <textarea name="description" value="{{ data.description }} id="" cols=" 30" rows="5"></textarea>
        </label>
        <label>prix
            <input type="number" name="prix" value="{{ data.prix }}">
        </label>
        <input type="submit" value="Save">
    </form>
</main>
</body>

</html>