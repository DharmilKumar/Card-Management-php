<?php
require_once 'conn.php';

if (isset($_GET['updateId'])) {
    $productId = $_GET['updateId'];
}
$sql1 = "SELECT * FROM card_add WHERE id=$productId";

$result = mysqli_query($conn, $sql1);
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $q = $row['productQ'];
}



?>

<!DOCTYPE html>
<html>

<head>
    <style>
        .w{
            color: red;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <?php
    require_once 'user_head.php';
    require_once 'conn.php';
    // $admin_id = $_SESSION['id_admin'];
    // if ($admin_id == 'a') {
    $QERR = ""  ;
    if (isset($_GET['updateId'])) {
        $updateid = $_GET['updateId'];
    }
    if (isset($_POST['submit1'])) {
        if(empty($_POST['q'])){
            $QERR = "Please Enter Quantity";
        }else{
            $Q = $_POST['q'];
        }
        if(!empty($Q)){
            $sql = "UPDATE card_add set productQ=$Q WHERE id=$updateid";
          if ($conn->query($sql)) {
                echo '<script language="javascript">';
                echo 'alert("Successfully Quantity Updated"); location.href="show_card.php"';
                echo '</script>';
            } else {
                echo "error while Updating data " . $conn->error;
            }
        } else {
            echo "error";
        }
    }
    // } else {
    //     echo '<script language="javascript">';
    //     echo 'alert("Please Login First"); location.href="user_login.php"';
    //     echo '</script>';
    // }
    ?>
    <div class="card mx-auto mt-5" style="width: 30rem;">
        <div class="card-body">
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="q" class="form-label">Product Quantity</label>
                    <input type="number" value="<?php echo $q?>" class="form-control" id="q" name="q">
                    <span class="w"><?php echo $QERR ?></span>
                </div>
                <button class="btn btn-primary " name="submit1" type="submit">Update Product Quantity</button>
            </form>
        </div>
    </div>

</body>

</html>