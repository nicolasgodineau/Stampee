{{ include('header.php', {title: 'Edit Client', pageHeader:'Modifier'})}}
<main>
        <form action="{{ path }}client/update" method="post">
            <input type="hidden" name="id" value="{{ client.id }}">
            <label>Nom 
                <input type="text" name="nom" value="{{ client.nom}}">
            </label>
            <label>Adresse
                <input type="text" name="adresse" value="{{ client.adresse}}">
            </label>
            <label>Postal Code
                <input type="text" name="postal_code" value="{{ client.postal_code}}">
            </label>
            <label>Courriel
                <input type="email" name="courriel" value="{{ client.courriel}}">
            </label>
            <label>Ville
                <select name="ville_id">
                    {% for ville in villes %}
                    <option value="{{ ville.id }}" {% if ville.id == client.ville_id %} selected {% endif %}>{{ ville.ville }}</option>
                    {% endfor %}
                </select>
            </label>
            <input type="submit" value="Modifier">
        </form>
        <form action="{{ path }}client/delete" method="post">
            <input type="hidden" name="id" value="{{ client.id}}">
            <input type="submit" value="Effacer">
        </form>
    </main>
    
</body>
</html>