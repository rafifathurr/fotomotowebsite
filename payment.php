<?php 
require 'function/function.php';

if(!isset($_SESSION["signin"])){
    header("Location: signin.php");
    exit;
 }
 if(!isset($_SESSION["booking"])){
    header("Location: home.php");
    exit;
 }
 if(isset($_POST["btn_verif_pay"])){
 
    $gambar = $_FILES["upload_proof"];
 
    if(uploadpayment($_POST)>0){
    $_SESSION["invoice_id"] = "";
       echo "
       <script type='text/javascript'>
          setTimeout(function () { 
             let timerInterval
             Swal.fire({
                title: 'Payment Successfully',
                text: 'Please Wait Until We Process Your Booking!',
                icon: 'success',
                type: 'success',
                showConfirmButton: false
            })
                .then(function () {
                   window.location = 'home.php';
                        });}, 100);
          </script>";
    }else{
        echo "<script type='text/javascript'>
        setTimeout(function () { Swal.fire('Sign In Failed!', 
           'Invalid Email or Password!', 
           'error')}, 100);
        </script>
     ";
    }
 }

?>
<!DOCTYPE html>
<html lang="en">

<!-- ====== Include head ======  -->
<?php $currentPage = "Payment"; ?>
<?php include 'partials/head.php'?>

<body>

<!-- ====== Include navbar ====== -->
<?php include 'partials/navbar.php'?>

  <main id="main">
    <section id="contact" class="pricing">
    <div class="container">

      <div class="section-titlepage">
        <h2>Upload Your Payment</h2>
        <h4>INV/<?=$_SESSION["invoice_id"];?></h4>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-6">
            <form action="" method="post" role="form" enctype="multipart/form-data">
                <!-- <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div> -->
                <div class="row justify-content-center">
                    <img src="assets/img/qris.png" alt="">
                    <img src="assets/img/barcode.jpeg" alt="" width="60%">
                </div>
                <div class="form-group">
                  <input type="hidden" name="invoice_id" value="<?=$_SESSION['invoice_id'];?>">
                  <label for="upload">Upload Your Proof Payment</label>
                  <input type="file" class="form-control" name="upload_proof" id="upload" required/>
                  <span style="color:red; font-size:12px;">*) Upload Required 20MB size</span>
                  <br>
                  <span style="color:red; font-size:12px;">*) Only accept JPG, JPEG and PNG Extension</span>
                  <div class="validate"></div>
                </div>
                <!-- <div class="form-group">
                  <input type="file" class="form-control" name="upload_proof" placeholder="Subject Services" readonly required/>
                  <div class="validate"></div>
                </div> -->
                <!-- <div class="form-group">
                  <input type="text" class="form-control numeric" name="price" id="price" value="<?= $price;?>" placeholder="Price Service" readonly required/>
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <input type="date" class="form-control" id="datebook" name="datebook" placeholder="Date for booking" required/>
                </div>
                <div class="form-group">
                  <textarea id="additional" class="form-control" name="additional" rows="6" data-rule="required" data-msg="Please write something for us" placeholder="Additional Add"></textarea>
                  <div class="validate"></div>
                </div>` -->
                <div class="btn-wrap">
                  <button name="btn_verif_pay" class="btn-buy">Upload</button>
                </div>
              </form>
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
  <script src="dist/jquery.inputmask.bundle.js"></script>
  <script src="dist/sweetalert2.all.min.js"></script>
  <script src="dist/sweetalert2.js"></script>
  <script type="text/javascript"> 

            $('.numeric').inputmask({
               alias:"numeric",
               prefix: "Rp.",
               digits:0,
               repeat:20,
               digitsOptional:false,
               decimalProtect:true,
               groupSeparator:".",
               placeholder: '0',
               radixPoint:",",
               radixFocus:true,
               autoGroup:true,
               autoUnmask:false,
               clearMaskOnLostFocus: false,
               onBeforeMask: function (value, opts) {
                  return value;
               },
               removeMaskOnSubmit:true
            });


         </script>

</body>

</html>