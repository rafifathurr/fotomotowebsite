<?php 
// Connect database
$conn = mysqli_connect("localhost","root","","fotomoto","3306");
session_start();
$category = "";
$status = "";

// function query
function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

// approval for booking
function approval($data){
    global $conn;

    $statusorder = "Process";
    $invoice = (int)stripslashes($data["invoice"]);
    
    $query = "UPDATE booking SET 
                status_order = '$statusorder' WHERE invoice_id = $invoice and status_order ='Payed'";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);

}

// done for booking
function done($data){
    global $conn;

    $statusorder = "Done";
    $invoice = (int)stripslashes($data["invoice"]);
    
    $query = "UPDATE booking SET 
                status_order = '$statusorder' WHERE invoice_id = $invoice and status_order ='Process'";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);

}

// create booking service
function bookservice($data){
    global $conn;

    // number for invoice
    $invoice = rand(0,10000000);

    $booking_as = $data["book_as"];
    $subject = stripslashes($data["subject"]);
    $price = (int)stripslashes($data["price"]);
    $datebook = stripslashes($data["datebook"]);
    $additionaladd = stripslashes($data["additional"]);
    $user_id = (int)$data["user_id"];
    $status = "book";
    
    $insert_ongkir = "INSERT INTO booking VALUES 
                (0,'$booking_as','$invoice','$subject','$price','$datebook','$additionaladd','$status','$user_id', null, now(),null)";
    mysqli_query($conn, $insert_ongkir);

    $_SESSION["invoice_id"] = $invoice;

    return mysqli_affected_rows($conn);
}

// create testimoni 
function testimoni($data){
    global $conn;

    // number for invoice
    $invoice = rand(0,10000000);

    $user_id = (int)$data["user_id"];
    $type = (int)($data["type"]);
    $testimoni = stripslashes($data["testimoni"]);
    
    $insert = "INSERT INTO testimoni VALUES 
                (0,'$type','$testimoni','$user_id', now())";
    mysqli_query($conn, $insert);

    return mysqli_affected_rows($conn);
}

// register account
function registrasi($data){
   global $conn;

   $email = strtolower(stripslashes($data["email"]));
   $fullname = stripslashes($data["name"]);
   $phone = stripslashes($data["phone"]);
   $password = mysqli_real_escape_string($conn, $data["password"]);
   $password2 = mysqli_real_escape_string($conn, $data["repassword"]);

   // Cek username pada database
   $query_user = "SELECT email FROM user WHERE email = '$email'";
   $result = mysqli_query($conn, $query_user);

   if(mysqli_fetch_assoc($result)){
    echo "
    <script type='text/javascript'>
       setTimeout(function () { 
          let timerInterval
          Swal.fire({
             title: 'Sign Up Fails!',
             text: 'Email Registered!',
             icon: 'error',
             type: 'error',
             showConfirmButton: false
         })
             .then(function () {
                window.location = 'signup.php';
                     });}, 100);
       </script>";
       return false;
   }

   // Cek confirmation password
   if($password !== $password2){
    echo "
    <script type='text/javascript'>
       setTimeout(function () { 
          let timerInterval
          Swal.fire({
             title: 'Sign Up Fails!',
             text: 'Invalid Credentials!',
             icon: 'error',
             type: 'error',
             showConfirmButton: false
         })
             .then(function () {
                window.location = 'signup.php';
                     });}, 100);
       </script>";
       return false;
   }

   // Enkripsi password
   $password = password_hash($password, PASSWORD_DEFAULT);

   // Insert data account
   $query = "INSERT INTO user 
               values 
               (0,'$email','$fullname','$phone','$password')";
   mysqli_query($conn, $query);

   return mysqli_affected_rows($conn);
}

// verification from login
function forgot($data){
    global $conn;

    $email = strtolower(stripslashes($data["email"]));

    $query = "SELECT * FROM user 
    WHERE email = '$email'";

    $result = mysqli_query($conn, $query);

    // cek username

    if( mysqli_num_rows($result) === 1){

    return mysqli_affected_rows($conn);
}
}

// set password from user side 
function setpass($data){
    global $conn;

    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["repassword"]);

    // Cek confirmation password
    if($password !== $password2){
        echo "
        <script type='text/javascript'>
            setTimeout(function () { 
            Swal.fire('Set Up Password Failed!', 
            'Password not Match!', 
            'error');},100);
            </script>
        ";
            return false;
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Insert data account
    $query = "UPDATE user SET password = '$password'
            WHERE email = '$email'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// set password from login
function setpassbyid($data){
    global $conn;

    $user_id = (int)$data["user_id"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["repassword"]);

    // Cek confirmation password
    if($password !== $password2){
        echo "
        <script type='text/javascript'>
            setTimeout(function () { 
            Swal.fire('Set Up Password Failed!', 
            'Password not Match!', 
            'error');},100);
            </script>
        ";
            return false;
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Insert data account
    $query = "UPDATE user SET password = '$password'
            WHERE user_id = '$user_id'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// upload proof payment
function uploadpayment($data){
    global $conn;

    $invoice = (int)stripslashes($data["invoice_id"]);
    $statusorder = "book";
    $user_id = (int)$_SESSION["key"];
    
    // Upload gambar
    $gambar = upload($invoice);
    if(!$gambar){
        return false;
    }
    
    $query = "UPDATE booking SET proof_payment 
                = '$gambar', status_order = 'Payed', updated_at = now()
                WHERE invoice_id =  '$invoice' and status_order ='$statusorder' and user_id=$user_id";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);

}

// reject order
function reject($data){
    global $conn;

    $invoice = (int)stripslashes($data["invoice"]);
    $reason = stripslashes($data["reason"]);
    $statusorder = "Reject";

    // Upload gambar
    $gambar = uploadreject($invoice);
    if(!$gambar){
        return false;
    }

    $query_2 = "INSERT INTO reject VALUES 
                (0,'$invoice','$reason','$gambar')";
        mysqli_query($conn, $query_2);
    
    $query = "UPDATE booking SET status_order = '$statusorder'
                WHERE invoice_id =  '$invoice'";
        mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

// Cancel order
function cancel($data){
    global $conn;

    $invoice = (int)stripslashes($data["invoice"]);
    $statusorder = "Cancel";
    
    $query = "UPDATE booking SET status_order = '$statusorder'
                WHERE invoice_id =  '$invoice'";
        mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

// upload image
function upload($invoice){
    
    $namaFile = $_FILES['upload_proof']['name'];
    $ukuranFile = $_FILES['upload_proof']['size'];
    $error = $_FILES['upload_proof']['error'];
    $tmpName = $_FILES['upload_proof']['tmp_name'];

    // Cek apakah tidak ada gambar yang diupload
    if( $error === 4){ 
        echo "<script>
                alert('Please Upload!')
                </script>";
        return false;        
    }

    // Cek apakah yang diupload adalah gambar
    $extensionGambar = ['jpg', 'jpeg', 'png'];
    $extensiPict = explode('.', $namaFile);
    $extensiPict = strtolower(end($extensiPict));
    if( !in_array($extensiPict,$extensionGambar)){
        echo "<script>
                alert('Choose image only!')
                </script>";
        return false;  
    }

    // cek jika ukurannya terlalu besar
    if($ukuranFile > 20000000){
        echo "<script>
                alert('Size Image Min 20 MB !')
                </script>";
        return false; 
    }

    // Upload gambar setelah pengecekan
    // generate nama file baru
    $namaFileBaru = 'proof_payment_'.$invoice;
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensiPict;

    move_uploaded_file($tmpName, 'proof_payment/' . $namaFileBaru);

    return $namaFileBaru;
}

// upload image
function uploadreject($invoice){
    
    $namaFile = $_FILES['refund']['name'];
    $ukuranFile = $_FILES['refund']['size'];
    $error = $_FILES['refund']['error'];
    $tmpName = $_FILES['refund']['tmp_name'];

    // Cek apakah tidak ada gambar yang diupload
    if( $error === 4){ 
        echo "<script>
                alert('Please Upload!')
                </script>";
        return false;        
    }

    // Cek apakah yang diupload adalah gambar
    $extensionGambar = ['jpg', 'jpeg', 'png'];
    $extensiPict = explode('.', $namaFile);
    $extensiPict = strtolower(end($extensiPict));
    if( !in_array($extensiPict,$extensionGambar)){
        echo "<script>
                alert('Choose image only!')
                </script>";
        return false;  
    }

    // cek jika ukurannya terlalu besar
    if($ukuranFile > 20000000){
        echo "<script>
                alert('Size Image Min 20 MB !')
                </script>";
        return false; 
    }

    // Upload gambar setelah pengecekan
    // generate nama file baru
    $namaFileBaru = 'refund_payment_'.$invoice;
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensiPict;

    move_uploaded_file($tmpName, '../proof_refund/' . $namaFileBaru);

    return $namaFileBaru;
}
?>