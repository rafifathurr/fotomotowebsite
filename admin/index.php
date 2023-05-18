<?php

require '../function/function.php';
if(!isset($_SESSION["signinadmin"])){
   header("Location: signin.php");
   exit;
}

$neworder = query("SELECT *
from booking cp
join user u on u.user_id = cp.user_id
where cp.status_order != 'book' and cp.status_order != 'cancel'
order by cp.updated_at DESC");

if(isset($_POST["process"])){
 
  if(approval($_POST)>0){
     echo "
     <script type='text/javascript'>
        setTimeout(function () { 
           let timerInterval
           Swal.fire({
              title: 'Process Successfully!',
              text: '',
              icon: 'success',
              type: 'success',
              showConfirmButton: false
          })
              .then(function () {
                 window.location = 'index.php';
                      });}, 100);
        </script>";
  }else{
      echo "<script type='text/javascript'>
      setTimeout(function () { Swal.fire('Process Failed!', 
         '', 
         'error')}, 100);
      </script>
   ";
  }
}

if(isset($_POST["finish"])){
 
  if(done($_POST)>0){
     echo "
     <script type='text/javascript'>
        setTimeout(function () { 
           let timerInterval
           Swal.fire({
              title: 'Finishing Booking Successfully!',
              text: '',
              icon: 'success',
              type: 'success',
              showConfirmButton: false
          })
              .then(function () {
                 window.location = 'index.php';
                      });}, 100);
        </script>";
  }else{
      echo "<script type='text/javascript'>
      setTimeout(function () { Swal.fire('Finishing Booking Failed!', 
         '', 
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
          <table id="datatable" class="display table table-striped table-hover dataTable"
                cellspacing="0" width="100%" role="grid" aria-describedby="add-row_info"
                style="width: 100%;">
                <thead>
                  <tr role="row">
                      <th>No</th>
                      <th>Invoice</th>
                      <th>Name</th>
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
                      <td><?=$new["full_name"];?></td>
                      <td><?=$new["booking_as"];?></td>
                      <td><?=$new["book_date"];?></td>
                      <td><?=$new["subject"];?></td>
                      <td style="text-align:right;">Rp. <?=number_format($new["price"],0,',','.');?>,-</td>
                      <td>
                        <?php if($new["status_order"]=="Payed"):?>
                          <div style="padding:3px 8px;background-color:yellow;text-align:center;border-radius:5px;">
                          <?=$new["status_order"];?>
                          </div>
                        <?php elseif($new["status_order"]=="Process" || $new["status_order"]=="Done"):?>
                          <div style="padding:3px 8px;background-color:green;color:white;text-align:center;border-radius:5px;">
                          <?=$new["status_order"];?>
                          </div>
                        <?php else:?>
                          <div style="padding:3px 8px;background-color:red;color:white;text-align:center;border-radius:5px;">
                          <?=$new["status_order"];?>
                          </div>
                        <?php endif;?>
                      </td>
                      <td style="display:flex;">
                      <?php if($new["status_order"]=="Payed"):?>
                          <form action="" method="post">
                            <input type="hidden" name="invoice" value="<?=$new["invoice_id"]?>" >
                            <a class="btn-action" style="padding:5px 12px;color:white;margin-right:5px;" href="detail.php?invoice_id=<?php echo $new["invoice_id"];?>" title="Detail">
                              <i class="fa fa-info" title="Details"></i>
                            </a> 
                            <a class="btn-action" style="padding:5px 8px;margin-right:5px;" href="rejectform.php?invoice_id=<?php echo $new["invoice_id"];?>" title="Reject">
                              <i class="fa fa-close"></i>
                            </a>
                            <button class="btn-action" name="process" style="padding:3px 7px;">
                              <i class="fa fa-check" title="Process"></i>
                            </button>
                          </form>
                      <?php elseif($new["status_order"]=="Process"):?>
                        <form action="" method="post">
                          <input type="hidden" name="invoice" value="<?=$new["invoice_id"]?>" >
                          <a class="btn-action" style="padding:5px 12px;color:white;" href="detail.php?invoice_id=<?= $new["invoice_id"];?>"><i class="fa fa-info" title="Details"></i></a> 
                          <button class="btn-action" name="finish" style="padding:3px 7px;">
                              <i class="fa fa-check" title="Done"></i>
                            </button>
                        </form>
                      <?php else:?>
                        <form action="" method="post">
                          <a class="btn-action" style="padding:5px 12px;color:white;" href="detail.php?invoice_id=<?= $new["invoice_id"];?>"><i class="fa fa-info" title="Details"></i></a> 
                        </form>
                      <?php endif;?>
                      </td>
                  </tr>
                </tbody>
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

</main>
</body>

<script>
  $(document).ready(function() {
    $('#datatable').DataTable();
  });
</script>

</html>