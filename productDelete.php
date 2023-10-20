<?php
    require_once 'conn.php';
    $productId = $_GET['productId'];
    session_start();
    $id = "";
    $id = $_SESSION['id_admin'];
    if($id=='a'){
        
    $sql = "DELETE FROM card_products WHERE  id = $productId";
    if(mysqli_query($conn, $sql)){
        echo "<script type='text/javascript'>alert('Product Deleted');window.location='productshow.php'</script>";
    }else{
        echo "Error While deleting Product.  ".$conn->error;
    }}else{
        echo "<script type='text/javascript'>alert('Please Login First');window.location='nav.php'</script>";
    }
?>