import { CatalogueTimbres } from "../data/data.js";

const catalogue = document.querySelector("[data-filtre='catalogue']");
const cartes = document.querySelectorAll(".carte");

function remplissageInformationTimbre() {
    cartes.forEach((element, index) => {
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
