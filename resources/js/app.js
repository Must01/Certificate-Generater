import "./bootstrap";

const images = [
    "/images/background1.jpg",
    "/images/background2.jpg",
    "/images/background3.jpg",
    "/images/background4.jpg",
];

let idx = 0;
const bg = document.getElementById("background");

bg.style.transition = "filter .5s";

// Ensure blur is removed only after image loads
bg.onload = () => {
    bg.style.filter = "blur(0)";
};

setInterval(() => {
    // Blur out
    bg.style.filter = "blur(2px)";
    // Wait for blur-out to finish before changing image
    setTimeout(() => {
        idx = (idx + 1) % images.length;
        if (bg.src !== location.origin + images[idx]) {
            bg.src = images[idx];
        } else {
            // If image is cached and onload doesn't fire, remove blur manually
            bg.style.filter = "blur(0)";
        }
    }, 500);
}, 5000);
