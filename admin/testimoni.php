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
      <div class="section-titlepage">
        <h2>Testimoni User</h2>
      </div>
      <div class="section-body" style="width:70%; margin-left:15%; margin-right:15%;">
          <table id="datatable" class="display table table-striped table-hover dataTable"
                cellspacing="0" width="50%" role="grid" aria-describedby="add-row_info"
                style="width: 100%;">
                <thead>
                  <tr role="row">
                      <th>No</th>
                      <th>User</th>
                      <th>Type</th>
                      <th>Testimoni</th>
                  </tr>
                </thead>
                <?php $i=1;?>
                <!-- Menampilkan data dari database menggunakan PHP -->
                <?php foreach($testimoni as $testi): ?>
                <tbody>
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
                </tbody>
                <?php $i++;?>
                <?php endforeach;?>
          </table>
      </div>
    </section>
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
</html>