<?php 
require 'function/function.php';

if(!isset($_SESSION["signin"])){
  header("Location: signin.php");
  exit;
}

$user_id = $_SESSION['key'];

$neworder = query("SELECT *
from booking cp
join user u on u.user_id = cp.user_id
where cp.status_order != 'book' and cp.user_id = '$user_id'
order by cp.id DESC");

if(isset($_POST['filter'])){
  $status = $_POST['status'];
  $user_id = $_SESSION['key'];
  if($status==""){
    $neworder =  query("SELECT *
    from booking cp
    join user u on u.user_id = cp.user_id
    where cp.status_order != 'book' and cp.user_id = '$user_id'
    order by cp.id DESC");
  }else{
    $neworder = query("SELECT *
    from booking cp
    join user u on u.user_id = cp.user_id
    where cp.status_order = '$status' and cp.user_id = '$user_id'
    order by cp.id DESC");
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<!-- ====== Include head ======  -->
<?php $currentPage = "History Booking"; ?>
<?php include 'partials/head.php'?>

<body>

<!-- ====== Include navbar ====== -->
<?php include 'partials/navbar.php'?>

  <main id="main">
    <section id="contact" class="pricing">
    <div class="container">

    <div class="section-titlepage">
          <h2>History Booking</h2>
        </div>
        <div class="btn-tambah" style="margin-bottom:20px;">
                  <input type="hidden" value="<?=$id?>" id="id" name="id">
               <form action="history.php" method="post">
                 <select id="status" name="status" style="text-align:center;">
                     <option selected="true" value="" disabled="disabled">- Choose Status -</option>  
                     <option value="">All</option> 
                     <option value="Payed">Waiting for Process</option>
                     <option value="Done">Done</option>
                     <option value="Process">Process</option>
                     <option value="Reject">Reject</option>
                     <option value="Cancel">Cancel</option>
                  </select> 
                  <button class="btn-action" name="filter">FILTER</button>
               </form>
            </div>
        <div style="overflow-x:auto;">
          <table id="add-row" class="display table table-striped table-hover dataTable"
                cellspacing="0" width="100%" role="grid" aria-describedby="add-row_info"
                style="width: 100%;">
                <thead>
                <tr role="row">
                    <th>No</th>
                    <th>Invoice</th>
                    <th>Booking As</th>
                    <th>Date Booking</th>
                    <th>Subject</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <?php $i=1;?>
                <!-- Menampilkan data dari database menggunakan PHP -->
                <?php foreach($neworder as $new): ?>
                <tbody>
                <tr>
                    <td><?php echo $i;?></td>
                    <td>INV/<?=$new["invoice_id"];?></td>
                    <td><?=$new["booking_as"];?></td>
                    <td><?=$new["book_date"];?></td>
                    <td><?=$new["subject"];?></td>
                    <td style="text-align:right;">Rp. <?=number_format($new["price"],0,',','.');?>,-</td>
                    <td>
                      <?php if($new["status_order"]=="Payed"):?>
                        <div style="background-color:yellow;text-align:center;border-radius:5px;">
                        Waiting for process
                        </div>
                      <?php elseif($new["status_order"]=="Process" || $new["status_order"]=="Done"):?>
                        <div style="background-color:green;color:white;text-align:center;border-radius:5px;">
                        <?=$new["status_order"];?>
                        </div>
                      <?php else:?>
                        <div style="background-color:red;color:white;text-align:center;border-radius:5px;">
                        <?=$new["status_order"];?>
                        </div>
                      <?php endif;?>
                    </td>
                    <td style="display:flex;">
                        <form action="" method="post">
                          <input type="hidden" name="invoice" value="<?=$new["invoice_id"]?>" >
                          <a class="btn-action" style="padding:5px 12px;color:white;margin-right:5px;" href="detail.php?invoice_id=<?php echo $new["invoice_id"];?>" title="Detail">
                            Detail
                          </a> 
                        </form>
                    </td>
                </tr>
                </tbody>
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