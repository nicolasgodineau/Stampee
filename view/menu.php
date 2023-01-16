<body>
    <header class="blur fixe" id="top">
        <nav class="flex_row">
            <div class="zone_gauche flex_row">
                <img class="logo" src="{{ path }}assets/img/logo/Logo.webp" alt="Logo">
                <a class="hover_underligne" href="#">À propos de Lord Reginald Stampee III</a>
            </div>
            <div class="zone_droite flex_row">
                <a class="hover_underligne" href="../home/index">Actualités</a>
                <a class="hover_underligne" href="../enchere/index">Enchères</a>
                {% if session.Role_idRole == 1 %}
                <h2>Bienvenue {{session.prenom}}</h2>
                <a class="call_to_action blanc" href="#">Mon compte</a>
                <a class="hover_underligne" href="{{ path }}membre/logout">Se déconnecter</a>

                {% elseif session.Role_idRole == 1 %}
                <a href="{{path}}book/create">Ajout d'un enfant sur la liste</a>
                {% endif %}
                {% if not session.Role_idRole == 1 or session.Role_idRole == 2 %}
                <a class="call_to_action blanc" href="../membre/login">Connexion</a>
                <a class="call_to_action blanc" href="../membre/create">Inscription</a>
                {% endif %}
            </div>
        </nav>
    </header>