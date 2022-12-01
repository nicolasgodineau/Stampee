import { CatalogueTimbres } from "../data/data.js";

const catalogue = document.querySelector("[data='catalogue']");
const cartes = document.querySelectorAll(".carte");

remplissageInformationTimbre();
function remplissageInformationTimbre() {
    cartes.forEach((element, index) => {
        // création d'un dataset pour identifier les timbres
        let datasetTimbre = element.dataset.timbre;
        datasetTimbre = CatalogueTimbres[index].timbre;

        let infoPrix = element.querySelector("[data='prix']");
        infoPrix.textContent = "$" + CatalogueTimbres[index].prix + ".00";

        let infoLike = element.querySelector("[data='like']");
        infoLike.textContent = CatalogueTimbres[index].like;

        let infoEtat = element.querySelector("[data='etat']");
        infoEtat.textContent = CatalogueTimbres[index].etat;

        let nomTimbre = element.querySelector("[data='nomTimbre']");
        nomTimbre.textContent = CatalogueTimbres[index].titre;

        let infoImages = element.querySelector("[data='image']");
        infoImages.src = CatalogueTimbres[index].image;

        let timer = setInterval(function () {
            // date d'échéance
            let dateFin = new Date(
                CatalogueTimbres[index].finEnchere
            ).getTime();
            // date du jours
            const dateMaintenant = new Date().getTime();

            // calcule l'interval entre la date du jour et la date de fin
            const distance = dateFin - dateMaintenant;

            // calcul des jours, heures, minutes et secondes
            const jours = Math.floor(distance / (1000 * 60 * 60 * 24));
            const heures = Math.floor(
                (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
            );
            var minutes = Math.floor(
                (distance % (1000 * 60 * 60)) / (1000 * 60)
            );
            var secondes = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            element.querySelector(".heure h2").innerHTML =
                jours + "j " + heures + "h " + minutes + "m " + secondes + "s ";

            // si le timer est terminer on affiche un message
            if (distance < 0) {
                element.querySelector(".heure h2").innerHTML = "Terminer";
            }
        }, 1000); // acctualisation toutes les secondes

        // modification du svg like
        let ajoutLike = element.querySelector(".like .icon_like");

        ajoutLike.addEventListener("click", function () {
            let coeur = element.querySelector(".like .icon_like");
            // changement de la couleur du coeur
            coeur.classList.toggle("liker");

            // si il y a changement de class (coeur rouge) alors +1 pour les likes, si le coeur rouge devient noir alors like-1
            if (coeur.classList.contains("liker")) {
                CatalogueTimbres[index].like++;
            } else {
                CatalogueTimbres[index].like--;
            }
            infoLike.textContent = CatalogueTimbres[index].like;
        });
    });
}

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

//Pour la page carte.html
// permet de faire une comparaison avec le timbre voulu lors du clique sur la page catalogue (data set 'timbre' dans l'html)  et la propriété de l'objet 'timbre'
function rechercheTimbre(timbreVoulu) {
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
}
