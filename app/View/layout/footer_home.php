<footer class="site-footer section-padding section-bg-dark">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 text-center">
                <h2 class="mb-5 text-white">Hubungi Kami</h2>
            </div>

            <div class="no-gutters-md row justify-content-around">
                <div class="col-md-5 col-12 mb-4 mb-md-0 ">
                    <iframe class="google-map"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15955.832108930004!2d109.07498579932798!3d1.189849675765968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31e49c2fbdf3d491%3A0x91e764f45793cc44!2sMTs.%20NEGERI%202%20SAMBAS!5e0!3m2!1sid!2sid!4v1686462693971!5m2!1sid!2sid"
                            width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div class="col-md-7 col-md-4 col-6 mb-4 mb-md-0 footer-box">
                    <div>
                        <h6 class="site-footer-title text-white footer-text">Alamat :</h6>
                        <p class="text-white footer-text">
                            <?= $sekolah->getAlamat() ?>
                        </p>
                    </div>
                    <div>
                        <h6 class="site-footer-title text-white footer-text">Telepon :</h6>
                        <p class="text-white footer-text">
                            <a href="tel:<?= $sekolah->getTelepon() ?>" class="site-footer-link text-white footer-text"><?= $sekolah->getTelepon() ?></a>
                        </p>
                    </div>
                    <div>
                        <h6 class="site-footer-title text-white footer-text">Email :</h6>
                        <p class="text-white footer-text">
                            <a href="mailto:<?= $sekolah->getEmail() ?>" class="site-footer-link text-white footer-text"><?= $sekolah->getEmail() ?></a>
                        </p>
                    </div>

                    <div>
                        <h6 class="site-footer-title mb-3 text-white footer-text">Website :</h6>
                        <p class="text-white footer-text">
                            <a href="http://mtsn2sambas.mysch.id/" class="site-footer-link text-white footer-text">
                                <?= $sekolah->getWebsite() ?>
                            </a>
                        </p>
                    </div>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <p class="mt-lg-5 mt-4 text-white">Copyright © 2023 RubyGroup</p>
                </div>
            </div>
        </div>
    </div>


</footer>
<script>
  // Mengambil semua elemen gambar yang dapat diklik
  var clickableImages = document.querySelectorAll('[data-bs-toggle="modal"]');

  // Mengikat penanganan klik pada setiap gambar
  clickableImages.forEach(function (image) {
    image.addEventListener('click', function () {
      var targetModal = this.getAttribute('data-bs-target');
      var modal = new bootstrap.Modal(document.querySelector(targetModal));
      modal.show();
    });
  });
</script>


<script>
  document.addEventListener("DOMContentLoaded", function () {
    var navLinks = document.querySelectorAll(".navbar-nav .nav-link");
    // var subnavLinks = document.querySelectorAll(".navbar-nav .nav-item .nav-link .dropdown .dropdown-item");
    var profileLabel = document.getElementById("profileLabel");

    // Mendapatkan URL halaman saat ini
    var currentUrl = window.location.pathname;

    navLinks.forEach(function (link) {
      // Menambahkan kelas "active" pada elemen navigasi yang sesuai dengan URL saat ini
      if (link.getAttribute("href") === currentUrl) {
        link.classList.add("active");
        profileLabel.classList.add("aaa")
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
<script src="/js/main.js"></script>
</body>

</html>