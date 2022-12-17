<?php

require 'function/function.php';

if(isset($_SESSION["signin"])){
   header("Location: home.php");
   exit;
}elseif(!isset($_SESSION["forgot"])){
  header("Location: signin.php");
  exit;
}

if(isset($_POST["change"])){
  if(setpass($_POST)>0){
    echo "
          <script type='text/javascript'>
             setTimeout(function () { 
                let timerInterval
                Swal.fire({
                   title: 'Change Password Successfully',
                   icon: 'success',
                   type: 'success',
                   showConfirmButton: false
               })
                   .then(function () {
                      window.location = 'signin.php';
                           });}, 100);
             </script>";
    }else{
      echo "
      <script type='text/javascript'>
          setTimeout(function () { Swal.fire('Change Password Failed!', 
            '', 
            'error')}, 100);
          </script>
      ";
    }
  }
?>
<!DOCTYPE html>
<html>
<!-- ====== Include head ======  -->
<?php $currentPage = "Sign In"; ?>
<?php include 'partials/head.php'?>

  <body>
    <div class="container">
      <form action="" method="POST">
        <div class="row">
          <img class="img-login" src="assets/img/hero/fotomoto_2.png" alt="">
        </div>
        <div class="textbox">
          <input type="hidden" value="<?=$_SESSION["email_set"];?>" name="email">
          <i class="fas fa-lock"></i>
          <input type="password" placeholder="Enter Your New Password" name="password" />
        </div>
        <div class="textbox">
          <i class="fas fa-lock"></i>
          <input type="password" placeholder="Rewrite Your New Password" name="repassword" />
        </div>
        <button class="btn" name="change">Set Password</button>
        <br>
      </form>
    </div>

    <!-- include footer -->
    <?php include 'partials/footer.php'?>

  </body>
</html>