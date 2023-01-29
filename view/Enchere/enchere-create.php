{{ include('header.php', {title: 'Création d\'enchere'})}}

<body>
    {{include('menu.php')}}
    <header class="header_principal flex_row flex_align_center flex_justify_center" id="top">
        <h1 class="principale">Création d'une enchère</h1>
    </header>
    <nav class="fil_ariane">
        <i class="fa-solid fa-house"></i>
        <a class='retour' href="{{ path }}home/index">Accueil</a>
        <i class="fa-solid fa-arrow-right"></i>
        <em>Création d'une enchère</em>
    </nav>
    <main class="flex_column flex_align_center">
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
            <form class="flex_column" action="{{ path }}enchere/store" method="post">
                <input type="hidden" name="idMembre" value="{{session.idMembre}}">
                <input type="text" name="status" value="1">

                <div class="info_perso flex_column">
                    <div class="flex_row flex_align_center">
                        <i class="fa-solid fa-font"></i><input aria-label="nom" type="text" name="nom" id="nom"
                            placeholder="Nom du timbre" value="gfdgdfgdf">
                    </div>
                    <div class="flex_row flex_align_center">
                        <i class="fa-solid fa-font"></i><textarea placeholder="Description du timbre"
                            aria-label="description" name="description" id="description" rows="5">gdfgdfgdfdf</textarea>
                    </div>
                    <div class="flex_row flex_align_center">
                        <i class="fa-solid fa-sack-dollar"></i><input aria-label="mise" type="text" name="mise"
                            id="mise" placeholder="Prix de début d'enchère" value="1234">
                    </div>
                    <div class="flex_row flex_align_center">
                        <i class="fa-solid fa-sack-dollar"></i><input aria-label="date" type="date" name="date"
                            id="date" placeholder="Choix de la date de fin" value="2023-01-31">
                    </div>
                    <div class="flex_row flex_align_center">
                        <i class="fa-solid fa-image"></i><input type="file" name="image" id="image"
                            value='timbre1.webp'>
                    </div>
                </div>
                <input class="call_to_action bleu" type="submit" value="Valider">
            </form>
        </div>
    </main>-
    {{ include('footer.php') }}