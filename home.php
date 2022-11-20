<!DOCTYPE html>
<html lang="en">

<!-- ====== Include head ======  -->
<?php $currentPage = "Home"; ?>
<?php include 'partials/head.php'?>

<body>

<!-- ====== Include navbar ====== -->
<?php include 'partials/navbar.php'?>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <img src="assets/img/hero/Fotomoto.png" alt="">
      <a href="#about" class="btn-scroll scrollto" title="Scroll Down"><i class="bx bx-chevron-down"></i></a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Me Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <a href="about.php"><h2>About Us</h2></a>
          <p>FotoMoto Photograph is a company provides photography services located in Jakarta, Indonesia</p>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="content pl-lg-4 d-flex flex-column justify-content-center">

              <div class="row mt-n4">
                <div class="col-md-6 mt-5 d-md-flex justify-content-center">
                  <div class="count-box">
                    <i class="icofont-simple-smile" style="color: #B6AA56;"></i>
                    <span data-toggle="counter-up">20</span>
                    <p><strong>Happy Clients</strong> with our services.</p>
                  </div>
                </div>

                <div class="col-md-6 mt-5 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="icofont-document-folder" style="color: #B6AA56;"></i>
                    <span data-toggle="counter-up">10</span>
                    <p><strong>Projects</strong> about photography, videography and film maker.</p>
                  </div>
                </div>

                <div class="col-md-6 mt-5 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="icofont-clock-time" style="color: #B6AA56;"></i>
                    <span data-toggle="counter-up">3</span>
                    <p><strong>Years of experience</strong> about professional photography.</p>
                  </div>
                </div>

                <div class="col-md-6 mt-5 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="icofont-award" style="color: #B6AA56;"></i>
                    <span data-toggle="counter-up">2</span>
                    <p><strong>Awards</strong> of the best photography and videography in our country.</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->

          </div>
        </div>

      </div>
    </section><!-- End About Me Section -->

    <!-- ======= My Services Section ======= -->
    <section id="services" class="pricing">
      <div class="container">

        <div class="section-title">
          <a href="services.php"><h2>Our Services</h2></a>
          <p>Our Service all about photography and videography</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="box">
              <h3>Pre-Wedding</h3>
              <ul>
                <li>START FROM</li>
              </ul>
              <h4><sup>Rp. 500.000,-</sup></h4>
              <ul>
                <li>Include :</li>
                <li>Photo</li>
                <li>Video</li>
                <li>FREE CD / FLASHDISK</li>
              </ul>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
            <div class="box">
              <h3>Wedding</h3>
              <ul>
                <li>START FROM</li>
              </ul>
              <h4><sup>Rp. 2.000.000,-</sup></h4>
              <ul>
                <li>Include :</li>
                <li>Photo</li>
                <li>Video</li>
                <li>FREE CD / FLASHDISK</li>
              </ul>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="box">
              <h3>Event Photoshoot</h3>
              <ul>
                <li>START FROM</li>
              </ul>
              <h4><sup>Rp. 500.000,-</sup></h4>
              <ul>
                <li>Include :</li>
                <li>Photo</li>
                <li>Video</li>
                <li>FREE CD / FLASHDISK</li>
              </ul>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="box">
              <h3>Model Photo Session</h3>
              <ul>
                <li>START FROM</li>
              </ul>
              <h4><sup>Rp. 200.000,-</sup></h4>
              <ul>
                <li>Include :</li>
                <li>Photo</li>
                <li>Video</li>
                <li>FREE CD / FLASHDISK</li>
              </ul>
            </div>
          </div>

        </div>

      </div>
    </section>

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container">

        <div class="owl-carousel testimonials-carousel">

          <div class="testimonial-item">
            <img src="assets/img/rudysalim.jpg" class="testimonial-img" alt="">
            <h3>Rudy Salim</h3>
            <h4>Ceo &amp; Founder Prestige Showroom</h4>
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              The best quality of the photo and good services.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
          </div>

          <div class="testimonial-item">
            <img src="assets/img/bamsoet.jpg" class="testimonial-img" alt="">
            <h3>Bambang Soesatyo</h3>
            <h4>Ceo &amp; Founder IMI</h4>
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              The best photograph company in Jakarta and very recommended.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
          </div>

        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= My Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <a href="portfolio.php"><h2>Our Portfolio</h2></a>
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
              <a href="assets/img/portfolio/prewedding-1.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Prewedding Sample"><i class="bx bx-plus"></i></a>
              <a href="portfolio.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-new">
            <div class="portfolio-img"><img src="assets/img/portfolio/Model-1.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Model Sample</h4>
              <a href="assets/img/portfolio/Model-1.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Model Sample"><i class="bx bx-plus"></i></a>
              <a href="portfolio.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-img"><img src="assets/img/portfolio/Event-1.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Event Sample</h4>
              <a href="assets/img/portfolio/Event-1.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Event Sample"><i class="bx bx-plus"></i></a>
              <a href="portfolio.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-img"><img src="assets/img/portfolio/prewedding-2.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Prewedding Sample</h4>
              <a href="assets/img/portfolio/prewedding-2.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Prewedding Sample"><i class="bx bx-plus"></i></a>
              <a href="portfolio.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-img"><img src="assets/img/portfolio/wedding-1.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Wedding Sample</h4>
              <a href="assets/img/portfolio/wedding-1.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Wedding Sample"><i class="bx bx-plus"></i></a>
              <a href="portfolio.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-img"><img src="assets/img/portfolio/Event-2.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Event Sample</h4>
              <a href="assets/img/portfolio/Event-2.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Event Sample"><i class="bx bx-plus"></i></a>
              <a href="portfolio.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-img"><img src="assets/img/portfolio/prewedding-3.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Prewedding Sample</h4>
              <a href="assets/img/portfolio/prewedding-3.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Prewedding Sample"><i class="bx bx-plus"></i></a>
              <a href="portfolio.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-img"><img src="assets/img/portfolio/wedding-2.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Wedding Sample</h4>
              <a href="assets/img/portfolio/wedding-2.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Wedding Sample"><i class="bx bx-plus"></i></a>
              <a href="portfolio.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-img"><img src="assets/img/portfolio/wedding-3.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Wedding Sample</h4>
              <a href="assets/img/portfolio/wedding-3.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Wedding Sample"><i class="bx bx-plus"></i></a>
              <a href="portfolio.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-img"><img src="assets/img/portfolio/Event-3.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Event Sample</h4>
              <a href="assets/img/portfolio/Event-3.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Event Sample"><i class="bx bx-plus"></i></a>
              <a href="portfolio.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-new">
            <div class="portfolio-img"><img src="assets/img/portfolio/Model-2.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Model Sample</h4>
              <a href="assets/img/portfolio/Model-2.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Model Sample"><i class="bx bx-plus"></i></a>
              <a href="portfolio.php" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End My Portfolio Section -->

    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <a href="contact.php"><h2>Contact Us</h2></a>
          <p>For Futher Information and Services</p>
        </div>

        <div class="row justify-content-center">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-share-alt"></i>
                  <h3>Social Media</h3>
                  <div class="social-links">
                    <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                    <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                    <a href="https://www.instagram.com/doemoment/?hl=en" class="instagram"><i class="icofont-instagram"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Me</h3>
                  <p>fotomotophotograph@gmail.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Me</h3>
                  <p>+6281364243280</p>
                </div>
              </div>
            </div>

          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <img src="assets/img/footer/fotomoto.png" alt="">
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
  <script src="assets/js/main.js"></script>

</body>

</html>