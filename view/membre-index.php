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
        <em>Compte</em>
    </nav>
    <main class="compte flex_row flex_align_center">
        <section class="compte_profil flex_column">
            <div class="compte_photo ">
                <img src="assets/img/icons/user.svg" alt="Image" class="shadow">
            </div>
            <h4 class="text-center">Nicolas Godineau</h4>
            <div class="compte_menu flex_column">
                <details open>
                    <summary>
                        <h4>Créer une enchère</h4>
                    </summary>
                    <h6>Création d'une enchere</h6>
                    <form class="flex_column" action="{{ path }}membre/update" method="post">
                        <div class="info_perso flex_column">
                            <input type="text" name="idMembre" value="{{membre.idMembre}}">
                            <div class="flex_row flex_align_center">
                                <i class="fa-solid fa-user"></i><input aria-label="nomTimbre" type="text"
                                    name="nomTimbre" id="nomTimbre" placeholder="Nom du timbre" value="">
                            </div>
                        </div>
                    </form>
                </details>
                <details>
                    <summary>
                        <i class="fa-solid fa-user"></i>
                        <h4>Informations personnelles</h4>
                    </summary>
                    <form class="flex_column" action="{{ path }}membre/update" method="post">
                        <div class="info_perso flex_column">
                            <input type="hidden" name="Role_idRole" value=1>
                            <input type="hidden" name="idMembre" value="{{membre.idMembre}}">
                            <div class="flex_row flex_align_center">
                                <i class="fa-solid fa-user"></i><input aria-label="nom" type="text" name="nom" id="nom"
                                    placeholder="Nom" value="{{membre.nom}}" pattern="[A-Za-z]{1,15}"
                                    title="Champ prénom invalide 15 lettres maximum exemple: john">
                            </div>
                            <div class="flex_row flex_align_center">
                                <i class="fa-solid fa-user"></i><input aria-label="prenom" type="text" name="prenom"
                                    id="prenom" placeholder="Prénom" value="{{membre.prenom}}">
                            </div>
                            <div class="flex_row flex_align_center">
                                <i class="fa-solid fa-phone"></i><input aria-label="telephone" type="text"
                                    name="telephone" id="telephone" placeholder="Téléphone"
                                    value="{{membre.telephone}}">
                            </div>
                            <div class="flex_row flex_align_center">
                                <i class="fa-solid fa-house"></i><input aria-label="adresse" type="text" name="adresse"
                                    id="adresse" placeholder="Adresse" value="{{membre.adresse}}">
                            </div>
                            <div class="flex_row flex_align_center">
                                <i class="fa-solid fa-house"></i>
                                <select class="placeholder" aria-label="pays" type="text" name="pays" id="pays"
                                    placeholder="Pays" required">
                                    <option selected>Votre pays</option>
                                    {% for pays in paysS %}
                                    <option value="{{ pays.idPays }}" {% if pays.idPays == membre.Pays_idPays %}
                                        selected {% endif %}>
                                        {{pays.pays}}</option>

                                    {% endfor %}
                                </select>
                            </div>
                            <input class="call_to_action bleu" type="submit" value="Sauvegarder">
                        </div>
                    </form>
                </details>
                <details>
                    <summary>
                        <i class="fa-solid fa-user"></i>
                        <h4>Date de naissance</h4>
                    </summary>
                    <div class="info_date_naissance flex_column">

                        <div class="date_naissance flex_row">
                            <div class="flex_row flex_align_center">
                                <i class="fa-solid fa-cake-candles"></i><input aria-label="jourNaissance" type="text"
                                    name="jourNaissance" id="jourNaissance" placeholder="JJ" required>
                            </div>
                            <div class="flex_row flex_align_center">
                                <i class="fa-solid fa-cake-candles"></i><input aria-label="moisNaissance" type="text"
                                    name="moisNaissance" id="moisNaissance" placeholder="MM" required>
                            </div>
                            <div class="flex_row flex_align_center">
                                <i class="fa-solid fa-cake-candles"></i><input aria-label="anneeNaissance" type="text"
                                    name="anneeNaissance" id="anneeNaissance" placeholder="AA" required>
                            </div>
                        </div>
                    </div>
                </details>
                <details>
                    <summary>
                        <i class="fa-solid fa-lock"></i>
                        <h4>Mot de passe</h4>
                    </summary>
                    <form class="flex_column" action="" method="post">
                        <div class="info_connexion flex_column">
                            <h4>Changer votre mot de passe</h4>
                            <div class="flex_row flex_align_center">
                                <i class="fa-solid fa-lock"></i><input aria-label="password" type="text" name="password"
                                    id="password" placeholder="Ancien mot de passe" required>
                            </div>
                            <div class="flex_row flex_align_center">
                                <i class="fa-solid fa-lock"></i><input aria-label="password" type="text" name="password"
                                    id="password" placeholder="Nouveau mot de passe" required>
                            </div>
                            <div class="flex_row flex_align_center">
                                <i class="fa-solid fa-lock"></i><input aria-label="passwordConfirm" type="text"
                                    name="passwordConfirm" id="passwordConfirm" placeholder="Confirmer le mot de passe"
                                    required>
                            </div>
                        </div>
                        <button class="call_to_action bleu" type="submit">Enregister les modifications</button>
                    </form>
                </details>
            </div>
        </section>
    </main>
    {{ include('footer.php') }}