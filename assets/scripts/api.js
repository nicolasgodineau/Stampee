const URLDataCountryStateCity = `https://api.countrystatecity.in/v1/countries/`;
const APIKey = "Q2JxaTFyUUdzWW5jWU5kRHNVeE9rVk00SnRSU3N1OFpLcEVhakp0QQ==";
let headers = new Headers();
headers.append("X-CSCAPI-KEY", APIKey);

let requestOptions = {
    method: "GET",
    headers: headers,
    redirect: "follow",
};

const pointInsertionPays = document.querySelector("#pays");
const pointInsertionVilles = document.querySelector("#ville");
const formulaire = document.querySelector(".formulaire_inscription");
const selects = document.querySelectorAll("select");
console.log("selects:", selects);
selects.forEach((select) => {
    console.log(select);
});

formulaire.addEventListener("click", function (e) {
    const cible = e.target;
    if (
        cible.tagName == "OPTION" &&
        cible.parentElement.attributes.name.value == "pays"
    ) {
        getListeVille(cible.value);

        /* Permet le changement de la couleur de texte apres la sélection */
        selects[0].className = "";
    } else if (
        cible.tagName == "OPTION" &&
        cible.parentElement.attributes.name.value == "ville"
    ) {
        /* Permet le changement de la couleur de texte apres la sélection */
        selects[1].className = "";
    }
});

let chaineHTMLPays = `<option class='placeholder' style="color:red" selected>Votre pays</option>`;
let chaineHTMLVilles = `<option class='placeholder' selected>Votre ville</option>`;

getListePays();
function getListePays() {
    pointInsertionPays.innerHTML = chaineHTMLPays;
    pointInsertionVilles.innerHTML = chaineHTMLVilles;
    fetch(URLDataCountryStateCity, requestOptions)
        .then((data) => data.json())
        .then((data) => {
            data.forEach((unPays) => {
                chaineHTMLPays += `
                <option value="${unPays.iso2}">${unPays.name}</option>
                `;
            });
            pointInsertionPays.innerHTML = chaineHTMLPays;
        });
}

function getListeVille(params) {
    fetch(URLDataCountryStateCity + params + `/states`, requestOptions)
        .then((data) => data.json())
        .then((data) => {
            data.forEach((uneVille) => {
                chaineHTMLVilles += `
                <option value="${uneVille.iso2}">${uneVille.name}</option>
                `;
            });
            pointInsertionVilles.innerHTML = chaineHTMLVilles;
        });
}
