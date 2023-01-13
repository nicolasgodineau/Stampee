import { CatalogueTimbres } from "../data/data.js";

const catalogue = document.querySelector("[data-filtre='catalogue']");
const cartes = document.querySelectorAll(".carte");

function remplissageInformationTimbre() {
    cartes.forEach((element, index) => {
        let infoPrix = element.querySelector("[data-filtre='prix']");
        infoPrix.textContent = "$" + CatalogueTimbres[index].prix + ".00";

        let infoLike = element.querySelector("[data-filtre='like']");
        infoLike.textContent = CatalogueTimbres[index].like;

        let infoEtat = element.querySelector("[data-filtre='etat']");
        infoEtat.textContent = CatalogueTimbres[index].etat;

        let nomTimbre = element.querySelector("[data-filtre='nomTimbre']");
        nomTimbre.textContent = CatalogueTimbres[index].titre;

        let infoImages = element.querySelector("[data-filtre='image']");
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
            let minutes = Math.floor(
                (distance % (1000 * 60 * 60)) / (1000 * 60)
            );
            let secondes = Math.floor((distance % (1000 * 60)) / 1000);

            // Affichage
            if (document.title == "Accueil") {
                element.querySelector(".heure h2").innerHTML =
                    jours + "j " + heures + "h " + minutes + "m ";
            } else {
                element.querySelector(".heure h2").innerHTML =
                    jours +
                    "j " +
                    heures +
                    "h " +
                    minutes +
                    "m " +
                    secondes +
                    "s ";
            }

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

//NOTE - Page fiche.html
if (document.title.toLocaleLowerCase() == "fiche") {
    const coeur = document.querySelector(".icon_like");
    coeur.addEventListener("click", function () {
        coeur.classList.toggle("liker");
    });
}

remplissageInformationTimbre();
