{{ include('header.php', {title: 'Modification fiche',pageHeader: 'Modification de la fiche '})}}
<div class="pageDeDroite">
    <ul>
        <li><strong>Nom : </strong>{{enfant.nom}} </li>
    </ul>
    <ul>
        <li><strong>Prénom : </strong>{{enfant.prenom}} </li>
    </ul>
    <ul>
        <li><strong>Pays : </strong>{{enfant.pays}} </li>
    </ul>
    <label>Ville
        <select name="pays_id">
            {% for pays in pays %}
            <option value="{{ pays.idPays }}" {% if pays.id == pays.idPays %} selected {% endif %}>
                {{ pays.pays }}
            </option>
            {% endfor %}
        </select>
    </label>
    <ul>
        <li>
            <p class="btnAction"><a href="{{ path }}book/edit/{{enfant.idEnfant}}">Modifier</a></p>
        </li>
    </ul>
</div>
</div>
</main>
</body>

</html>