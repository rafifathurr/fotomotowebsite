<?php

require '../function/function.php';
if(!isset($_SESSION["signinadmin"])){
   header("Location: signin.php");
   exit;
}

$neworder = query("SELECT *
from booking cp
join user u on u.user_id = cp.user_id
where cp.status_order = 'payed'
order by cp.id DESC");

if(isset($_POST["process"])){
 
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
<?php $currentPage = "Home"; ?>
<?php include 'partials/head.php'?>

<body>

<?php include 'partials/nav.php'?>

  <main id="main">

    <section id="contact" class="contact">
      <div class="container">
  
        <div class="section-titlepage">
          <h2>Admin Page</h2>
          <p>Managing for customer booking data</p>
        </div>
        <div style="overflow-x:auto;">
          <table id="add-row" class="display table table-striped table-hover dataTable"
                cellspacing="0" width="100%" role="grid" aria-describedby="add-row_info"
                style="width: 100%;">
                <tr role="row">
                    <th>No</th>
                    <th>Invoice</th>
                    <th>Name</th>
                    <th>Booking As</th>
                    <th>Date Booking</th>
                    <th>Subject</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                <?php $i=1;?>
                <!-- Menampilkan data dari database menggunakan PHP -->
                <?php foreach($neworder as $new): ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td>INV/<?=$new["invoice_id"];?></td>
                    <td><?=$new["full_name"];?></td>
                    <td><?=$new["booking_as"];?></td>
                    <td><?=$new["book_date"];?></td>
                    <td><?=$new["subject"];?></td>
                    <td style="text-align:right;">Rp. <?=number_format($new["price"],0,',','.');?>,-</td>
                    <td style="display:flex;">
                        <form action="" method="post">
                          <button class="btn-action" style="padding:1px 12px;">
                            <a style="color:white;" href="detailsorder.php?invoice_id=<?= $new["invoice_id"]; $_SESSION["menu"]="neworder";?>"><i class="fa fa-info" title="Details"></i></a> 
                          </button>
                          <button class="btn-action" name="process">
                            <i class="fa fa-check" title="Process"></i>
                          </button>
                        </form>
                    </td>
                </tr>
                <?php $i++;?>
                <?php endforeach;?>
        </table>
    
        </div>
       
    </section>
    <!-- End Contact Us Section -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <img src="../assets/img/footer/fotomoto.png" alt="">
      <div class="copyright">
        &copy; Copyright <strong><span>Fotomoto Photograph</span></strong>. All Rights Reserved
      </div>
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- include footer -->
  <?php include 'partials/footer.php'?>
  <script src="../dist/table.js"></script>
  <script src="../dist/datatables.min.js"></script>

</body>

<!-- <script>
  const bookings = JSON.parse(localStorage.getItem('bookings')) || [];
  let items = [];
  $.each(bookings, function (index, val) {
    items.push('<tr>');
      items.push('<td>' + val.name + '</td>');
      items.push('<td>' + val.email + '</td>');
      items.push('<td>' + val.datebook + '</td>');
      items.push('<td>' + val.subject + '</td>');
      items.push('<td>' + val.additional + '</td>');
      items.push('<td> <input type="checkbox"> <label>Verifikasi</label><br>');
  });
  $("<tbody />", { "class": "tbody-new", html:items.join("") }).appendTo("table");



</script> -->

</html>