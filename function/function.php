<?php 
// Connect database
$conn = mysqli_connect("localhost","root","","fotomoto","8888");
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

// add item to cart or addition item on cart
function addcart($data){
    global $conn;
 
    $user_id = (int)stripslashes($data["user_id"]);
    $product_id = (int)stripslashes($data["product_id"]);
    $price = (int)stripslashes($data["price"]);
    $qty = (int)stripslashes($data["qty"]);
    $total_price = $price*$qty;
    $statusorder = "cart";

    
    $check = "SELECT invoice_id FROM cart_payment WHERE user_id = '$user_id' and product_id = '$product_id'and status_order = '$statusorder'";
    $result = mysqli_query($conn, $check);
    
    // check if item already exist and invoice_id already exist
    if(mysqli_fetch_assoc($result)){

        $check = "SELECT invoice_id FROM cart_payment WHERE user_id = '$user_id' and status_order = '$statusorder'";
        $result_set = mysqli_query($conn, $check);
        $row   = mysqli_fetch_row($result_set);
        $invoice = (int)$row[0];

        // Insert data cart to database
        $query = "INSERT INTO cart_payment 
                values 
                ('','$user_id','$product_id',now(),'$invoice','$price','$qty','$total_price','$statusorder','','')";
        mysqli_query($conn, $query);
 
        return mysqli_affected_rows($conn);

    }else{
        
        $check_1 = "SELECT * FROM cart_payment WHERE user_id = '$user_id' and status_order = '$statusorder'";
        $result_1 = mysqli_query($conn, $check_1);

        // check if item already exist and invoice_id already exist
        if(mysqli_fetch_assoc($result_1)){

            $check = "SELECT invoice_id FROM cart_payment WHERE user_id = '$user_id' and status_order = '$statusorder'";
            $result_set = mysqli_query($conn, $check);
            $row   = mysqli_fetch_row($result_set);
            $invoice = (int)$row[0];
    
            // Insert data cart to database
            $query = "INSERT INTO cart_payment 
                    values 
                    ('','$user_id','$product_id',now(),'$invoice','$price','$qty','$total_price','$statusorder','','')";
            mysqli_query($conn, $query);
     
            return mysqli_affected_rows($conn);

        }else{

        // number for invoice
        $num = rand(0,10000000);

        // Insert data cart to database
        $query = "INSERT INTO cart_payment 
                values 
                ('','$user_id','$product_id',now(),'$num','$price','$qty','$total_price','$statusorder','','')";
        mysqli_query($conn, $query);
 
        return mysqli_affected_rows($conn);
    }
 }
}

// subtraction item on cart
function minus($data){
    global $conn;

    $statusorder = "cart";
    $user_id = (int)stripslashes($data["user_id"]);
    $id_product = (int)stripslashes($data["product_id"]);

    $selected_product = "SELECT cp.id FROM cart_payment cp WHERE cp.user_id = '$user_id' AND cp.status_order='$statusorder'AND cp.product_id = '$id_product' order by cp.id DESC";

    $result_set = mysqli_query($conn, $selected_product);
    $row   = mysqli_fetch_row($result_set);
    $last_id = (int)$row[0];

    $query = "DELETE FROM cart_payment WHERE id = $last_id";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);

}

// remove item on cart
function removecart($data){
    global $conn;
    $id_product = (int)stripslashes($data["product_id"]);
    $query = "DELETE FROM cart_payment WHERE product_id = $id_product";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);

}

function checkout($data){
    global $conn;

    $statusorder = "cart";
    $user_id = (int)stripslashes($data["user_id"]);
    
    $query = "UPDATE cart_payment SET 
                status_order = 'checkout' WHERE user_id = '$user_id' and status_order ='$statusorder'";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);

}

function addshipping($data){
    global $conn;

    $recipient = stripslashes($data["recipient"]);
    $phone = stripslashes($data["phone"]);
    $province = stripslashes($data["province"]);
    $city = stripslashes($data["city"]);
    $district = stripslashes($data["district"]);
    $zip = (int)stripslashes($data["zip"]);
    $address = stripslashes($data["address"]);
    $note = stripslashes($data["note"]);
    $shiptype = stripslashes($data["shiptype"]);
    $invoice = (int)stripslashes($data["invoice_id"]);
    $user_id = (int)stripslashes($data["user_id"]);
    $ongkir = (int)stripslashes($data["ongkir"]);
    $qty = 1;
    $statusorder = "checkout";
    
    $insert_ongkir = "INSERT INTO cart_payment VALUES 
                ('','$user_id','0',now(),'$invoice','$ongkir','$qty','$ongkir','$statusorder','','')";
    mysqli_query($conn, $insert_ongkir);

    $update_status = "UPDATE cart_payment SET 
                status_order = 'wait payment' WHERE user_id = '$user_id' and status_order ='$statusorder'";
    mysqli_query($conn, $update_status);

    $addship = "INSERT INTO shipping 
                values 
                ('','$invoice','$recipient','$phone',
                '$province','$city','$district','$zip',
                '$address','$note','$shiptype',now())";;
    mysqli_query($conn, $addship);

    return mysqli_affected_rows($conn);

}

// register account
function registrasi($data){
   global $conn;

   $email = strtolower(stripslashes($data["email"]));
   $fullname = stripslashes($data["name"]);
   $phone = stripslashes($data["phone"]);
   $password = mysqli_real_escape_string($conn, $data["password"]);
   $password2 = mysqli_real_escape_string($conn, $data["password2"]);

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
             text: 'Password not Match!',
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
               ('','$email','$fullname','$phone','$password')";
   mysqli_query($conn, $query);

   return mysqli_affected_rows($conn);
}

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

function setpass($data){
    global $conn;

    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

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

// get email
function account($email){
    global $conn;
        $query = "SELECT * FROM user 
                    WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $result;
}

// get name account
function name($email){
    global $conn;
        $query = "SELECT * FROM user 
                    WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $name = $row["full_name"];
        return $name;
}

// get user id 
function id($email){
    global $conn;
    if($email !=''){
        $query = "SELECT * FROM user 
        WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $name = $row["user_id"];
        return $name;
    }else{
        return false;
    }
        
}

// upload proof payment
function uploadpayment($data){
    global $conn;

    $invoice = (int)stripslashes($data["invoice_id"]);
    $statusorder = "waiting for confirm";
    
    // Upload gambar
    $gambar = upload($invoice);
    if(!$gambar){
        return false;
    }
    
    $query = "UPDATE cart_payment SET proof_payment 
                = '$gambar', status_order = '$statusorder', order_date = now()
                WHERE invoice_id =  '$invoice' and status_order ='wait payment'";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);

}

function acceptorder($data){
    global $conn;

    $invoice = (int)stripslashes($data["invoice"]);
    $statusorder = "On Process";

    
    $query = "UPDATE cart_payment SET status_order 
                = '$statusorder'
                WHERE invoice_id =  '$invoice' and status_order ='waiting for confirm'";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);

}

// upload proof payment
function reject($data){
    global $conn;

    $invoice = (int)stripslashes($data["invoice"]);
    $reason = stripslashes($data["reason"]);
    $statusorder = "cancel";

    $query_2 = "INSERT INTO reject VALUES 
                ('','$invoice','$reason')";
        mysqli_query($conn, $query_2);
    
    $query = "UPDATE cart_payment SET status_order = '$statusorder'
                WHERE invoice_id =  '$invoice'";
        mysqli_query($conn, $query);

    

        return mysqli_affected_rows($conn);

}

function delivery($data){
    global $conn;

    $invoice = (int)stripslashes($data["invoice"]);
    $resi = (int)stripslashes($data["resi"]);
    $statusorder = "Delivery";

    
    $query = "UPDATE cart_payment SET resi 
                = '$resi', status_order = '$statusorder'
                WHERE invoice_id =  '$invoice' and status_order ='On Process'";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);

}

// upload image
function upload($invoice){
    
    $namaFile = $_FILES['upload']['name'];
    $ukuranFile = $_FILES['upload']['size'];
    $error = $_FILES['upload']['error'];
    $tmpName = $_FILES['upload']['tmp_name'];

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
    $namaFileBaru = 'bukti_transfer_'.$invoice;
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensiPict;

    move_uploaded_file($tmpName, 'bukti_transfer/' . $namaFileBaru);

    return $namaFileBaru;
}

// upload image
function uploadreceipt($invoice){
    
    $namaFile = $_FILES['upload']['name'];
    $ukuranFile = $_FILES['upload']['size'];
    $error = $_FILES['upload']['error'];
    $tmpName = $_FILES['upload']['tmp_name'];

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
    $namaFileBaru = 'bukti_penerimaan_barang_'.$invoice;
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensiPict;

    move_uploaded_file($tmpName, 'bukti_penerimaan_barang/' . $namaFileBaru);

    return $namaFileBaru;
}

// upload image
function uploadproduct(){
    
    $namaFile = $_FILES['upload']['name'];
    $ukuranFile = $_FILES['upload']['size'];
    $error = $_FILES['upload']['error'];
    $tmpName = $_FILES['upload']['tmp_name'];

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
    if($ukuranFile > 10000000){
        echo "<script>
                alert('Size Image Min 10 MB !')
                </script>";
        return false; 
    }

    // Upload gambar setelah pengecekan
    // generate nama file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensiPict;

    move_uploaded_file($tmpName, '../img/' . $namaFileBaru);

    return $namaFileBaru;
}

function addproduct($data){
    global $conn;
 
    $product = stripslashes($data["product"]);
    $price = (int)stripslashes($data["price"]);
    $ordering = (int)stripslashes($data["order"]);
    $status = "ready";

    // Cek ordering product
   $query_user = "SELECT * FROM product WHERE order_id = '$ordering'";
   $result = mysqli_query($conn, $query_user);

   if(mysqli_fetch_assoc($result)){
    echo "
    <script type='text/javascript'>
       setTimeout(function () { 
          let timerInterval
          Swal.fire({
             title: 'Add Product Fails!',
             text: 'Ordering Already Available!',
             icon: 'error',
             type: 'error',
             showConfirmButton: false
         })
             .then(function () {
                window.location = 'products.php';
                     });}, 100);
       </script>";
       return false;
   }else{

    // Upload gambar
    $gambar = uploadproduct();
    if(!$gambar){
        return false;
    }

        // Insert data cart to database
        $query = "INSERT INTO product 
                values 
                ('','$gambar','$product','$price','$status','$ordering')";
        mysqli_query($conn, $query);
 
        return mysqli_affected_rows($conn);
    }
}

// remove item on cart
function removeproduct($data){
    global $conn;
    $id_product = (int)stripslashes($data["id"]);

    $query = "DELETE FROM product WHERE id = $id_product";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);

}

function updateproduct($data){
    global $conn;
 
    $id = (int)stripslashes($data["id"]);
    $product = stripslashes($data["product"]);
    $price = (int)stripslashes($data["price"]);
    $ordering = (int)stripslashes($data["order"]);
    $status = "ready";

    // Upload gambar
    $gambar = uploadproduct();
    if(!$gambar){
        return false;
    }

    // Insert data cart to database
    $query = "UPDATE product SET
               picture = '$gambar', product = '$product', price = '$price',
               status = '$status', order_id = '$ordering' WHERE id = '$id'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
   }

function confirmitem($data){
    global $conn;

    $invoice = (int)stripslashes($data["invoice"]);
    $status = "Confirmed";

    // Upload gambar
    $gambar = uploadreceipt($invoice);
    if(!$gambar){
        return false;
    }

    $query = "UPDATE cart_payment SET status_order 
                = '$status'
                WHERE invoice_id =  '$invoice' and status_order ='Delivery'";
    mysqli_query($conn, $query);

    $query_2 = "INSERT INTO proof_receipt VALUES
                ('','$invoice','$gambar')";
    mysqli_query($conn, $query_2);

    return mysqli_affected_rows($conn);

   }


?>