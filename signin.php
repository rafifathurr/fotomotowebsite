<?php

require 'function/function.php';

if(isset($_SESSION["signin"])){
   header("Location: home.php");
   exit;
}

// // cek cookie
// if(isset($_COOKIE['id'])&&isset($_COOKIE['key'])){
//    $id = $_COOKIE['id'];
//    $key = $_COOKIE['key'];

//    // Ambil username berdasarkan id
//    $result = mysqli_query($conn,"SELECT username from admin WHERE id = $id");
//    $row = mysqli_fetch_assoc($result);

//    // Cek Cookie
//    if($key === hash('sha256', $row['username'])){
//        $_SESSION['login'] = true;
//    }
// }

if(isset($_POST["signin"])){

   $email = $_POST["email"];
   $password = $_POST["password"];
   
   $query = "SELECT * FROM user 
               WHERE email = '$email'";

   $result = mysqli_query($conn, $query);

   // cek username
   if( mysqli_num_rows($result) === 1){

       // cek password
       $row = mysqli_fetch_assoc($result);
       if(password_verify($password, $row["password"])){
         $_SESSION["signin"] = true;
         $_SESSION["key"] = $row['user_id'];
         $_SESSION["name"] = $row['full_name'];
         setcookie('id', $row['user_id'],time()+60);
            setcookie('key', hash('sha256',$row['email']),time()+60);
         echo "
      <script type='text/javascript'>
         setTimeout(function () { 
            let timerInterval
            Swal.fire({
               title: 'Please Wait!',
               timer: 1500,
               didOpen: () => {
               Swal.showLoading()
               const b = Swal.getHtmlContainer().querySelector('b')
               timerInterval = setInterval(() => {
               b.textContent = Swal.getTimerLeft()
               }, 1000)
               },
               willClose: () => {
               clearInterval(timerInterval)
               }
               }).then((result) => {
               if (result.dismiss === Swal.DismissReason.timer) {
                  window.location='home.php';
               }
               })}, 100);
         </script>";
         
       }else{
         $_SESSION["email"] = '';
         echo "
         <script type='text/javascript'>
            setTimeout(function () { Swal.fire('Sign In Failed!', 
               'Invalid Credentials!', 
               'error')}, 100);
            </script>
         ";
       }
      }else{
        $_SESSION["email"] = '';
        echo "
        <script type='text/javascript'>
           setTimeout(function () { Swal.fire('Sign In Failed!', 
              'Invalid Email or Password!', 
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
          <i class="fas fa-user"></i>
          <input type="email" placeholder="Email" name="email" />
        </div>
        <div class="textbox">
          <i class="fas fa-lock"></i>
          <input type="password" placeholder="Password" name="password" />
        </div>
        <div class="forgot">
          <a href="forgot.php">Forgot Password?</a>
        </div>
        <button class="btn" name="signin">SIGN IN</button>
        <div class="section-register">
          <p>Don't Have an Account? </p>
          <a href="signup.php">Sign Up</a>
        </div>
        <br>
      </form>
    </div>

    <!-- include footer -->
    <?php include 'partials/footer.php'?>

  </body>
</html>