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

if(isset($_POST["verif"])){

   $email = $_POST["email"];
   
   $query = "SELECT * FROM user 
               WHERE email = '$email'";

   $result = mysqli_query($conn, $query);

   // cek username
   if( mysqli_num_rows($result) === 1){

       // cek password
       $_SESSION["forgot"]= true;
       $_SESSION["email_set"]= $_POST['email'];
         echo "
         <script type='text/javascript'>
         setTimeout(function () { 
            let timerInterval
            Swal.fire({
               title: 'Verification Successfully',
               text: 'Please Set Up Your Password!',
               icon: 'success',
               type: 'success',
               showConfirmButton: false
           })
               .then(function () {
                  window.location = 'setpassword.php';
                       });}, 100);
         </script>";
      }else{
        $_SESSION["forgot"] = false;
        echo "
        <script type='text/javascript'>
           setTimeout(function () { Swal.fire('Verification Failed!', 
              'Email Unavailable!', 
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
          <input type="email" placeholder="Enter Your Email" name="email" />
        </div>
        <button class="btn" name="verif">Verification</button>
        <br>
      </form>
    </div>

    <!-- include footer -->
    <?php include 'partials/footer.php'?>

  </body>
</html>