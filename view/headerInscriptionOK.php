{{ include('header.php', {title: 'Inscription'})}}

<body>
    <nav class="fixe nav_blanche flex_row">
        <div class="zone_gauche flex_row">
            <img class="logo" src="{{ path }}assets/img/logo/Logo.webp" alt="Logo">
            <a class="hover_underligne" href="#">À propos de Lord Reginald Stampee III</a>
        </div>
        <div class="zone_droite flex_row">
            <input aria-label="recherche" class="recherche" type="text" name="recherche" id="recherche"
                placeholder="Votre recherche">
            <a class="hover_underligne" href="./index.html">Actualités</a>
            <a class="hover_underligne" href="./catalogue.html">Enchères</a>
        </div>
    </nav>
    <header class="header_principal flex_row flex_align_center flex_justify_center" id="top">
        <h1 class="principale">Merci pour votre inscription, connecter vous à votre compte</h1>
    </header>
    <nav class="fil_ariane">
        <i class="fa-solid fa-house"></i>
        <a class='retour' href="./index.html">Accueil</a>
        <i class="fa-solid fa-arrow-right"></i>
        <em>Connexion</em>
    </nav>
    <main class="formulaire_connexion flex_column flex_justify_center">
        <form class="flex_column" action="{{ path }}user/auth" method="post">
            <div class="info_connexion flex_column">
                <div class="flex_row flex_align_center">
                    <i class="fa-solid fa-envelope"></i><input aria-label="email" type="email" name="email" id="email"
                        placeholder="Email" required>
                </div>
                <div class="flex_row flex_align_center">
                    <i class="fa-solid fa-lock"></i><input aria-label="password" type="text" name="password"
                        id="password" placeholder="Mot de passe" required>
                </div>
                <a href="#">Mot de passe oublié ?</a>
            </div>
            <button class="call_to_action bleu" type="submit">Connexion</button>
        </form>
    </main>
    <footer class="footer_page flex_column">
        <div class="logo_footer flex_row flex_justify_center ">
            <img src="{{ path }}assets/img/logo/Logo.webp" alt="Logo Lord Stempee">
        </div>
        <div class="aide_generale flex_row flex_justify_around">
            <div class="liste1 liste flex_column">
                <a class="hover_underligne" href="#">Contactez-nous</a>
                <a class="hover_underligne" href="#">Angleterre</a>
                <a class="hover_underligne" href="#">Canada</a>
                <a class="hover_underligne" href="#">États-Units</a>
                <a class="hover_underligne" href="#">Australie</a>
            </div>
            <div class="liste2 liste flex_column">
                <a class="hover_underligne" href="#">Actualité</a>
                <a class="hover_underligne" href="#">Timbres</a>
                <a class="hover_underligne" href="#">Enchères</a>
                <a class="hover_underligne" href="#">Bridge</a>
            </div>
            <div class="liste3 liste flex_column">
                <a class="hover_underligne" href="#">À propos</a>
                <a class="hover_underligne" href="#">La philatélie, c’est la vie</a>
                <a class="hover_underligne" href="#">Biographie du Lord</a>
                <a class="hover_underligne" href="#">Historique familial</a>
            </div>
            <div class="liste4 liste flex_column">
                <a class="hover_underligne" href="#">Questions générales</a>
                <a class="hover_underligne" href="#">Profil</a>
                <a class="hover_underligne" href="#">Comment placer une offre</a>
                <a class="hover_underligne" href="#">Suivre une enchère</a>
                <a class="hover_underligne" href="#">Trouver l’enchère désirée</a>
                <a class="hover_underligne" href="#">Contacter le webmestre</a>
                <a class="hover_underligne" href="#">Termes et condition</a>
            </div>
        </div>
        <div class="info_lettre_media_sociaux flex_row flex_align_center flex_justify_around">
            <div class="info_lettre flex_column flex_justify_center flex_align_center">
                <h1>
                    Ne manquez pas notre infolettre!
                </h1>
                <div class="info_lettre_form flex_row">
                    <input aria-label="info_lettre" type="text" name="info_lettre" id="info_lettre"
                        placeholder="Votre email">
                    <input type="button" value="s'abonner">
                </div>
            </div>
            <div class="reseaux_sociaux flex_row flex_justify_center flex_align_center">
                <i class="fa-brands fa-facebook icon_taille_40 icon_social"></i>
                <i class="fa-brands fa-instagram icon_taille_40 icon_social"></i>
                <i class="fa-brands fa-twitter icon_taille_40 icon_social"></i>
                <i class="fa-brands fa-snapchat icon_taille_40 icon_social"></i>
                <i class="fa-brands fa-tiktok icon_taille_40 icon_social"></i>
            </div>
        </div>
        <p>© Stampee 2022, Tous droits réservés
        </p>
    </footer>
</body>