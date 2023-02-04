const btnSubmit = document.querySelector("input[type=submit]");

const messageErreur = document.querySelector("span[name=erreur_mise]");
const miseMin = document.querySelector("[name='mise']").attributes.min.value;

btnSubmit.addEventListener("click", function (e) {
    messageErreur.className = "call_to_action rouge invisible";

    const mise = document.querySelector("input[name=mise]");
    const miseMin = document.querySelector("[name='mise']");
    if (miseMin.attributes.min.value > mise.value) {
        e.preventDefault();
        messageErreur.className = "call_to_action rouge visible";
        console.log(messageErreur);
    }
});
