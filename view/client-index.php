{{ include('header.php', {title: 'Client', pageHeader: 'Client list'})}}
    <main>
        <section>
        {% if session.privilege_id == 1 %}
            <a href="{{ path }}client/create" class="btn">Ajouter</a>
        {% endif %}   
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>email</th> 
                        <th>edit</th>                       
                    </tr> 
                </thead>
                <tbody>
                    {% for client in clients %}
                    <tr>
                        <td>{{ client.nom }}</td>
                        <td>{{ client.courriel }}</td>
                        <td><a href="{{ path }}client/show/{{ client.id}}">Vue</a></td>
                    </tr>
                    {% endfor %}
                </tbody>
                
            </table>
        </section>
    </main>
    <footer>
        Tous les droits
    </footer>
</body>
</html>