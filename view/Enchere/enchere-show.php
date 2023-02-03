{{ include('header.php', {title: 'Fiche d\'enchere'})}}

{% block my_javascripts %}
<script src="{{ path }}assets/scripts/fiche.js" type="text/javascript" defer></script>
{% endblock %}

<body>
    {{include('menu.php')}}
    <header class=" header_principal flex_row flex_align_center flex_justify_center" id="top">
        <h1 class="principale">Fiche d'enchère</h1>
    </header>
    <nav class="fil_ariane">
        <i class="fa-solid fa-house"></i>
        <a class='retour' href="{{ path }}home/index">Accueil</a>
        <i class="fa-solid fa-arrow-right"></i>
        <a class='retour' href="{{ path }}enchere/index">Catalogue des enchères</a>
        <i class="fa-solid fa-arrow-right"></i>
        <em>Fiche d'enchère</em>
    </nav>
    <main class="flex_column">
        <div class="fiche flex_row">
            <section class="galerie flex_column flex_justify_center flex_align_center">
                <div class="image_container">
                    <img data-filtre="image" src="{{ path }}assets/img/timbre/{{enchere.image}}" alt="timbre à vendre">
                    <p>Passez dessus pour voir plus grand</p>
                </div>
                <div class="carrousel">
                    <img data-filtre="image" src="{{ path }}assets/img/timbre/{{enchere.image}}" alt="timbre à vendre">
                    <img data-filtre="image" src="{{ path }}assets/img/timbre/{{enchere.image}}" alt="timbre à vendre">
                    <img data-filtre="image" src="{{ path }}assets/img/timbre/{{enchere.image}}" alt="timbre à vendre">
                </div>
            </section>
            <section class="description flex_column flex_justify_between">

                <h1 data-filtre="nomTimbre">{{enchere.nom}}</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores tenetur quisquam, illum velit
                    labore libero, beatae vitae mollitia est voluptatibus ipsum dolorum neque consectetur sed.</p>
                <table class="tableau">
                    <tbody>
                        <tr>
                            <td>Condition</td>
                            <td data-filtre="etat"></td>
                        </tr>
                        <tr>
                            <td>Pays</td>
                            <td data-filtre="pays"></td>
                        </tr>
                        <tr>
                            <td>Scott</td>
                            <td data-filtre="scott"></td>
                        </tr>
                        <tr>
                            <td>Émission</td>
                            <td data-filtre="emission"></td>
                        </tr>
                        <tr>
                            <td>Nom</td>
                            <td data-filtre="nom"></td>
                        </tr>
                        <tr>
                            <td>Valeur faciale</td>
                            <td data-filtre="valeurFaciale"></td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td data-filtre="date"></td>
                        </tr>
                        <tr>
                            <td>Couleur</td>
                            <td data-filtre="couleur"></td>
                        </tr>
                        <tr>
                            <td>Perforation</td>
                            <td data-filtre="perforation"></td>
                        </tr>
                    </tbody>
                </table>
                <footer class="flex_column">
                    <ul data-filtre="finEnchere" class="flex_row flex_justify_center"
                        status="{{enchere.Status_idStatus}}">
                        <li>Termine dans </li>
                        <li data-filtre="jour">{{enchere.dateFormater}}</li>
                        <li data-filtre="heures">heures</li>
                        <li data-filtre="minutes">min</li>
                        <li data-filtre="secondes">sec</li>
                    </ul>
                    <h2 data-filtre="prix">Meilleur offre : ${{enchere.mise}}</h2>
                    {% if session.Role_idRole == null %}
                    <a class="call_to_action bleu" href="#">Inscrivez-vous pour pouvoir encherir</a>
                    {% endif %}
                    {% if session.Role_idRole == 1 and session.idMembre != enchere.Membre_idMembre and enchere.Status_idStatus == 1 %}
                    <!-- Permet de filtrer un utilisateur visiteur ou admin, et le membre qui à créer l'enchère -->
                    <div class="prix flex_row flex_justify_center flex_align_center">
                        <form class="flex_row" action="{{ path }}mise/ajouterMise" method="post">
                            <!-- <input type="text" name="Enchere_Timbre_idTimbre" value="{{enchere.idTimbre}}"> -->
                            <input type="hidden" name="Timbre_idTimbre" value="{{enchere.idTimbre}}">
                            <input type="hidden" name="miseAvant" value="{{enchere.mise}}">
                            <!--  <input type="text" name="Enchere_Membre_idMembre" value="{{session.idMembre}}"> -->
                            <input type="hidden" name="Membre_idMembre" value="{{session.idMembre}}">
                            <input type="hidden" name="emplacement" value='fiche'>

                            <input aria-label="miser" data-filtre="enchere" class="zone_enchere" type="text" name="mise"
                                placeholder="min ${{enchere.enchereSuperieur}}" id="mise"
                                min="{{enchere.enchereSuperieur}}" required>
                            <input class="call_to_action bleu fit_content" type="submit" value="Enchérir">
                        </form>
                        {% if enchere.idTimbre not in favorisMembre %}
                        <!-- Si l'id du timbre n'est pas dans le tableau, on affiche un coeur vide -->
                        <div class="like flex_row">
                            <form action="{{ path }}favoris/ajouter" method="post">
                                <input type="hidden" name="Membre_idMembre" value="{{session.idMembre}}">
                                <input type="hidden" name="Enchere_Membre_idMembre" value="{{enchere.Membre_idMembre}}">
                                <input type="hidden" name="Enchere_Timbre_idTimbre" value="{{enchere.idTimbre}}">
                                <input type="hidden" name="emplacement" value='fiche'>
                                <input class='form_like icon_like icon_taille_30' type="submit" value="">
                            </form>
                            <h2 data-filtre="like">{{enchere.like}}</h2>
                        </div>
                        {% else %}
                        <!-- Si l'id du timbre est dans le tableau, on affiche un coeur rouge -->
                        <div class="like flex_row">
                            <form action="{{ path }}favoris/supprimer" method="post">
                                <input type="hidden" name="Membre_idMembre" value="{{session.idMembre}}">
                                <input type="hidden" name="Enchere_Timbre_idTimbre" value="{{enchere.Timbre_idTimbre}}">
                                <input type="hidden" name="emplacement" value='fiche'>
                                <input class='form_like icon_like liker icon_taille_30' type="submit" value="">
                            </form>
                            <h2 data-filtre="like">{{enchere.like}}</h2>
                        </div>
                        {% endif %}
                    </div>
                    <span class="call_to_action rouge invisible" name="erreur_mise">Mise insuffisante</span>

                    {% endif %}
                    <div class="information_importante flex_row flex_justify_between">
                        <ul>
                            <li>Pays d'envoi : Royaume-Uni</li>
                            <li>Livraison internationale gratuite</li>
                            <li>Certification garantie</li>
                        </ul>
                        <img src="{{ path }}assets/img/icons/icone-payment.webp" alt="information payment">
                    </div>
                </footer>
            </section>
        </div>
    </main>
    {{ include('footer.php') }}