<?php
require_once 'conn.php';
session_start();
$userId = $_SESSION['id_session'];
$userName = $_SESSION['user_session'];
if($userId>0){
if (isset($_POST['submit'])) {
    $sql  = "SELECT * FROM card_add WHERE userName='$userName'";
    $result = mysqli_query($conn, $sql);
    
    $count = mysqli_num_rows($result);
    for ($j = 1; $j <= $count; $j++) {
        $productId = $_POST["productId$j"];
        $Id = $_POST["id$j"];
        $productName = $_POST["name$j"];
        $productPrice = $_POST["price" . $j];
        $productQ = $_POST["q" . $j];
        $productPrice = $_POST["price" . $j];
        $imgPath = $_POST["imgPath" . $j];
        $T = $productQ*$productPrice;
        $sql4 = "INSERT INTO card_orders (userId,productsId,product_q,grandTotal) VALUES ($userId,$productId,$productQ,$T);";
        if($conn->query($sql4)){
            echo '<script language="javascript">';
            echo 'alert("Successfully Ordered"); location.href="user_ordered.php"';
            echo '</script>';
            $sqldel = "DELETE FROM card_add WHERE id=$Id";
            mysqli_query($conn,$sqldel);
        }
    }
}}else{
    
    echo "<script type='text/javascript'>alert('Please Login First');window.location='login.php'</script>";
}
?>