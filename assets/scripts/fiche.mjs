// Permet de savoir sur quel timbre on clique
// Une fois qu'on clique, on remonte les parents de l'élément cliquer (lien) pour arriver au dataset 'timbre' avec le numéro qui correspond à celui-ci
// Problème:
// Je n'arrive pas à avoir la valeur HORS de l'éccouteur d'évènement
// Essayer avec Async et Await ?

/* let timbreVoulu;
catalogue.addEventListener("click", (e) => {
    let cible = e.target;
    let carteCible = cible.parentNode.parentNode;

    timbreVoulu = carteCible.dataset.timbre;
    console.log("timbreVoulu: dans eventListener", timbreVoulu);
    return timbreVoulu;
}); */

// permet de faire une comparaison avec le timbre voulu lors du clique sur la page catalogue (data set 'timbre' dans l'html)  et la propriété de l'objet 'timbre'
/* function rechercheTimbre(timbreVoulu) {
    let timbreAAfficher;
    CatalogueTimbres.forEach((unTimbre) => {
        if (unTimbre.timbre == timbreVoulu) {
            timbreAAfficher = unTimbre;
        }
    });
}

function remplissage(timbre = 1) {
    console.log("timbre:", timbre);
    let nomTimbre = document.querySelector("[data='nomTimbre']");
    let infoEtat = document.querySelector("[data='etat']");
    let infoPays = document.querySelector("[data='pays']");
    let infoScott = document.querySelector("[data='scott']");
    let infoEmission = document.querySelector("[data='emission']");
    let infoNom = document.querySelector("[data='nom']");
    let infoValeurFaciale = document.querySelector("[data='valeurFaciale']");
    let infoDate = document.querySelector("[data='date']");
    let infoCouleur = document.querySelector("[data='couleur']");
    let infoPerforation = document.querySelector("[data='perforation']");
    let infoPrix = document.querySelector("[data='prix']");
    let infoEnchereSuivante = document.querySelector("[data='enchere']");
    let infoFinEnchere = document.querySelector("[data='finEnchere']");
    console.log("infoEnchereSuivante:", infoEnchereSuivante);
    let infoImages = document.querySelectorAll("[data='image']");

    nomTimbre.textContent = timbre.titre;
    infoEtat.textContent = timbre.etat;
    infoPays.textContent = timbre.pays;
    infoScott.textContent = timbre.scott;
    infoEmission.textContent = timbre.emission;
    infoNom.textContent = timbre.nom;
    infoValeurFaciale.textContent = timbre.valeurFaciale;
    infoDate.textContent = timbre.date;
    infoCouleur.textContent = timbre.couleur;
    infoPerforation.textContent = timbre.perforation;
    infoPrix.textContent = "Prix actuel $" + timbre.prix + ".00";
    infoEnchereSuivante.placeholder = "min $" + (timbre.prix + 30) + ".00";
    infoImages.forEach((uneImage) => {
        uneImage.src = timbre.image;
    });
} */
