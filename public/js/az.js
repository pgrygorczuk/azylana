'use strict';

function countdownTimer(elementId) {
    // Pobierz element HTML
    const timerElement = document.getElementById(elementId);
    const endDate = timerElement.getAttribute("end");

    // Ustaw interwał odświeżania co sekundę
    const countdownInterval = setInterval(updateCountdown, 1000);

    function updateCountdown() {
        // Pobierz obecną datę i datę docelową
        const currentDate = new Date();
        const targetDate = new Date(endDate);

        // Oblicz różnicę czasu w milisekundach
        const timeDifference = targetDate - currentDate;

        // Sprawdź, czy osiągnięto datę docelową
        if (timeDifference <= 0) {
            clearInterval(countdownInterval);
            timerElement.innerHTML = '';
        } else {
            // Oblicz pozostały czas w dniach, godzinach, minutach i sekundach
            const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

            // Aktualizuj zawartość elementu HTML
            timerElement.innerHTML = `${days} ${hours}:${minutes}:${seconds}`;
        }
    }
}

function incrementResource(elems)
{
    elems.forEach( elem => {

        // Pobierz dane z atrybutów
        const income = parseFloat(elem.getAttribute('data-income'));
        const exactValue = parseFloat(elem.getAttribute('data-value'));
        let currentValue = parseFloat(exactValue);

        // Ustaw interwał odświeżania co sekundę
        const incrementInterval = setInterval(incrementValue, 1000);

        function incrementValue() {
            // Zwiększ wartość o wartość z atrybutu data-income
            currentValue += income / 3600.0;

            // Zaokrąglij do liczby całkowitej
            const roundedValue = Math.floor(currentValue);

            // Aktualizuj zawartość elementu HTML
            elem.textContent = roundedValue;
            elem.setAttribute('data-value', currentValue);
        }

    });
}

window.onload = function(){


};



