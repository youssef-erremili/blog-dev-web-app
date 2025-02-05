document.addEventListener("DOMContentLoaded", function () {
    // And use "DOMContentLoaded" method to make sure 
    const alert = document.querySelector('.alert');
    if (alert) {
        alert.classList.remove('hide');
        alert.classList.add('show');

        // I used setTimeout to hide the alert after choosen time "5500ms"
        setTimeout(() => {
            alert.classList.remove('show');
            alert.classList.add('hide');
        }, 5500);
    }
});