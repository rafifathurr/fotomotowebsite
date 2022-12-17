<?php 
require 'function/function.php';

if(!isset($_SESSION["signin"])){
  header("Location: signin.php");
  exit;
}

$invoice = $_GET["invoice_id"];

$orders = query('SELECT *
                from booking cp
                join user u on u.user_id = cp.user_id
                left join reject r on r.invoice = cp.invoice_id
                where cp.invoice_id = '.$invoice.'
                order by cp.id DESC');

?>
<!DOCTYPE html>
<html lang="en">

<!-- ====== Include head ======  -->
<?php $currentPage = "Detail Booking"; ?>
<?php include 'partials/head.php'?>

<body>

<!-- ====== Include navbar ====== -->
<?php include 'partials/navbar.php'?>

  <main id="main">
    <section id="contact" class="pricing">
    <div class="container">

      <div class="section-titlepage">
        <h2>Detail Booking</h2>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-6">
            <form action="" method="post" role="form">
            <?php foreach ($orders as $order):?>
              <input type="hidden" value="<?=$order['invoice_id']?>">
                <div class="form-group">
                  <label for="">Invoice</label>
                  <input type="text" name="name" class="form-control" value ="INV/<?=$order['invoice_id'];?>" placeholder="Your Name" data-rule="minlen:4" readonly/>
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <label for="">User</label>
                  <input type="text" name="name" class="form-control" value ="<?=$order['full_name'];?>" placeholder="Your Name" data-rule="minlen:4" readonly/>
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="text" class="form-control" name="book_as" value ="<?=$order['email'];?>" placeholder="Booking As Name" readonly required/>
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
                    <a href="proof_payment/<?=$order['proof_payment'];?>" style="color:#007bff !important" target="blank">
                    <i><?=$order['proof_payment']?></i>
                  </div>
                  </a>
                </div>
                <?php if($order['status_order']=='Reject'):?>
                  <div style="border-style: solid;border-color: coral;border-radius:5px;padding:20px">
                    <h5 style="text-align:center;color:red !important;"> <b>REJECT NOTE</b> </h5>
                    <div class="form-group">
                      <label for="">Reason Rejected</label>
                      <textarea id="additional" class="form-control" name="additional" rows="6" data-rule="required" data-msg="Please write something for us" placeholder="Additional Add" readonly><?=$order['reason'];?></textarea>
                      <div class="validate"></div>
                    </div>
                    <div class="form-group">
                    <label for="">Proof Refund</label>
                    <br>
                    <div>
                      <a href="proof_refund/<?=$order['refund'];?>" style="color:#007bff !important" target="blank">
                      <i><?=$order['refund']?></i>
                    </div>
                    </a>
                  </div>
                  </div>
                <?php elseif($order['status_order']=='Process'):?>
                  <br>
                  <div class="form-group" style="border-style: solid;border-color: coral;border-radius:5px;padding:20px">
                    <label for="" style="color:red;"> <b>NOTE!</b> </label>
                    <p>We Will Contact Your Email or Call to Process Your Order, Thank You!</p>
                  </div>
                <?php endif;?>
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