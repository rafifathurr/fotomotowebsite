<?php

require '../function/function.php';

if(isset($_SESSION["signinadmin"])){
   header("Location: index.php");
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

   $username = $_POST["username"];
   $password = $_POST["password"];
   
   $query = "SELECT * FROM admin 
               WHERE username = '$username'";

   $result = mysqli_query($conn, $query);

   // cek username
   if( mysqli_num_rows($result) == 1){

       // cek password
       $row = mysqli_fetch_assoc($result);
       if(password_verify($password, $row["password"])){
         $_SESSION["signinadmin"] = true;
         setcookie('id', $row['id'],time()+60);
            setcookie('key', hash('sha256',$row['username']),time()+60);
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
                  window.location='index.php';
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
          'Invalid Credentials!', 
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
          <img class="img-login" src="../assets/img/hero/admin_logo.png" alt="">
        </div>
        <div class="textbox">
          <i class="fas fa-user"></i>
          <input type="text" placeholder="Username" name="username" />
        </div>
        <div class="textbox">
          <i class="fas fa-lock"></i>
          <input type="password" placeholder="Password" name="password" />
        </div>
        <br>
        <button class="btn" name="signin">SIGN IN</button>
      </form>
    </div>

    <!-- include footer -->
    <?php include 'partials/footer.php'?>

  </body>
</html>