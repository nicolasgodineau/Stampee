{{ include('header.php', {title: 'Catalogue des enchères'})}}

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
        <aside>
            <h2>Filtrer par</h2>
            <div class="prix">
                <details open>
                    <summary class="filtre_titre">Prix</summary>
                    <div class="filtre_details prix">
                        <input aria-label="prix_minimum" type="text" name="prix_minimum" id="prix_minimum"
                            placeholder="Min $">
                        <p>à</p>
                        <input aria-label="prix_maximum" type="text" name="prix_maximum" id="prix_maximum"
                            placeholder="Max $">
                    </div>
                </details>
            </div>
            <div class="pays">
                <details open>
                    <summary class="filtre_titre">Pays</summary>
                    <div class="filtre_details pays">
                        <div>
                            <input aria-label="Angleterre" type="checkbox" name="Angleterre" id="Angleterre">
                            <label for="Angleterre">Angleterre</label>
                        </div>
                        <div>
                            <input aria-label="Canada" type="checkbox" name="Canada" id="Canada">
                            <label for="Canada">Canada</label>
                        </div>
                        <div>
                            <input aria-label="État-Unis" type="checkbox" name="État-Unis" id="État-Unis">
                            <label for="État-Unis">État-Unis</label>
                        </div>
                        <div>
                            <input aria-label="Australie" type="checkbox" name="Australie" id="Australie">
                            <label for="Australie">Australie</label>
                        </div>
                    </div>
                </details>
            </div>
            <div class="condition">
                <details open>
                    <summary class="filtre_titre">Condition</summary>
                    <div class="filtre_details condition">
                        <div>
                            <input aria-label="Parfaite" type="checkbox" name="Parfaite" id="Parfaite">
                            <label for="Parfaite">Parfaite</label>
                        </div>
                        <div>
                            <input aria-label="Exellente" type="checkbox" name="Exellente" id="Exellente">
                            <label for="Exellente">Exellente</label>
                        </div>
                        <div>
                            <input aria-label="Bonne" type="checkbox" name="Bonne" id="Bonne">
                            <label for="Bonne">Bonne</label>
                        </div>
                        <div>
                            <input aria-label="Moyenne" type="checkbox" name="Moyenne" id="Moyenne">
                            <label for="Moyenne">Moyenne</label>
                        </div>
                        <div>
                            <input aria-label="Endommage" type="checkbox" name="Endommage" id="Endommage">
                            <label for="Endommage">Endommage</label>
                        </div>
                    </div>
                </details>
            </div>
            <div class="couleurs">
                <details open>
                    <summary class="filtre_titre">
                        Couleurs dominate
                    </summary>
                    <div class="filtre_details couleurs">
                        <input aria-label="Couleurs" type="text" name="Couleurs" id="Couleurs" placeholder="Rouge">
                    </div>
                </details>
            </div>
            <div class="certifie">
                <details open>
                    <summary class="filtre_titre">Certifié</summary>
                    <div class="filtre_details certifie">
                        <input aria-label="oui_non" type="checkbox" name="oui_non" id="oui_non">
                        <label for="oui_non">oui / non</label>
                    </div>
                </details>
            </div>
        </aside>
        <div data-filtre="catalogue" class="catalogue flex_column">
            {% for enchere in encheres %}
            <!-- Affiche les enchères en cours (1) et les terminer (2) -->
            {% if enchere.idStatus == 1 or enchere.idStatus == 2 %}
            <article class="carte flex_column">
                <header class="header_carte flex_row">
                    <div class="heure flex_row">
                        <i class="fa-regular fa-clock icon_taille_20"></i>
                        {% if enchere.idStatus == 1 %}
                        <h2 data-filtre="finEnchere">{{enchere.date}} </h2>
                        {% endif %}
                        {% if enchere.idStatus == 2 %}
                        <h2 data-filtre="finEnchere">Terminer</h2>
                        {% endif %}
                    </div>
                    <div class="like flex_row">
                        <span class="icon_like icon_taille_20"></span>
                        <h2 data-filtre="like">0</h2>
                    </div>
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
                        <p data-filtre="etat">{{enchere.idTimbre}}</p>
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