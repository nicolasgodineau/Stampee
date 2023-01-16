{{ include('header.php', {title: 'Liste des enfants',pageHeader: 'Liste des enfants'})}}
<div class="pageDeDroite">
    <div class="mereNoel">
        <img src="{{path}}/img/MereNoel.png" alt="Mere Noel">
    </div>
    {% if session.id_privilege == 1 or session.id_privilege == 2 %}
    <table class="tableau">
        <thead>
            <tr>
                <th><strong>Nom : </strong></th>
                <th><strong>Prénom : </strong></th>
                <th><strong>Pays : </strong></th>
            </tr>
        </thead>
        <tbody>
            {% for enfant in enfants %}
            <tr>
                <td>{{ enfant.nom }}</td>
                <td>{{ enfant.prenom }}</td>
                <td>{{ enfant.pays }}</td>
                {% if session.id_privilege == 1 %}
                <td><a href="{{ path }}book/show/{{ enfant.idEnfant }}">Fiche</a></td>
                {% endif %}
            </tr>
            {% endfor %}
        </tbody>
    </table>
    {% elseif session.id_privilege == 1 %}
    <a href="{{path}}book/create">Ajout d'un enfant sur la liste</a>
    {% endif %}
</div>
</main>