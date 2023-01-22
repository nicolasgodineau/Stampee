<header class="blur fixe" id="top">
    <nav class="flex_row">
        <div class="zone_gauche flex_row">
            <img class="logo" src="{{ path }}assets/img/logo/Logo.webp" alt="Logo">
            <a class="hover_underligne" href="#">À propos de Lord Reginald Stampee III</a>
        </div>
        <div class="zone_droite flex_row">
            <a class="hover_underligne" href="{{ path }}home/index">Actualités</a>
            <a class="hover_underligne" href="{{ path }}enchere/index">Enchères</a>
            {% if session.Role_idRole == 1 %}
            <a class="call_to_action blanc" href="{{ path }}membre/index/{{session.idMembre}}">Mon compte</a>
            <a class="call_to_action bleu" href="{{ path }}enchere/create">Créer une enchère</a>
            <a class="hover_underligne" href="{{ path }}membre/logout">Se déconnecter</a>

            {% elseif session.Role_idRole == 2 %}
            <h2>Administrateur</h2>
            {% endif %}
            {% if not session.Role_idRole == 1 or session.Role_idRole == 2 %}
            <a class="call_to_action blanc" href="{{ path }}membre/login">Connexion</a>
            <a class="call_to_action blanc" href="{{ path }}membre/create">Inscription</a>
            {% endif %}
        </div>
    </nav>
</header>