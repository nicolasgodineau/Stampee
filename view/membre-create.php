{{ include('header.php', {title: 'Inscription'})}}

{% block my_javascripts %}
<script src="{{ path }}assets/scripts/validation.js" type="text/javascript" defer></script>
<script src="{{ path }}assets/scripts/api.js" type="text/javascript" defer></script>

{% endblock %}

<body>
    {{include('menu.php')}}
    <header class="header_principal flex_row flex_align_center flex_justify_center" id="top">
        <h1 class="principale">Création d'un compte</h1>
    </header>
    <nav class="fil_ariane">
        <i class="fa-solid fa-house"></i>
        <a class='retour' href="{{ path }}home/index">Accueil</a>
        <i class="fa-solid fa-arrow-right"></i>
        <em>Inscription</em>
    </nav>
    <main class="formulaire_inscription">
        <form class="flex_column" action="{{ path }}membre/store" method="post">
            <div class="info_perso flex_column">
                <h4>Informations personnelles</h4>
                <input type="hidden" name="Role_idRole" value=1>
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
                    <i class="fa-solid fa-house"></i><input aria-label="ville" type="text" name="ville" id="ville"
                        placeholder="Ville" value="{{membre.ville}}">
                </div>
            </div>
            <div class="info_connexion flex_column">
                <h4>Informations de connexion</h4>
                <div class="flex_row flex_align_center">
                    <i class="fa-solid fa-envelope"></i><input aria-label="email" type="email" name="email" id="email"
                        placeholder="Email" value="{{ membre.email }}" required>
                </div>
                <div class="flex_row flex_align_center">
                    <i class="fa-solid fa-lock"></i><input aria-label="password" type="text" name="password"
                        id="password" placeholder="Mot de passe ex: 123456" pattern="[0-9]{6,9}"
                        title="6 caractères minimum et uniquement des chiffres" required>
                </div>
            </div>
            <button class="call_to_action bleu" type="submit">S'inscrire</button>
        </form>
    </main>
    {{ include('footer.php') }}