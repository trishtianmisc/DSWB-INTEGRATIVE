document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.querySelector(".navbar");
    let lastScrollY = window.scrollY;

    window.addEventListener("scroll", function () {
        if (window.scrollY > lastScrollY) {
            // Scrolling down
            navbar.classList.add("hidden");
        } else {
            // Scrolling up
            navbar.classList.remove("hidden");
        }
        lastScrollY = window.scrollY;
    });
});



