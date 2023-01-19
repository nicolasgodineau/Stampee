let password = document.querySelector("[name='password']");
let passwordConfirm = document.querySelector("[name='passwordConfirm']");
console.log("passwordConfirm:", passwordConfirm);

passwordConfirm.addEventListener("click", function () {
    console.log("coucou");
});
confirmPassword();
function confirmPassword() {
    password.textContent === passwordConfirm.textContent
        ? console.log("cooucou")
        : alert();
}

function alert() {
    let messageAlert = document.querySelector(".alert");
    messageAlert.classList.toggle("visible");
    console.log("messageAlert:", messageAlert);
}

function javascript_abort() {
    throw new Error("This is not an error. This is just to abort javascript");
}

function matchPassword() {
    let password = document.querySelector("[name='password']");
    let passwordConfirm = document.querySelector("[name='passwordConfirm']");
    if (password != passwordConfirm) {
        alert("Passwords did not match");
    } else {
        alert("Password created successfully");
    }
}

function validateMyForm() {
    if (password.textContent !== passwordConfirm.textContent) {
        alert("validation failed false");
        returnToPreviousPage();
        return false;
    }

    alert("validations passed");
    return true;
}
