let alltimer = document.querySelectorAll("article");

alltimer.forEach((unTimer) => {
    let status = unTimer.querySelector(".heure").attributes.status.value;
    if (status == 2) {
        unTimer.querySelector("[data-filtre='finEnchere']").innerHTML =
            "Terminer";
    } else {
        const getDateTime =
            unTimer.querySelector(".heure h2").attributes[1].textContent;
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
            let minutes = Math.floor(
                (distance % (1000 * 60 * 60)) / (1000 * 60)
            );
            let seconds = Math.floor((distance % (1000 * 60)) / 1000);
            // Output the result in an element with id="counter"11
            unTimer.querySelector("[data-filtre='finEnchere']").innerHTML =
                days + "J " + hours + "h " + minutes + "m " + seconds + "s";
            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                unTimer.querySelector("[data-filtre='finEnchere']").innerHTML =
                    "Terminer";
            }
        }, 1000);
    }
});
