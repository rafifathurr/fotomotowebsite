<?php

require '../function/function.php';
if(!isset($_SESSION["signin"])){
   header("Location: signin.php");
   exit;
}

// $neworder = query("SELECT cp.invoice_id, cp.order_date, u.full_name as user, s.recipient, 
// CONCAT(s.address, ' ', s.district, ' ', s.city, ' ',s.province) as address, FORMAT(sum(cp.total_price),0) as total_price
// from cart_payment cp
// left join user u on u.user_id = cp.user_id
// left join shipping s on s.invoice_id = cp.invoice_id
// where cp.status_order = 'waiting for confirm'
// group by cp.invoice_id
// order by cp.id DESC");

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
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tanggal Booking</th>
                    <th>Keterangan</th>
                    <th>Additional</th>
                    <th>Status</th>
                </tr>
            <tbody></tbody>
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