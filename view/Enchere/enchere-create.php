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
            <form class="flex_column" action="{{ path }}enchere/store" method="post">
                <input type="hidden" name="idMembre" value="{{session.idMembre}}">
                <input type="hidden" name="status" value="1">

                <div class="info_perso flex_column">
                    <div class="flex_row flex_align_center">
                        <i class="fa-solid fa-font"></i><input aria-label="nom" type="text" name="nom" id="nom"
                            placeholder="Nom du timbre" value="">
                    </div>
                    <div class="flex_row flex_align_center">
                        <i class="fa-solid fa-font"></i><textarea placeholder="Description du timbre"
                            aria-label="description" name="description" id="description" rows="5"></textarea>
                    </div>
                    <div class="flex_row flex_align_center">
                        <i class="fa-solid fa-sack-dollar"></i><input aria-label="mise" type="text" name="mise"
                            id="mise" placeholder="Prix de début d'enchère" value="">
                    </div>
                    <div class="flex_row flex_align_center">
                        <i class="fa-solid fa-sack-dollar"></i><input aria-label="dateFin" type="date" name="dateFin"
                            id="dateFin" placeholder="Choix de la date de fin">
                    </div>
                    <div class="flex_row flex_align_center">
                        <i class="fa-solid fa-image"></i><input type="file" name="image" id="image"
                            value='timbre1.webp'>
                    </div>
                </div>
                <input class="call_to_action bleu" type="submit" value="Valider">
            </form>
        </div>
    </main>
    {{ include('footer.php') }}