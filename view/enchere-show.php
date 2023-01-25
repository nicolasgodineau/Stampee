{{ include('header.php', {title: 'Fiche d\'enchere'})}}

<body>
    {{include('menu.php')}}
    <header class="header_principal flex_row flex_align_center flex_justify_center" id="top">
        <h1 class="principale">Fiche d'enchère</h1>
    </header>
    <nav class="fil_ariane">
        <i class="fa-solid fa-house"></i>
        <a class='retour' href="{{ path }}home/index">Accueil</a>
        <i class="fa-solid fa-arrow-right"></i>
        <a class='retour' href="{{ path }}enchere/index">Catalogue des enchères</a>
        <i class="fa-solid fa-arrow-right"></i>
        <em>Création d'une enchère</em>
    </nav>
    <main class="flex_column">
        <div class="fiche flex_row">
            <section class="image flex_column flex_justify_between flex_align_center">
                <div>
                    <img data-filtre="image" src="{{ path }}assets/img/timbre/{{enchere.image}}" alt="timbre à vendre">
                    <p>Passez dessus pour voir plus grand</p>
                </div>
                <div class="carrousel">
                    <img data-filtre="image" src="{{ path }}assets/img/timbre/{{enchere.image}}" alt="timbre à vendre">
                    <img data-filtre="image" src="{{ path }}assets/img/timbre/{{enchere.image}}" alt="timbre à vendre">
                    <img data-filtre="image" src="{{ path }}assets/img/timbre/{{enchere.image}}" alt="timbre à vendre">
                </div>
                <div>
                    <h2 class="temps_restant">Termine dans 1J:06H:45S</h2>
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
                            <td data-filtre="etat">Très bon</td>
                        </tr>
                        <tr>
                            <td>Pays</td>
                            <td data-filtre="pays">Bahamas</td>
                        </tr>
                        <tr>
                            <td>Scott</td>
                            <td data-filtre="scott">17</td>
                        </tr>
                        <tr>
                            <td>Émission</td>
                            <td data-filtre="emission">Timbre du Bahamas</td>
                        </tr>
                        <tr>
                            <td>Nom</td>
                            <td data-filtre="nom">Reine Victoria</td>
                        </tr>
                        <tr>
                            <td>Valeur faciale</td>
                            <td data-filtre="valeurFaciale">1p</td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td data-filtre="date">1863-10</td>
                        </tr>
                        <tr>
                            <td>Couleur</td>
                            <td data-filtre="couleur">Carmin laqué</td>
                        </tr>
                        <tr>
                            <td>Perforation</td>
                            <td data-filtre="perforation">14</td>
                        </tr>
                    </tbody>
                </table>
                <footer class="flex_column">
                    <h2 data-filtre="prix">Prix actuel : ${{enchere.mise}}</h2>
                    {% if session.Role_idRole == null %}
                    <a class="call_to_action bleu" href="#">Inscrivez-vous pour pouvoir encherir</a>
                    {% endif %}
                    {% if session.Role_idRole == 1 %}
                    <div class="prix flex_row flex_justify_between flex_align_center">
                        <input aria-label="miser" data-filtre="enchere" class="zone_enchere" type="text" name="miser"
                            placeholder="min ${{enchere.enchereSuperieur}}" id="miser">
                        <a class="call_to_action bleu" href="#">Enchérir</a>
                        <span class="icon_like icon_taille_20"></span>
                    </div>
                    {% endif %}
                    <div class="information_importante flex_row">
                        <ul>
                            <li>Pays d'envoi : Royaume-Uni</li>
                            <li>Livraison internationale gratuite</li>
                            <li>Certification garantie</li>
                        </ul>
                        <img src="./assets/img/icons/icone-payment.webp" alt="information payment">
                    </div>
                </footer>
            </section>
        </div>
        <!--         <div class="voir_plus flex_column flex_align_center">
            <h2>D’autres enchères pourraient vous intéressé !</h2>
            <i class="fa-solid fa-arrow-down icon_taille_50"></i>
        </div>
        <div data-filtre="catalogue" class="autres_enchères flex_row">
            <article class="carte flex_column">
                <header class="header_carte flex_row">
                    <div class="heure flex_row">
                        <i class="fa-regular fa-clock icon_taille_20"></i>
                        <h2 data-filtre="finEnchere">10:35:47</h2>
                    </div>
                    <div class="like flex_row">
                        <span class="icon_like icon_taille_20"></span>
                        <h2 data-filtre="like">33</h2>
                    </div>
                </header>
                <div class="flex_column">
                    <img data-filtre="image" src="assets/img/timbre/timbre4.webp" alt="timbre à vendre">
                </div>
                <footer class="footer_carte flex_column">
                    <p data-filtre="nomTimbre">
                        Timbre Bahamas #17 <br>
                        Reine Victoria (1863) 1p
                    </p>
                    <div class="details flex_row">
                        <p data-filtre="prix">$495.00</p>
                        <p data-filtre="etat">Très bon</p>
                    </div>
                    <h3 class="call_to_action_petit call_to_action bleu">Plus de détails</h3>
                </footer>
            </article>
            <article class="carte flex_column">
                <header class="header_carte flex_row">
                    <div class="heure flex_row">
                        <i class="fa-regular fa-clock icon_taille_20"></i>
                        <h2 data-filtre="finEnchere">10:35:47</h2>
                    </div>
                    <div class="like flex_row">
                        <span class="icon_like icon_taille_20"></span>
                        <h2 data-filtre="like">33</h2>
                    </div>
                </header>
                <div class="flex_column">
                    <img data-filtre="image" src="assets/img/timbre/timbre4.webp" alt="timbre à vendre">
                </div>
                <footer class="footer_carte flex_column">
                    <p data-filtre="nomTimbre">
                        Timbre Bahamas #17 <br>
                        Reine Victoria (1863) 1p
                    </p>
                    <div class="details flex_row">
                        <p data-filtre="prix">$495.00</p>
                        <p data-filtre="etat">Très bon</p>
                    </div>
                    <h3 class="call_to_action_petit call_to_action bleu">Plus de détails</h3>
                </footer>
            </article>
            <article class="carte flex_column">
                <header class="header_carte flex_row">
                    <div class="heure flex_row">
                        <i class="fa-regular fa-clock icon_taille_20"></i>
                        <h2 data-filtre="finEnchere">10:35:47</h2>
                    </div>
                    <div class="like flex_row">
                        <span class="icon_like icon_taille_20"></span>
                        <h2 data-filtre="like">33</h2>
                    </div>
                </header>
                <div class="flex_column">
                    <img data-filtre="image" src="assets/img/timbre/timbre4.webp" alt="timbre à vendre">
                </div>
                <footer class="footer_carte flex_column">
                    <p data-filtre="nomTimbre">
                        Timbre Bahamas #17 <br>
                        Reine Victoria (1863) 1p
                    </p>
                    <div class="details flex_row">
                        <p data-filtre="prix">$495.00</p>
                        <p data-filtre="etat">Très bon</p>
                    </div>
                    <h3 class="call_to_action_petit call_to_action bleu">Plus de détails</h3>
                </footer>
            </article>
            <article class="carte flex_column">
                <header class="header_carte flex_row">
                    <div class="heure flex_row">
                        <i class="fa-regular fa-clock icon_taille_20"></i>
                        <h2 data-filtre="finEnchere">10:35:47</h2>
                    </div>
                    <div class="like flex_row">
                        <span class="icon_like icon_taille_20"></span>
                        <h2 data-filtre="like">33</h2>
                    </div>
                </header>
                <div class="flex_column">
                    <img data-filtre="image" src="assets/img/timbre/timbre4.webp" alt="timbre à vendre">
                </div>
                <footer class="footer_carte flex_column">
                    <p data-filtre="nomTimbre">
                        Timbre Bahamas #17 <br>
                        Reine Victoria (1863) 1p
                    </p>
                    <div class="details flex_row">
                        <p data-filtre="prix">$495.00</p>
                        <p data-filtre="etat">Très bon</p>
                    </div>
                    <h3 class="call_to_action_petit call_to_action bleu">Plus de détails</h3>
                </footer>
            </article>
            <article class="carte flex_column">
                <header class="header_carte flex_row">
                    <div class="heure flex_row">
                        <i class="fa-regular fa-clock icon_taille_20"></i>
                        <h2 data-filtre="finEnchere">10:35:47</h2>
                    </div>
                    <div class="like flex_row">
                        <span class="icon_like icon_taille_20"></span>
                        <h2 data-filtre="like">33</h2>
                    </div>
                </header>
                <div class="flex_column">
                    <img data-filtre="image" src="assets/img/timbre/timbre4.webp" alt="timbre à vendre">
                </div>
                <footer class="footer_carte flex_column">
                    <p data-filtre="nomTimbre">
                        Timbre Bahamas #17 <br>
                        Reine Victoria (1863) 1p
                    </p>
                    <div class="details flex_row">
                        <p data-filtre="prix">$495.00</p>
                        <p data-filtre="etat">Très bon</p>
                    </div>
                    <h3 class="call_to_action_petit call_to_action bleu">Plus de détails</h3>
                </footer>
            </article>
        </div> -->
    </main>
    {{ include('footer.php') }}