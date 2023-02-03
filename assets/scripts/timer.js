const getDateTime = document.querySelector("[data-filtre='jour']").textContent;

let status = document.querySelector("footer ul").attributes.status.value;
console.log("status:", status);

if (status == 2) {
    document.querySelector("[data-filtre='finEnchere']").innerHTML = "Terminer";
} else {
    let countDownDate = new Date(getDateTime).getTime();
    // Update the count down every 1 second
    let x = setInterval(function () {
        let now = new Date().getTime();
        // Find the distance between now an the count down date
        let distance = countDownDate - now;
        // Time calculations for days, hours, minutes and seconds
        let days = Math.floor(distance / (1000 * 60 * 60 * 24));
        let hours = Math.floor(
            (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
        );
        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((distance % (1000 * 60)) / 1000);
        // Output the result in an element with id="counter"11
        /*     document.querySelector("[data-filtre='finEnchere'] span").innerHTML =
            days + " Jour : " + hours + "h " + minutes + "m " + seconds + "s "; */
        document.querySelector("[data-filtre='jour']").innerHTML =
            days + " Jour : ";
        document.querySelector("[data-filtre='heures']").innerHTML =
            hours + "h ";
        document.querySelector("[data-filtre='minutes']").innerHTML =
            minutes + "m ";
        document.querySelector("[data-filtre='secondes']").innerHTML =
            seconds + "s ";
        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.querySelector("[data-filtre='finEnchere']").innerHTML =
                "Terminer";
        }
    }, 1000);
}
