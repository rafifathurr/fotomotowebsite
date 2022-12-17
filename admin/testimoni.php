<?php 
require '../function/function.php';

if(!isset($_SESSION["signinadmin"])){
  header("Location: signin.php");
  exit;
}

$testimoni = query("SELECT *
from testimoni cp
join user u on u.user_id = cp.user_id
order by cp.id DESC");

// if(isset($_POST['cancel'])){
//   if(cancel($_POST)>0){
//     echo "
//     <script type='text/javascript'>
//        setTimeout(function () { 
//           let timerInterval
//           Swal.fire({
//              title: 'Booking Succesfully Cancelled!',
//              text: '',
//              icon: 'success',
//              type: 'success',
//              showConfirmButton: false
//          })
//              .then(function () {
//                 window.location = 'index.php';
//                      });}, 100);
//        </script>";
//  }
// }elseif(isset($_POST['pay'])){
//   $_SESSION["booking"] = true;
//   $_SESSION["invoice_id"] = $_POST['invoice'];
//   header('Location: payment.php');
//   exit;
// }

?>
<!DOCTYPE html>
<html lang="en">

<!-- ====== Include head ======  -->
<?php $currentPage = "Testimoni"; ?>
<?php include 'partials/head.php'?>

<body>

<!-- ====== Include navbar ====== -->
<?php include 'partials/nav.php'?>

  <main id="main">
    <section id="contact" class="pricing">
    <div class="container">

        <div class="section-titlepage">
          <h2>Testimoni User</h2>
        </div>
        <!-- <div style="margin-bottom:50px;">
          <a class="btn-action" style="padding:10px;" href="addtestimoni.php">Add Testimoni</a>
        </div> -->
        <div style="overflow-x:auto;">
          <table id="add-row" class="display table table-striped table-hover dataTable"
                cellspacing="0" width="100%" role="grid" aria-describedby="add-row_info"
                style="width: 100%;">
                <tr role="row">
                    <th>No</th>
                    <th>User</th>
                    <th>Type</th>
                    <th>Testimoni</th>
                </tr>
                <?php $i=1;?>
                <!-- Menampilkan data dari database menggunakan PHP -->
                <?php foreach($testimoni as $testi): ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?=$testi["full_name"];?></td>
                    <?php if($testi["type"]==1):?>
                      <td>Happy</td>
                    <?php else:?>
                      <td>Unhappy</td>
                    <?php endif;?>
                    <td><?=$testi["testimoni"];?></td>
                </tr>
                <?php $i++;?>
                <?php endforeach;?>
        </table>
      
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