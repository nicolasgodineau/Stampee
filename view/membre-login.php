{{ include('header.php', {title: 'Connexion'})}}

<body>
    {{include('menu.php')}}
    <header class="header_principal flex_row flex_align_center flex_justify_center" id="top">
        <h1 class="principale">Connexion à votre compte</h1>
    </header>
    <nav class="fil_ariane">
        <i class="fa-solid fa-house"></i>
        <a class='retour' href="{{ path }}home/index">Accueil</a>
        <i class="fa-solid fa-arrow-right"></i>
        <em>Connexion</em>
    </nav>
    <main class="formulaire_connexion flex_column flex_justify_center">
        <span class="error">{{ errors|raw }}</span>
        <form class="flex_column" action="{{ path }}membre/auth" method="post">
            <div class="info_connexion flex_column">
                <div class="flex_row flex_align_center">
                    <i class="fa-solid fa-envelope"></i><input aria-label="email" type="email" name="email" id="email"
                        placeholder="Email" value="{{ membre.email }}" required>
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
    {{ include('footer.php') }}