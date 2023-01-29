{{ include('header.php', {title: 'Espace personnel'})}}

<body>
    {{include('menu.php')}}
    <header class="header_principal flex_row flex_align_center flex_justify_center" id="top">
        <h1 class="principale">Bienvenue {{membre.prenom}}</h1>
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
                        <input type="hidden" name="Role_idRole" value="{{membre.Role_idRole}}">
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
                            <i class="fa-solid fa-phone"></i><input aria-label="telephone" type="text" name="telephone"
                                id="telephone" placeholder="Téléphone" value="{{membre.telephone}}">
                        </div>
                        <div class="flex_row flex_align_center">
                            <i class="fa-solid fa-house"></i><input aria-label="adresse" type="text" name="adresse"
                                id="adresse" placeholder="Adresse" value="{{membre.adresse}}">
                        </div>
                    </div>
                </details>
                <!-- Zone pour le membre  -->
                <input class="call_to_action bleu fit_content" type="submit" value="Enregister les modifications">
            </form>
        </div>
        <div class="flex_column">
            <!-- Zone pour le membre  -->
            {% if session.Role_idRole == 1 %}
            <details open>
                <summary>
                    <i class="fa-solid fa-circle-arrow-right"></i>
                    <h4>Liste de mes enchères</h4>
                </summary>
                <div class="info_pour_admin flex_column"">
                        <div class=" flex_column">
                    {% for enchere in enchereMembre %}
                    {% if enchere.idStatus == 1 %}
                    <details>
                        <summary><i class="fa-solid fa-circle-arrow-right"></i>Nom de l'enchère: {{enchere.nom}} <br>
                            Mise: ${{enchere.mise}}
                        </summary>
                        <div class="info_pour_admin flex_column">
                            <a class="call_to_action bleu fit_content"
                                href="{{ path }}enchere/show/{{enchere.idTimbre}}">Voir
                                l'enchère</a>
                            <a class="call_to_action rouge fit_content"
                                href="{{ path }}enchere/changeStatus/{{enchere.idTimbre}}"
                                onclick="return confirm('Voulez vous vraiment supprimer cette enchère ?');">Supprimer
                                l'enchère</a>
                        </div>
                    </details>
                    {% endif %}
                    {% endfor %}
                </div>
            </details>
            {% endif %}
            <!-- Zone pour l'administrateur  -->
            {% if session.Role_idRole == 2 %}
            <details open>
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
                                {% if enchere.idStatus == 1 %}
                                - Enchère en cours
                                {% endif %}
                                {% if enchere.idStatus == 2 %}
                                - Enchère terminer
                                {% endif %}
                                {% if enchere.idStatus == 3 %}
                                - Enchère supprimer par le membre
                                {% endif %}
                            </summary>
                            <div class="info_pour_admin flex_column">
                                <p>Prénom: {{enchere.prenom}}</p>
                                <p>Nom de l'enchère: {{enchere.nom}}</p>
                                <p>Mise: {{enchere.mise}} $ </p>
                                {% if enchere.idStatus == 1 or enchere.idStatus == 3 %}
                                <a class="call_to_action bleu fit_content"
                                    href="{{ path }}enchere/show/{{enchere.idTimbre}}">Voir l'enchère</a>
                                <form action="{{ path }}enchere/adminDeleteEnchere" method="post">
                                    <input type="hidden" name="idTimbre" value="{{enchere.idTimbre}}">
                                    <input class="call_to_action rouge fit_content" type="submit"
                                        value="Supprimer enchère"
                                        onclick="return confirm('Voulez vous vraiment supprimer cette enchère ?');">
                                </form>
                                {% endif %}
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


                                <p>Téléphone: {{membre.telephone}}</p>
                                <p>Email: {{membre.email}}</p>
                                <form action="{{ path }}membre/adminDeleteMembre" method="post">
                                    <input type="hidden" name="idMembre" value="{{membre.idMembre}}">
                                    <input class="call_to_action rouge fit_content" type="submit"
                                        value="Supprimer membre"
                                        onclick="return confirm('Voulez vous vraiment supprimer ce membre ?');">
                                </form>
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