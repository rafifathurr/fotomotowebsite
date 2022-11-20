<!DOCTYPE html>
<html lang="en">

<!-- ====== Include head ======  -->
<?php $currentPage = "Portfolio"; ?>
<?php include 'partials/head.php'?>

<body>

<!-- ====== Include navbar ====== -->
<?php include 'partials/navbar.php'?>

  <main id="main">
   <section id="portfolio" class="portfolio">
    <div class="container">

      <div class="section-titlepage">
        <a href="portfolio.html"><h2>Our Portfolio</h2></a>
        <p>Our Collection</p>
      </div>

      <ul id="portfolio-flters" class="d-flex justify-content-center">
        <li data-filter="*" class="filter-active">All</li>
        <li data-filter=".filter-app">Pre-Wedding</li>
        <li data-filter=".filter-card">Wedding</li>
        <li data-filter=".filter-web">Event</li>
        <li data-filter=".filter-new">Model</li>
      </ul>

      <div class="row portfolio-container">

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-img"><img src="assets/img/portfolio/prewedding-1.jpg" class="img-fluid" alt=""></div>
          <div class="portfolio-info">
            <h4>Prewedding Sample</h4>
            <a href="assets/img/portfolio/prewedding-1.jpg" data-gall="portfolioGallery" class="venobox preview-link2" title="Prewedding Sample"><i class="bx bx-plus"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-new">
          <div class="portfolio-img"><img src="assets/img/portfolio/Model-1.jpg" class="img-fluid" alt=""></div>
          <div class="portfolio-info">
            <h4>Model Sample</h4>
            <a href="assets/img/portfolio/Model-1.jpg" data-gall="portfolioGallery" class="venobox preview-link2" title="Model Sample"><i class="bx bx-plus"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-img"><img src="assets/img/portfolio/Event-1.jpg" class="img-fluid" alt=""></div>
          <div class="portfolio-info">
            <h4>Event Sample</h4>
            <a href="assets/img/portfolio/Event-1.jpg" data-gall="portfolioGallery" class="venobox preview-link2" title="Event Sample"><i class="bx bx-plus"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-img"><img src="assets/img/portfolio/prewedding-2.jpg" class="img-fluid" alt=""></div>
          <div class="portfolio-info">
            <h4>Prewedding Sample</h4>
            <a href="assets/img/portfolio/prewedding-2.jpg" data-gall="portfolioGallery" class="venobox preview-link2" title="Prewedding Sample"><i class="bx bx-plus"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <div class="portfolio-img"><img src="assets/img/portfolio/wedding-1.jpg" class="img-fluid" alt=""></div>
          <div class="portfolio-info">
            <h4>Wedding Sample</h4>
            <a href="assets/img/portfolio/wedding-1.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Wedding Sample"><i class="bx bx-plus"></i></a>
            <a href="portfolio.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-img"><img src="assets/img/portfolio/Event-2.jpg" class="img-fluid" alt=""></div>
          <div class="portfolio-info">
            <h4>Event Sample</h4>
            <a href="assets/img/portfolio/Event-2.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Event Sample"><i class="bx bx-plus"></i></a>
            <a href="portfolio.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-img"><img src="assets/img/portfolio/prewedding-3.jpg" class="img-fluid" alt=""></div>
          <div class="portfolio-info">
            <h4>Prewedding Sample</h4>
            <a href="assets/img/portfolio/prewedding-3.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Prewedding Sample"><i class="bx bx-plus"></i></a>
            <a href="portfolio.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <div class="portfolio-img"><img src="assets/img/portfolio/wedding-2.jpg" class="img-fluid" alt=""></div>
          <div class="portfolio-info">
            <h4>Wedding Sample</h4>
            <a href="assets/img/portfolio/wedding-2.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Wedding Sample"><i class="bx bx-plus"></i></a>
            <a href="portfolio.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <div class="portfolio-img"><img src="assets/img/portfolio/wedding-3.jpg" class="img-fluid" alt=""></div>
          <div class="portfolio-info">
            <h4>Wedding Sample</h4>
            <a href="assets/img/portfolio/wedding-3.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Wedding Sample"><i class="bx bx-plus"></i></a>
            <a href="portfolio.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-img"><img src="assets/img/portfolio/Event-3.jpg" class="img-fluid" alt=""></div>
          <div class="portfolio-info">
            <h4>Event Sample</h4>
            <a href="assets/img/portfolio/Event-3.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Event Sample"><i class="bx bx-plus"></i></a>
            <a href="portfolio.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-new">
          <div class="portfolio-img"><img src="assets/img/portfolio/Model-2.jpg" class="img-fluid" alt=""></div>
          <div class="portfolio-info">
            <h4>Model Sample</h4>
            <a href="assets/img/portfolio/Model-2.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Model Sample"><i class="bx bx-plus"></i></a>
            <a href="portfolio.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End My Portfolio Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 <!-- ======= Footer ======= -->
 <footer id="footer">
  <div class="container">
    <img src="assets/img/footer/fotomoto.png" alt="">
    <div class="social-links">
      <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
      <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
      <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
    </div>
    <div class="copyright">
      &copy; Copyright <strong><span>Fotomoto Photograph</span></strong>. All Rights Reserved
    </div>
    </div>
  </div>
</footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/second-main.js"></script>

</body>

</html>