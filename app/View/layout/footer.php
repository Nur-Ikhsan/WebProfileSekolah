<script>
// Mengambil semua elemen gambar yang dapat diklik
var clickableImages = document.querySelectorAll('[data-bs-toggle="modal"]');

// Mengikat penanganan klik pada setiap gambar
clickableImages.forEach(function(image) {
    image.addEventListener('click', function() {
        var targetModal = this.getAttribute('data-bs-target');
        var modal = new bootstrap.Modal(document.querySelector(targetModal));
        modal.show();
    });
});
</script>


<script>
document.addEventListener("DOMContentLoaded", function() {
    var navLinks = document.querySelectorAll(".navbar-nav .nav-link");
    // var subnavLinks = document.querySelectorAll(".navbar-nav .nav-item .nav-link .dropdown .dropdown-item");

    // Mendapatkan URL halaman saat ini
    var currentUrl = window.location.pathname;

    navLinks.forEach(function(link) {
        // Menambahkan kelas "active" pada elemen navigasi yang sesuai dengan URL saat ini
        if (link.getAttribute("href") === currentUrl) {
            link.classList.add("active");


        }
    });
});
</script>

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/jquery.sticky.js"></script>
<script src="/js/click-scroll.js"></script>
<script src="/js/custom.js"></script>
<script src="/js/owl.carousel.min.js"></script>
</body>

</html>