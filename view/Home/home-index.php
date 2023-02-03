{{ include('header.php', {title: 'Accueil'})}}

<body class="body_accueil">
    {{include('menu.php')}}
    <main class="main_accueil">
        <div class=" zone_principale flex_column flex_justify_evenly flex_align_center">
            <h1 class="principale"><strong>Stampee</strong>, simple comme un timbre.</h1>
            <div class="bienvenue flex_column flex_justify_center flex_align_center">
                <div class="recherche flex_row">
                    <input aria-label="recherce" type="search" name="recherche" id="recherche"
                        placeholder="Rechercher un nom, couleurs, date, pays...">
                    <div class="bouton_recherche flex_row flex_justify_center flex_align_center">
                        <i class="fa-solid fa-magnifying-glass icon_recherche icon_taille_20"></i>
                    </div>
                </div>
                <a class="call_to_action bleu" href="{{ path }}enchere/index">Voir toutes les enchères</a>
            </div>
            <section class="nouveaux_arrivages blur flex_column">
                <h2 class="titre_section">Les coups de coeur du Lord</h2>
                <div class="nouveau_timbres">
                    <article class="carte flex_column flex_justify_between">
                        <header class="header_carte flex_row flex_justify_center flex_align_center">
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
                            <img data-filtre="image" src="{{ path }}assets/img/timbre/timbre1.webp"
                                alt="timbre à vendre">
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
                    <article class="carte flex_column flex_justify_between">
                        <header class="header_carte flex_row flex_justify_center flex_align_center">
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
                            <img data-filtre="image" src="{{ path }}assets/img/timbre/timbre1.webp"
                                alt="timbre à vendre">
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
                    <article class="carte flex_column flex_justify_between">
                        <header class="header_carte flex_row flex_justify_center flex_align_center">
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
                            <img data-filtre="image" src="{{ path }}assets/img/timbre/timbre1.webp"
                                alt="timbre à vendre">
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
                    <article class="carte flex_column flex_justify_between">
                        <header class="header_carte flex_row flex_justify_center flex_align_center">
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
                            <img data-filtre="image" src="{{ path }}assets/img/timbre/timbre1.webp"
                                alt="timbre à vendre">
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
                    <article class="carte flex_column flex_justify_between">
                        <header class="header_carte flex_row flex_justify_center flex_align_center">
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
                            <img data-filtre="image" src="{{ path }}assets/img/timbre/timbre1.webp"
                                alt="timbre à vendre">
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
                </div>
            </section>
            <a class="call_to_action blanc blur" href="#zone_secondaire">Plus d'information</a>
        </div>
        <div id="zone_secondaire" class="zone_secondaire flex_column flex_justify_around">
            <section class="aide_platforme">
                <h2 class="titre_section">Fonctionnement de la plateforme</h2>
                <ul class="etape flex_row flex_justify_between">
                    <li class="flex_column blur">
                        <div class="flex_row">
                            <span>1</span>
                            <h3>Créer vous un compte et connectez-vous</h3>
                        </div>
                        <a href="#">Voir toutes les questions à ce sujet</a>
                    </li>
                    <li class="flex_column blur">
                        <div class="flex_row">
                            <span>2</span>
                            <h3>Chercher le timbre de vos rêves</h3>
                        </div>
                        <a href="#">Voir toutes les questions à ce sujet</a>
                    </li>
                    <li class="flex_column blur">
                        <div class="flex_row">
                            <span>3</span>
                            <h3>Enchérissez et agrandissez votre collection</h3>
                        </div>
                        <a href="#">Voir toutes les questions à ce sujet</a>
                    </li>
                </ul>
            </section>
            <section class="zone_actualites ">
                <h2 class="titre_section">Les actualités du mois de novembre</h2>
                <div class="les_actualites">
                    <div class="actualite flex_row blur">
                        <img src="{{ path }}assets/img/actualite1.webp" alt="Actualité du timbre">
                        <div class="actualite_corps flex_column flex_justify_between">
                            <h3>Mort d’Elizabeth II : Quatre nouveaux timbres à l’effigie de la reine bientôt vendus au
                                Royaume-Uni</h3>
                            <p>Quatre nouveaux timbres représentant Elizabeth II ont été dévoilés ce mardi par la Royal
                                Mail.
                                Validés par le nouveau roi Charles III, quelques semaines après la mort de sa mère, ils
                                seront
                                mis en vente au Royaume-Uni le 10 novembre, rapporte BFMTV. <br>
                                Bientôt des timbres à l’effigie de Charles III
                            </p>
                            <div class="lire_actualite flex_row flex_align_center">
                                <a href="#">Lire l'article</a>
                            </div>
                        </div>
                    </div>
                    <div class="actualite flex_row blur">
                        <img src="{{ path }}assets/img/actualite2.webp" alt="Actualité du timbre">
                        <div class="actualite_corps flex_column flex_justify_between">
                            <h3>Nelson Mandela, Pif le chien, Roy Lichtenstein ou Arnaud Beltrame : des timbres-poste
                                surprenants en 2023</h3>
                            <p>La Poste émettra son lot de timbres en 2023 et 2024 consacrés aux célébrités, à la
                                culture et
                                aux
                                sites et monuments essentiellement français, parmi lesquels se détache un hommage au
                                lieutenant-colonel Arnaud Beltrame (1973-2018), abattu après s’être substitué à une
                                otage
                                dans
                                un supermarché à Trèbes (Aude).</p>
                            <div class="lire_actualite flex_row flex_align_center">
                                <a href="#">Lire l'article</a>
                            </div>
                        </div>
                    </div>
                    <div class="actualite flex_row blur">
                        <img src="{{ path }}assets/img/actualite3.webp" alt="Histoire d'une colonie">
                        <div class="actualite_corps flex_column flex_justify_between">
                            <h3>HISTOIRE D'UNE COLONIE : MADAGASCAR</h3>
                            <p>Les premiers bureaux de poste ouverts, dans ce qui est aujourd'hui Madagascar, sont les
                                bureaux
                                sur les possessions françaises de Nossi-Bé et Sainte Marie de Madagascar au milieu du
                                XIXe
                                siècle</p>
                            <div class="lire_actualite flex_row flex_align_center">
                                <a href="#">Lire l'article</a>
                            </div>
                        </div>
                    </div>
                    <div class="actualite flex_row blur">
                        <img src="{{ path }}assets/img/actualite4.webp" alt="Le timbre, un placement plaisir">
                        <div class="actualite_corps flex_column flex_justify_between">
                            <h3>Le timbre, un placement plaisir</h3>
                            <p>Le timbre, une passion et un support d’investissement : un placement plaisir ! Certains
                                vous
                                le
                                diront, le timbre ils en sont timbrés. Ceux-là collectionnent par passion, ils sont sans
                                cesse
                                en quête d’une nouveauté à posséder. Timbre-taxe, poste aérienne, variété, tout est bon
                                pour
                                étayer leur collection. De manière différente, d’autres ont choisi le timbre comme
                                support
                                d’investissement ou pour diversifier leur patrimoine. Ils espèrent ainsi faire une
                                plus-value
                                dans le temps</p>
                            <div class="lire_actualite flex_row flex_align_center flex_row flex_align_center">
                                <a href="#">Lire l'article</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="a_propos flex_column flex_align_center">
                <h2 class="titre_section"><strong>Lord Reginald Stampee III</strong> l'histoire d'un homme</h2>
                <div class="actualite blur">
                    <img src="{{ path }}assets/img/Lord.webp" alt="Lord Reginald Stampee III">
                    <p>
                        Ce grand collectionneur naquit le 11 janvier 1944 et fut enregistré sous le nom de Réginald
                        Stampee III ,nom qui en disait long sur sa famille.
                        Le père, Lord Réginald Stampee II, financier Lancashire installé dans la capitale anglaise fut
                        en un
                        certain sens, lui aussi, collectionneur : il accumulait l’argent ainsi que les titres
                        nobiliaires.
                        <br>
                        Dès son enfance, Réginald commença à contester tantôt la richesse familiale, tantôt l’autorité
                        paternelle.
                        <br>
                        Très jeune, il quitta le domicile familial. Il loua un appartement dans le
                        Quartier latin.
                        Il
                        vécut ainsi, assez chichement, en donnant des leçons particulières.
                        <br>
                        Il eut une jeunesse vraiment bohème où il mit un point d’honneur à refuser les offres d’argent
                        continuelles de ses parents.
                        <br>
                        Les jeunes gens de bonne famille de son âge animaient la vie londonienne, où l’on trouvait déjà
                        les
                        fastes superficiels de ce qui sera appelé plus tard la Belle Époque par antinomie.
                        <br>
                        Réginald préférait s’enrichir intérieurement, en étudiant avec acharnement les langues
                        étrangères,
                        l’héraldique, la numismatique et surtout la géographie. Il ne lui restait plus qu’à découvrir de
                        manière quasiment fatidique que la philatélie était en fin de compte un point de rencontre idéal
                        de
                        toutes ses passions si diverses.
                        <br>Une fois découverte cette possibilité de synthèse culturelle, il
                        entreprit de collectionner tous les types de timbres émis dans le monde.
                        <br>
                        Réginald réussit à réaliser une collection qui supplanta rapidement celles des plus fameux
                        philatélistes de l’époque, comme le gouverneur de la Nouvelle-Zélande, Sir Daniel Cooper, le
                        juge
                        Frederick Philbrick de Londres, ou le baron Arthur de Rothschild. Ces deux derniers
                        collectionneurs
                        possédaient deux « Post Office » de l’île Maurice.
                        <br>
                        Les timbres sont sa passion et Lord Stampee veut offrir au reste du monde cette passion via sa
                        plateforme.
                    </p>
                </div>
            </section>
        </div>
    </main>
    {{ include('footer.php') }}