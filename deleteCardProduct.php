<?php
    require_once 'conn.php';
    $deleteId = $_GET['deleteId'];
    $sql = "DELETE FROM card_add WHERE id=$deleteId";
    if($conn->query($sql)){
        echo '<script language="javascript">';
        echo 'alert("Successfully Deleted Card Item"); location.href="show_card.php"';
        echo '</script>';
    }else{
        echo "Error While Deleting Card Product ".$conn->error;
    }
?>