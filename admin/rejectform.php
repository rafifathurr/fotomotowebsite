<?php 
require '../function/function.php';

if(!isset($_SESSION["signinadmin"])){
  header("Location: signin.php");
  exit;
}

$invoice = $_GET["invoice_id"];

$orders = query('SELECT *
                from booking cp
                join user u on u.user_id = cp.user_id
                where cp.invoice_id = '.$invoice.'
                order by cp.id DESC');

if(isset($_POST['reject'])){
  if(reject($_POST)>0){
    echo "
    <script type='text/javascript'>
       setTimeout(function () { 
          let timerInterval
          Swal.fire({
             title: 'Booking Succesfully Cancelled!',
             text: '',
             icon: 'success',
             type: 'success',
             showConfirmButton: false
         })
             .then(function () {
                window.location = 'index.php';
                     });}, 100);
       </script>";
 }
}elseif(isset($_POST['cancel'])){
  unset($_SESSION['menu']);
  header('Location: index.php');
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<!-- ====== Include head ======  -->
<?php $currentPage = "Book Service"; ?>
<?php include 'partials/head.php'?>

<body>

<!-- ====== Include navbar ====== -->
<?php include 'partials/nav.php'?>

  <main id="main">
    <section id="contact" class="pricing">
    <div class="container">

      <div class="section-titlepage">
        <h2>Reject Form Booking</h2>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-6">
            <form action="" method="post" role="form" enctype="multipart/form-data">
            <?php foreach ($orders as $order):?>
              <input type="hidden" name="invoice" value="<?=$order['invoice_id']?>">
                <div class="form-group">
                  <label for="">Invoice</label>
                  <input type="text" name="inv" class="form-control" value ="INV/<?=$order['invoice_id'];?>" placeholder="Your Name" data-rule="minlen:4" readonly/>
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <label for="">User</label>
                  <input type="text" name="name" class="form-control" value ="<?=$order['full_name'];?>" placeholder="Your Name" data-rule="minlen:4" readonly/>
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="text" class="form-control" name="email" value ="<?=$order['email'];?>" placeholder="Booking As Name" readonly required/>
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <label for="">Phone</label>
                  <input type="text" class="form-control" name="phone" value ="<?=$order['phone'];?>" placeholder="Booking As Name" readonly required/>
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <label for="">Booking As</label>
                  <input type="text" class="form-control" name="book_as" value ="<?=$order['booking_as'];?>" placeholder="Booking As Name" readonly required/>
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <label for="">Type of Service</label>
                  <input type="text" class="form-control" name="subject" value ="<?=$order['subject'];?>" value="" placeholder="Subject Services" readonly required/>
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <label for="">Date Booking</label>
                  <input type="date" class="form-control" id="datebook" name="datebook" value ="<?=$order['book_date'];?>" value="" placeholder="Price Service" readonly required/>
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <label for="">Additional</label>
                  <textarea id="additional" class="form-control" name="additional" rows="6" data-rule="required" data-msg="Please write something for us" placeholder="Additional Add" readonly><?=$order['additional'];?></textarea>
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <label for="">Proof Payment</label>
                  <br>
                  <div>
                    <a href="../proof_payment/<?=$order['proof_payment'];?>" style="color:#007bff !important" target="blank">
                    <i><?=$order['proof_payment']?></i>
                  </div>
                  </a>
                </div>
                  <br>
                  <div class="form-group">
                    <label for="">Reason Rejected</label>
                    <textarea id="additional" class="form-control" name="reason" rows="6" data-rule="required" data-msg="Please write reason rejected booking!" placeholder="Please write reason rejected booking" required></textarea>
                    <div class="validate"></div>
                  </div>
                  <div class="form-group">
                    <label for="upload">Upload Proof Refund</label>
                    <input type="file" class="form-control" name="refund" id="refund" required/>
                    <span style="color:red; font-size:12px;">*) Upload Required 20MB size</span>
                    <br>
                    <span style="color:red; font-size:12px;">*) Only accept JPG, JPEG and PNG Extension</span>
                    <div class="validate"></div>
                  </div>
                  <div class="btn-wrap">
                    <button name="cancel" style="background-color:green;margin-right:20px;" class="btn-buy">Cancel</button>
                    <button name="reject" style="background-color:red;" class="btn-buy">Reject</button>
                  </div>  
              <?php endforeach;?>
              </form>
            </div>
        </div>
  </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 <!-- ======= Footer ======= -->
 <footer id="footer">
  <div class="container">
    <img src="../assets/img/footer/fotomoto.png" alt="">
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
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="../assets/vendor/counterup/counterup.min.js"></script>
  <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/venobox/venobox.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/second-main.js"></script>
  <script src="../dist/jquery.inputmask.bundle.js"></script>
  <script src="../dist/sweetalert2.all.min.js"></script>
  <script src="../dist/sweetalert2.js"></script>
  <script type="../text/javascript"> 

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