import "./bootstrap";

// mobile menu
document.addEventListener("DOMContentLoaded", function () {
    const openMenuBtn = document.getElementById("open-menu");
    const closeMenuBtn = document.getElementById("close-menu");
    const mobileMenu = document.getElementById("mobile-menu");

    if (openMenuBtn && mobileMenu) {
        openMenuBtn.addEventListener("click", function () {
            mobileMenu.classList.remove("hidden");
        });
    }
    if (closeMenuBtn && mobileMenu) {
        closeMenuBtn.addEventListener("click", function () {
            mobileMenu.classList.add("hidden");
        });
    }
});
