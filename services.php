<?php 
require 'function/function.php';

if(!isset($_SESSION["signin"])){
  header("Location: signin.php");
  exit;
}

if(isset($_POST["book_service"])){
  $_SESSION["category"] = $_POST["cat_val"];
  $_SESSION["price"] = $_POST["price"];
  header("Location: book.php");
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<!-- ====== Include head ======  -->
<?php $currentPage = "Our Service"; ?>
<?php include 'partials/head.php'?>

<body>

<!-- ====== Include navbar ====== -->
<?php include 'partials/navbar.php'?>


  <main id="main">
   <section id="services" class="pricing">
    <div class="container">

      <div class="section-titlepage">
        <h2>Our Services</h2>
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
                <div class="btn-wrap">
                  <form action="" method="post">
                    <input type="hidden" name="cat_val" value="Pre-Wedding">
                    <input type="hidden" name="price" value="500000">
                    <button name="book_service" class="btn-buy" >Book Now</button>
                  </form>
                </div>
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
                <div class="btn-wrap">
                  <form action="" method="post">
                    <input type="hidden" name="cat_val" value="Wedding">
                    <input type="hidden" name="price" value="2000000">
                    <button name="book_service" class="btn-buy">Book Now</button>
                  </form>
                </div>
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
                <div class="btn-wrap">
                  <form action="" method="post">
                    <input type="hidden" name="cat_val" value="Event Photoshoot">
                    <input type="hidden" name="price" value="500000">
                    <button name="book_service" class="btn-buy">Book Now</button>
                  </form>
                </div>
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
                <div class="btn-wrap">
                  <form action="" method="post">
                    <input type="hidden" name="cat_val" value="Model Photo Session">
                    <input type="hidden" name="price" value="200000">
                    <button name="book_service" class="btn-buy">Book Now</button>
                  </form>
                </div>
            </div>
          </div>

        </div>

    </div>
  </section>

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