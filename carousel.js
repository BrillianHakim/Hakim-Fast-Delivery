let slideIndex = 0;
let slides = document.querySelectorAll('.carousel-item');

// Fungsi untuk menampilkan slide berikutnya atau sebelumnya
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Fungsi untuk menampilkan slide saat ini
function showSlides(n) {
    if (n >= slides.length) {
        slideIndex = 0;
    } else if (n < 0) {
        slideIndex = slides.length - 1;
    }

    // Semua slide dijadikan tidak terlihat
    slides.forEach(slide => slide.style.display = 'none');

    // Hanya slide yang sedang aktif yang ditampilkan
    slides[slideIndex].style.display = 'block';
}

// Tampilkan slide pertama saat halaman dimuat
showSlides(slideIndex);
