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
    <main class="compte formulaire_inscription flex_column">
        <div class="compte_photo flex_column flex_justify_center flex_align_center">
            <i class="fa-solid fa-user"></i>
        </div>
        <form class="flex_column" action="{{ path }}membre/update" method="post">
            <details>
                <summary>
                    <i class="fa-solid fa-circle-arrow-right"></i>
                    <h4>Informations personnelles</h4>
                </summary>
                <div class="info_perso flex_column">
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
                    <div class="flex_row flex_align_center">
                        <i class="fa-solid fa-phone"></i><input aria-label="telephone" type="text" name="telephone"
                            id="telephone" placeholder="Téléphone" value="{{membre.telephone}}">
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
                            <option value="{{pays.idPays}}">{{pays.pays}}</option>
                            {% endfor %}
                        </select>
                    </div>
            </details>
            <details>
                <summary>
                    <i class="fa-solid fa-circle-arrow-right"></i>
                    <h4>Informations de paiement</h4>
                </summary>
                <div class="info_perso flex_column">
                    <div class="flex_row flex_align_center">
                        <i class="fa-solid fa-credit-card"></i><input aria-label="carte_credit_numero" type="text"
                            name="carte_credit_numero" id="carte_credit_numero" placeholder="Nom et prénom du titulaire"
                            required>
                    </div>
                    <div class="flex_row flex_align_center">
                        <i class="fa-solid fa-credit-card"></i><input aria-label="carte_credit_numero" type="text"
                            name="carte_credit_numero" id="carte_credit_numero"
                            placeholder="Numéro de la carte de crédit" required>
                    </div>
                    <div class="date_naissance flex_row">
                        <div class="flex_row flex_align_center">
                            <i class="fa-solid fa-credit-card"></i><input aria-label="carte_credit_mois" type="text"
                                name="carte_credit_mois" id="carte_credit_mois" placeholder="MM" required>
                        </div>
                        <div class="flex_row flex_align_center">
                            <i class="fa-solid fa-credit-card"></i><input aria-label="carte_credit_annee" type="text"
                                name="carte_credit_annee" id="carte_credit_annee" placeholder="AA" required>
                        </div>
                        <div class="flex_row flex_align_center">
                            <i class="fa-solid fa-credit-card"></i><input aria-label="carte_credit_cvc" type="text"
                                name="carte_credit_cvc" id="carte_credit_cvc" placeholder="CVC" required>
                        </div>
                    </div>
                </div>
            </details>
            <details>
                <summary>
                    <i class="fa-solid fa-circle-arrow-right"></i>
                    <h4>Informations de connexion</h4>
                </summary>
                <div class="info_connexion flex_column">
                    <div class="flex_row flex_align_center">
                        <i class="fa-solid fa-envelope"></i><input aria-label="email" type="email" name="email"
                            id="email" placeholder="Email" value="{{ membre.email }}" disabled>
                    </div>
                    <div class="flex_row flex_align_center">
                        <i class="fa-solid fa-lock"></i><input aria-label="password" type="text" name="password"
                            id="password" placeholder="Nouveau mot de passe" pattern="[0-9]{6,9}"
                            title="6 caractères minimum et uniquement des chiffres" required>
                    </div>
                    <div class="flex_row flex_align_center">
                        <i class="fa-solid fa-lock"></i><input aria-label="passwordConfirm" type="text"
                            name="passwordConfirm" id="passwordConfirm" placeholder="Confirmer le mot de passe"
                            required>
                    </div>
                </div>
            </details>
            <details>
                <summary>
                    <i class="fa-solid fa-circle-arrow-right"></i>
                    <h4>Mes enchères </h4>
                </summary>
                <div class="info_connexion flex_column">
                    <div class="flex_row flex_align_center">
                        <ul>
                            {% for enchere in enchere %}
                            <li>{{enchere.nom}} <br> enchère actuelle: {{enchere.mise}} $ <br> <a href="">Voir</a></li>
                            {% endfor %}
                        </ul>
                    </div>
                </div>
            </details>
            <input class="call_to_action bleu" type="submit" value="Enregister les modifications">
        </form>
    </main>
    {{ include('footer.php') }}