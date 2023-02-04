{{ include('header.php', {title: 'Catalogue des enchères'})}}

{% block my_javascripts %}
<script src="{{ path }}assets/scripts/timer.js" type="text/javascript" defer></script>
{% endblock %}

<body>
    {{include('menu.php')}}
    <header class="header_principal flex_row flex_align_center flex_justify_center" id="top">
        <h1 class="principale">Catalogue des enchères</h1>
    </header>
    <nav class="fil_ariane">
        <i class="fa-solid fa-house"></i>
        <a class='retour' href="{{ path }}home/index">Accueil</a>
        <i class="fa-solid fa-arrow-right"></i>
        <em>Catalogue des enchères</em>
    </nav>
    <main class="flex_row">
        <div data-filtre="catalogue" class="catalogue flex_column">
            {% for enchere in encheres %}
            <!-- Affiche les enchères en cours (1) et les terminer (2) -->
            {% if enchere.Status_idStatus == 1 or enchere.Status_idStatus == 2 %}
            <article class="carte flex_column">
                <header class="header_carte flex_row">
                    <!-- l'attribu 'status' permet de récupérer l'idStatus de l'enchère en js -->
                    <div class="heure flex_row" status="{{enchere.Status_idStatus}}">
                        <i class="fa-regular fa-clock icon_taille_20"></i>
                        <h2 data-filtre="finEnchere" fin-enchere="{{enchere.dateFormater}}">
                        </h2>
                    </div>
                    {% if enchere.idTimbre not in favorisMembre %}
                    <!-- Si l'id du timbre n'est pas dans le tableau, on affiche un coeur vide -->
                    <div class="like flex_row">
                        {% if session.connexion == membre or session.Role_idRole == 1 %}
                        <!-- Que les membres peuvent liker un timbre, pas l'admin ni un visiteur -->
                        <form action="{{ path }}favoris/ajouter" method="post">
                            <input type="hidden" name="Membre_idMembre" value="{{session.idMembre}}">
                            <input type="hidden" name="Enchere_Membre_idMembre"
                                value="{{enchere.Enchere_Membre_idMembre}}">
                            <input type="hidden" name="Enchere_Timbre_idTimbre" value="{{enchere.Timbre_idTimbre}}">
                            <input class='form_like icon_like icon_taille_20' type="submit" value="">
                        </form>
                        {% else %}
                        <span class="icon_like icon_taille_20"></span>
                        {% endif %}
                        <h2 data-filtre=" like">{{enchere.like}}</h2>
                    </div>
                    {% else %}
                    <!-- Si l'id du timbre est dans le tableau, on affiche un coeur rouge -->
                    <div class="like flex_row">
                        <form action="{{ path }}favoris/supprimer" method="post">
                            <input type="hidden" name="Membre_idMembre" value="{{session.idMembre}}">
                            <input type="hidden" name="Enchere_Timbre_idTimbre" value="{{enchere.Timbre_idTimbre}}">
                            <input class='form_like icon_like liker icon_taille_20' type="submit" value="">
                        </form>
                        <h2 data-filtre="like">{{enchere.like}}</h2>
                    </div>
                    {% endif %}
                </header>
                <div class="flex_column">
                    <img data-filtre="image" src="{{ path }}assets/img/timbre/{{enchere.image}}" alt="timbre">
                </div>
                <footer class="footer_carte flex_column">
                    <p data-filtre="nomTimbre">
                        {{enchere.nom}}
                    </p>
                    <div class="details flex_row">
                        <p data-filtre="prix">{{enchere.mise}} $CAD</p>
                        <!-- <p data-filtre="etat"></p> -->
                    </div>
                    <a class="call_to_action bleu call_to_action_petit"
                        href="{{ path }}enchere/show/{{enchere.idTimbre}}">Plus de détails</a>
                </footer>
            </article>
            {% endif %}
            {% endfor %}

        </div>
    </main>
    {{ include('footer.php') }}