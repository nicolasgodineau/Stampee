{{ include('header.php', {title: 'Connexion'})}}

<body>
    {{include('menu.php')}}
    <header class="header_principal flex_row flex_align_center flex_justify_center" id="top">
        <h1 class="principale">Bienvenue {{session.prenom}}</h1>
    </header>
    <nav class="fil_ariane">
        <i class="fa-solid fa-house"></i>
        <a class='retour' href="../home/index">Accueil</a>
        <i class="fa-solid fa-arrow-right"></i>
        <em>Edition de votre compte</em>
    </nav>
    <main class="formulaire_inscription">
        <form class="flex_column" action="{{ path }}membre/update" method="post">
            <div class="info_perso flex_column">
                <h4>Informations personnelles</h4>
                <input type="hidden" name="Role_idRole" value=1>
                <input type="hidden" name="idMembre" value="{{membre.idMembre}}">
                <div class="flex_row flex_align_center">
                    <i class="fa-solid fa-user"></i><input aria-label="nom" type="text" name="nom" id="nom"
                        placeholder="Nom" value="{{membre.nom}}" pattern="[A-Za-z]{1,15}"
                        title="Champ prénom invalide 15 lettres maximum exemple: john">
                </div>
                <div class="flex_row flex_align_center">
                    <i class="fa-solid fa-user"></i><input aria-label="prenom" type="text" name="prenom" id="prenom"
                        placeholder="Prénom" value="{{membre.prenom}}">
                </div>
                <div class="flex_row flex_align_center">
                    <i class="fa-solid fa-phone"></i><input aria-label="telephone" type="text" name="telephone"
                        id="telephone" placeholder="Téléphone" value="{{membre.telephone}}">
                </div>
                <div class="flex_row flex_align_center">
                    <i class="fa-solid fa-house"></i><input aria-label="adresse" type="text" name="adresse" id="adresse"
                        placeholder="Adresse" value="{{membre.adresse}}">
                </div>
                <div class="flex_row flex_align_center">
                    <i class="fa-solid fa-house"></i>
                    <select class="placeholder" aria-label="pays" type="text" name="pays" id="pays" placeholder="Pays"
                        required">
                        <option selected>Votre pays</option>
                        {% for pays in paysS %}
                        <option value="{{ pays.idPays }}" {% if pays.idPays == membre.Pays_idPays %} selected
                            {% endif %}>
                            {{pays.pays}}</option>

                        {% endfor %}
                    </select>
                </div>
                <input class="call_to_action bleu" type="submit" value="Sauvegarder">


        </form>
        <form action="{{ path }}membre/delete" method="post">
            <input type="hidden" name="idMembre" value="{{membre.idMembre}}">
            <input class="call_to_action blanc" type="submit" value="Effacer">
        </form>
    </main>
    {{ include('footer.php') }}