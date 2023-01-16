{{ include('header.php', {title: 'Inscription'})}}
{{include('menu.php')}}

<nav class="fil_ariane">
    <i class="fa-solid fa-house"></i>
    <a class='retour' href="../home/index">Accueil</a>
    <i class="fa-solid fa-arrow-right"></i>
    <em>Inscription</em>
</nav>
<main class="formulaire_inscription">
    <form class="flex_column" action="{{ path }}membre/store" method="post">
        <div class="info_perso flex_column">
            <h4>Informations personnelles</h4>
            <input type="hidden" name="Role_idRole" value=1>
            <div class="flex_row flex_align_center">
                <i class="fa-solid fa-user"></i><input aria-label="nom" type="text" name="nom" id="nom"
                    placeholder="Nom" value="{{membre.nom}}" pattern="[A-Za-z]{1,15}"
                    title="Champ prénom invalide 15 lettres maximum exemple: john" required>
            </div>
            <div class="flex_row flex_align_center">
                <i class="fa-solid fa-user"></i><input aria-label="prenom" type="text" name="prenom" id="prenom"
                    placeholder="Prénom" required>
            </div>
            <div class="flex_row flex_align_center">
                <i class="fa-solid fa-phone"></i><input aria-label="telephone" type="text" name="telephone"
                    id="telephone" placeholder="Téléphone" required>
            </div>
            <div class="flex_row flex_align_center">
                <i class="fa-solid fa-house"></i><input aria-label="adresse" type="text" name="adresse" id="adresse"
                    placeholder="Adresse" required>
            </div>
            <!--                 <div class="flex_row flex_align_center">
                    <i class="fa-solid fa-house"></i><input aria-label="ville" type="text" name="ville" id="ville"
                        placeholder="Ville" required>
                </div>
                <div class="flex_row flex_align_center">
                    <i class="fa-solid fa-house"></i><input aria-label="pays" type="text" name="pays" id="pays"
                        placeholder="Pays" required>
                </div> -->
        </div>
        <!--             <div class="info_date_naissance flex_column">
                <h4>Date de naissance</h4>
                <div class="date_naissance flex_row">
                    <div class="flex_row flex_align_center">
                        <i class="fa-solid fa-cake-candles"></i><input aria-label="jourNaissance" type="text"
                            name="jourNaissance" id="jourNaissance" placeholder="JJ" required>
                    </div>
                    <div class="flex_row flex_align_center">
                        <i class="fa-solid fa-cake-candles"></i><input aria-label="moisNaissance" type="text"
                            name="moisNaissance" id="moisNaissance" placeholder="MM" required>
                    </div>
                    <div class="flex_row flex_align_center">
                        <i class="fa-solid fa-cake-candles"></i><input aria-label="anneeNaissance" type="text"
                            name="anneeNaissance" id="anneeNaissance" placeholder="AA" required>
                    </div>
                </div>
            </div> -->
        <div class="info_connexion flex_column">
            <h4>Informations de connexion</h4>
            <div class="flex_row flex_align_center">
                <i class="fa-solid fa-envelope"></i><input aria-label="email" type="email" name="email" id="email"
                    placeholder="Email" required>
            </div>
            <div class="flex_row flex_align_center">
                <i class="fa-solid fa-lock"></i><input aria-label="password" type="text" name="password" id="password"
                    placeholder="Mot de passe ex: 123456" pattern="[0-9]{6,9}"
                    title="6 caractères minimum et uniquement des chiffres" required>
            </div>
            <!--                 <div class="flex_row flex_align_center">
                    <i class="fa-solid fa-lock"></i><input aria-label="passwordConfirm" type="text"
                        name="passwordConfirm" id="passwordConfirm" placeholder="Confirmer le mot de passe" required>
                </div> -->
        </div>
        <button class="call_to_action bleu" type="submit">S'inscrire</button>
    </form>
</main>
{{ include('footer.php') }}

<!--         <div>
            <label for="sexe">Sexe</label>
            <input type="text" id="sexe" name="sexe" required>
        </div> -->

<!--         <h4>Méthode de payment</h4>
        <div class="paiment">
            <span>Carte de crédit</span><input aria-label="carteDeCredit" type="radio" name="carteDeCredit"
                id="carteDeCredit" placeholder="Carte de crédit">
            <span>Paypal</span><input aria-label="paypal" type="radio" name="paypal" id="paypal" placeholder="Paypal">
        </div>
        <div>
            <input aria-label="numeroCarte" type="text" name="numeroCarte" id="numeroCarte"
                placeholder="Numéro de carte" required>
        </div>
        <div>
            <input aria-label="numeroCvc" type="text" name="numeroCvc" id="numeroCvc" placeholder="Numéro CVC" required>
        </div>
        <div>
            <input aria-label="numeroMoisCarte" type="text" name="numeroMoisCarte" id="numeroMoisCarte" placeholder="MM"
                required>
            <input aria-label="numeroAnneeCarte" type="text" name="numeroAnneeCarte" id="numeroAnneeCarte"
                placeholder="AA" required>
        </div> -->