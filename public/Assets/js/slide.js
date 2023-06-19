var slides = document.querySelectorAll(".slide-galery");
var currentSlide = 0;

function showSlide(n) {
    slides[currentSlide].style.display = "none";
    slides[n].style.display = "block";
    currentSlide = n;
}

function nextSlide() {
    var next = currentSlide + 1;
    if (next >= slides.length) {
        next = 0;
    }
    showSlide(next);
}

function previousSlide() {
    var prev = currentSlide - 1;
    if (prev < 0) {
        prev = slides.length - 1;
    }
    showSlide(prev);
}

// Atur waktu perpindahan slide (misalnya, setiap 3 detik)
setInterval(nextSlide, 3000);
