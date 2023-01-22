{{ include('header.php', {title: 'Fiche d\'enchere'})}}

<body>

    {{include('menu.php')}}
    <nav class="fil_ariane">
        <i class="fa-solid fa-house"></i>
        <a class='retour' href="./index.html">Accueil</a>
        <i class="fa-solid fa-arrow-right"></i>
        <em>Création d'une enchère</em>
    </nav>
    <main class="flex_column ">
        <div class="fiche flex_column">
            <!-- <section class="image flex_column">
                <div>
                    <img data-filtre="image" src="./assets/img/timbre/timbre1.webp" alt="timbre à vendre">
                    <p>Passez dessus pour voir plus grand</p>
                </div>
                <div class="carrousel">
                    <img data-filtre="image" src="./assets/img/timbre/timbre1.webp" alt="timbre à vendre">
                    <img data-filtre="image" src="./assets/img/timbre/timbre1.webp" alt="timbre à vendre">
                    <img data-filtre="image" src="./assets/img/timbre/timbre1.webp" alt="timbre à vendre">
                </div>
                <div>
                    <h2 class="temps_restant">Termine dans 1J:06H:45S</h2>
                </div>
            </section> -->
            <form class="flex_column" action="" method="post">
                <input type="text" name="idMembre" value="{{membre.idMembre}}">
                <div class="info_perso flex_column">
                    <div class="flex_row flex_align_center">
                        <i class="fa-solid fa-font"></i><input aria-label="nom" type="text" name="nom" id="nom"
                            placeholder="Nom du timbre" value="timbre test">
                    </div>
                    <div class="flex_row flex_align_center">
                        <i class="fa-solid fa-font"></i><textarea placeholder="Description du timbre"
                            aria-label="description" name="description" id="description"
                            rows="5">Coucou ca va ?</textarea>
                    </div>
                    <div class="flex_row flex_align_center">
                        <i class="fa-solid fa-font"></i><input aria-label="prix" type="text" name="prix" id="prix"
                            placeholder="Prix de début d'enchère" value="150">
                    </div>
                </div>
                <input class="call_to_action bleu" type="submit" value="Valider">
            </form>
        </div>
    </main>
    {{ include('footer.php') }}