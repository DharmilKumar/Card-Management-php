<?php
session_start();
require_once 'conn.php';
$uid = $_SESSION['id_session'];
if($uid>0){
    
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['productName'];
    $price = $_POST['productPrice'];
    $desc = $_POST['productDesc'];
    $path = $_POST['imagePath'];
    $q = $_POST['productQ'];
    $productId = $_POST['productId'];
    $userId = $_SESSION['id_session'];
    $sql = "SELECT * FROM card_mngmt WHERE id = $userId";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $user_name = $row['user_name'];
            $user_address = $row['user_address'];
            $user_email = $row['user_email'];
            $user_contact = $row['user_contact'];
        }
    }

    $sql2 = "INSERT INTO card_add (productId,productName,productPrice,productImagePath,productQ,userName,userEmail,userContact,userAddress) 
                VALUES ($productId,'$name',$price,'$path',$q,'$user_name','$user_email','$user_contact','$user_address');";
    if ($conn->query($sql2)) {
        echo "<script type='text/javascript'>alert('Added to Card');window.location='show_card.php'</script>";
    } else {
        echo "Error while add to card " . $conn->error;
    }
}
}else{
    echo "<script type='text/javascript'>alert('Please Login First');window.location='login.php'</script>";

}