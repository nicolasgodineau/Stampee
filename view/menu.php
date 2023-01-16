<menu class="menuGauche">
    <h2>Menu</h2>
    <h3>Bonjour {{session.nom_utilisateur}}</h3>
    <a href="{{path}}">Accueil</a>
    {% if guest %}
    <li><a href='{{path}}user/create'>Créer un compte</a></li>
    <li><a href="{{path}}user/login">Se connecter</a></li>
    {% else %}
    <a href="{{ path }}user/logout">Logout</a>
    {% endif %}
    {% if session.id_privilege == 1 or session.id_privilege == 2 %}
    <a href="{{path}}book">Liste des enfants</a>
    {% endif %}
    {% if session.id_privilege == 1 %}
    <a href="{{path}}book/create">Ajout d'un enfant sur la liste</a>
    {% endif %}
    <li>
        <form action="" method="post">
            <input class="small" type="submit" value="Envoyer moi un mail !">
        </form>
    </li>
</menu>
<header>
    <h1>{{ pageHeader}}</h1>
</header>
<aside>
    {% if errors is defined %}
    <span class="error">{{ errors | raw}}</span>
    {% endif %}
</aside>
</body>