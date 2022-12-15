<?php

require 'function/function.php';

if(isset($_POST["signup"])){

    $email = $_POST["email"];
    

        if(registrasi($_POST)>0){
            // $_SESSION["email"] = $email;
            // $_SESSION["signin"] = true;
            // $_SESSION["signup"] = true;
            echo "
            <script type='text/javascript'>
               setTimeout(function () { 
                  let timerInterval
                  Swal.fire({
                     title: 'Sign Up Successfully!',
                     text: '',
                     icon: 'success',
                     type: 'success',
                     showConfirmButton: false
                 })
                     .then(function () {
                        window.location = 'signin.php';
                             });}, 100);
               </script>";
        }
}
?>
<!DOCTYPE html>
<html>
<!-- ====== Include head ======  -->
<?php $currentPage = "Sign Up"; ?>
<?php include 'partials/head.php'?>

  <body>
    <div class="container">
      <form action="" method="POST">
        <div class="row">
          <img class="img-login" src="assets/img/hero/fotomoto_2.png" alt="">
        </div>
        <div class="textbox">
          <i class="fas fa-user"></i>
          <input type="email" placeholder="Input Your Email" name="email" required/>
        </div>
        <div class="textbox">
          <i class="fas fa-user"></i>
          <input type="text" placeholder="Input Your Name" name="name" required/>
        </div>
        <div class="textbox">
          <i class="fas fa-phone" data-fa-transform="rotate-45"></i>
          <input type="text" placeholder="Input Your Phone" name="phone" required/>
        </div>
        <div class="textbox">
          <i class="fas fa-lock"></i>
          <input type="password" placeholder="Input Your Password" name="password" required/>
        </div>
        <div class="textbox">
          <i class="fas fa-lock"></i>
          <input type="password" placeholder="Repeat Your Password" name="repassword" required/>
        </div>
        <button class="btn" name="signup">SIGN UP</button>
        <div class="section-register">
          <p>Have an Account? </p>
          <a href="signin.php">Sign In</a>
        </div>
        <br>
      </form>
    </div>

    <!-- include footer -->
    <?php include 'partials/footer.php'?>

  </body>
  <!-- <script type="text/javascript">
    function validasi(){
    var username = document.forms["myForm"]["username"].value;
    var password = document.forms["myForm"]["password"].value;

    localStorage.setItem("user", username);
    localStorage.setItem("pass", password);

    var usr = localStorage.getItem("user");
    var pss = localStorage.getItem("pass");

    if(usr == "admin" && pss == "admin123"){
      return true;
    }
    else if(username == "" || password == ""){
      alert("Masukan username dan password Anda");
      return false;
    }
    else{
      alert("Username atau password yang Anda masukan SALAH");
      return false;
    }
  }
  </script> -->
</html>