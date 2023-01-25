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
    <main class="compte flex_row flex_justify_center">
        <div class="flex_column">
            <form class="flex_column" action="{{ path }}membre/update" method="post">
                <details>
                    <summary>
                        <i class="fa-solid fa-circle-arrow-right"></i>
                        <h4>Informations personnelles</h4>
                    </summary>
                    <div class="info_perso flex_column">
                        <input type="text" name="Role_idRole" value="{{membre.Role_idRole}}">
                        <input type="text" name="" value="{{membre.idMembre}}">
                        <div class="flex_row flex_align_center">
                            <i class="fa-solid fa-user"></i><input aria-label="nom" type="text" name="nom" id="nom"
                                placeholder="Nom" value="{{membre.nom}}" pattern="[A-Za-z]{1,15}"
                                title="Champ prénom invalide 15 lettres maximum exemple: john">
                        </div>
                        <div class="flex_row flex_align_center">
                            <i class="fa-solid fa-user"></i><input aria-label="prenom" type="text" name="prenom"
                                id="prenom" placeholder="Prénom" value="{{membre.prenom}}">
                        </div>
                        <div class="info_date_naissance flex_column">
                            <div class="date_naissance flex_row">
                                <div class="flex_row flex_align_center">
                                    <i class="fa-solid fa-cake-candles"></i><input aria-label="jourNaissance"
                                        type="text" name="jourNaissance" id="jourNaissance" placeholder="JJ" required>
                                </div>
                                <div class="flex_row flex_align_center">
                                    <i class="fa-solid fa-cake-candles"></i><input aria-label="moisNaissance"
                                        type="text" name="moisNaissance" id="moisNaissance" placeholder="MM" required>
                                </div>
                                <div class="flex_row flex_align_center">
                                    <i class="fa-solid fa-cake-candles"></i><input aria-label="anneeNaissance"
                                        type="text" name="anneeNaissance" id="anneeNaissance" placeholder="AA" required>
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
                                {% for pays in allPays %}
                                <option value="{{pays.idPays}}">{{pays.pays}}</option>
                                {% endfor %}
                            </select>
                        </div>
                </details>
                <!-- Zone pour le membre  -->
                {% if session.Role_idRole == 1 %}
                <details>
                    <summary>
                        <i class="fa-solid fa-circle-arrow-right"></i>
                        <h4>Informations de paiement</h4>
                    </summary>
                    <div class="info_perso flex_column">
                        <div class="flex_row flex_align_center">
                            <i class="fa-solid fa-credit-card"></i><input aria-label="carte_credit_numero" type="text"
                                name="carte_credit_numero" id="carte_credit_numero"
                                placeholder="Nom et prénom du titulaire" required>
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
                                <i class="fa-solid fa-credit-card"></i><input aria-label="carte_credit_annee"
                                    type="text" name="carte_credit_annee" id="carte_credit_annee" placeholder="AA"
                                    required>
                            </div>
                            <div class="flex_row flex_align_center">
                                <i class="fa-solid fa-credit-card"></i><input aria-label="carte_credit_cvc" type="text"
                                    name="carte_credit_cvc" id="carte_credit_cvc" placeholder="CVC" required>
                            </div>
                        </div>
                    </div>
                </details>
                {% endif %}
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
                <input class="call_to_action bleu fit_content" type="submit" value="Enregister les modifications">
            </form>
        </div>
        <div class="flex_column">
            <!-- Zone pour le membre  -->
            {% if session.Role_idRole == 1 %}
            <details>
                <summary>
                    <i class="fa-solid fa-circle-arrow-right"></i>
                    <h4>Liste de mes enchères</h4>
                </summary>
                <div class="info_pour_admin flex_column"">
                        <div class=" flex_column">
                    {% for enchere in enchereMembre %}
                    <details>
                        <summary><i class="fa-solid fa-circle-arrow-right"></i>Nom de l'enchère: {{enchere.nom}} - Mise:
                            {{enchere.mise}} $
                        </summary>
                        <div class="info_pour_admin flex_column">
                            <a class="call_to_action bleu fit_content" href="">Voir l'enchère</a>
                            <a class="call_to_action rouge fit_content" href="{{ path }}">Supprimer
                                membre (ne marche pas</a>
                        </div>
                    </details>
                    {% endfor %}
                </div>
            </details>
            {% endif %}
            <!-- Zone pour l'administrateur  -->
            {% if session.Role_idRole == 2 %}
            <details>
                <summary>
                    <i class="fa-solid fa-circle-arrow-right"></i>
                    <h4>Liste de toutes les enchères</h4>
                </summary>
                <div class="info_pour_admin flex_column">
                    <div class="flex_column">
                        {% if session.Role_idRole == 2 %}
                        {% for enchere in encheres %}
                        <details>
                            <summary><i class="fa-solid fa-circle-arrow-right"></i>ID timbre: {{enchere.idTimbre}}
                            </summary>
                            <div class="info_pour_admin flex_column">
                                <p>Prénom: {{enchere.prenom}}</p>
                                <p>Nom de l'enchère: {{enchere.nom}}</p>
                                <p>Mise: {{enchere.mise}} $ </p>
                                <a class="call_to_action bleu fit_content" href="">Voir l'enchère</a>
                                <a class="call_to_action rouge fit_content" href="{{ path }}">Supprimer
                                    membre (ne marche pas)</a>
                            </div>
                        </details>
                        {% endfor %}
                        {% endif %}
                    </div>
                </div>
            </details>
            <details>
                <summary>
                    <i class="fa-solid fa-circle-arrow-right"></i>
                    <h4>Liste de tous les membres</h4>
                </summary>
                <div class="info_pour_admin flex_column">
                    <div class="flex_column">
                        {% for membre in membres %}
                        <details>
                            <summary><i class="fa-solid fa-circle-arrow-right"></i>ID membre: {{membre.idMembre}}
                            </summary>
                            <div class="info_pour_admin flex_column">
                                <p>Nom: {{membre.nom}}</p>
                                <p>Prénom: {{membre.prenom}}</p>
                                <p>Adresse: {{membre.adresse}}</p>

                                <!-- Affichage du pays du membre -->
                                {% for pays in paysMembre %}
                                {% if pays.idMembre == membre.idMembre %}
                                <p>Pays: {{ pays.pays }}</p>
                                {% endif %}
                                {% endfor %}

                                <p>Téléphone: {{membre.telephone}}</p>
                                <p>Email: {{membre.email}}</p>
                                <a class="call_to_action rouge fit_content"
                                    href="{{ path }}membre/delete/{{membre.idMembre}}">Supprimer
                                    membre</a>
                            </div>
                        </details>
                        {% endfor %}
                    </div>
                </div>
            </details>
            {% endif %}
        </div>
    </main>
    {{ include('footer.php') }}