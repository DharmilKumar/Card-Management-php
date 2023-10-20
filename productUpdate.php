<?php
require_once 'conn.php';

if (isset($_GET['productId'])) {
    $productId = $_GET['productId'];
}
$sql1 = "SELECT * FROM card_products WHERE id=$productId";

$result = mysqli_query($conn, $sql1);
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $name = $row['productName'];
    $price = $row['productPrice'];
    $desc = $row['productDesc'];
    $path = $row['imagePath'];
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
    require_once 'admin_head.php';
    require_once 'conn.php';
    // $admin_id = $_SESSION['id_admin'];
    // if ($admin_id == 'a') {
    $p_name = $p_nameErr = $p_decErr = $p_price = $p_priceErr =  $p_dec = $folderErr = $folder = "";

    if (isset($_GET['updateid'])) {
        $updateid = $_GET['updateid'];
    }
    if (isset($_POST['submit1'])) {
        $filename = $_FILES["image"]["name"];
        $tempfile = $_FILES["image"]["tmp_name"];

        if (empty($_POST['name'])) {
            $p_nameErr = "Please Enter Product Name";
        } else {
            $p_name = $_POST['name'];
        }


        if (empty($filename = $_FILES["image"]["name"])) {
            $folderErr = "Please Select Image";
        } else {
            $folder = "images/" . $filename;
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $allowed =  array('jpeg', 'jpg', "png", "gif", "bmp", "JPEG", "JPG", "PNG", "GIF", "BMP");
            if (!in_array($ext, $allowed)) {
                $folderErr = ".jpg .jpeg .png .gif .bmp only allowed!";
                $folder = "";
            } else {
                $folder = "images/" . $filename;
            }
        }

        if (empty($_POST['price'])) {
            $p_priceErr = "Please Enter Product Name";
        } else {
            $p_price = $_POST['price'];
        }

        if (empty($_POST['desc'])) {
            $p_decErr = "Please Enter Product Name";
        } else {
            $p_dec = $_POST['desc'];
        }

        if(!empty($p_name && $p_price && $folder && $p_dec)){
            $sql = "UPDATE card_products set productName='$p_name',productPrice=$p_price,productDesc='$p_dec',imagePath='$folder' WHERE id=$productId";
          if ($conn->query($sql)) {
                echo '<script language="javascript">';
                echo 'alert("Successfully Product Updated"); location.href="productshow.php"';
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
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" value="<?php echo $name?>" class="form-control" id="name" name="name">
                    <span class="w"><?php echo $p_nameErr ?></span>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Product Price</label>
                    <input type="number" class="form-control" value="<?php echo $price?>" id="price" name="price">
                    <span class="w"><?php echo $p_priceErr ?></span>
                </div>
                <div class="mb-3">
                    <label for="decs" class="form-label">Product Description</label>
                    <input type="text" class="form-control" value="<?php echo $desc?>" id="decs" name="desc">
                    <span class="w"><?php echo $p_decErr ?></span>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Product Image</label>
                    <input type="file" class="form-control" id="image" value="<?php echo $path?>" name="image">
                    <span class="w"><?php echo $folderErr ?></span>
                </div>
                <button class="btn btn-primary " name="submit1" type="submit">Update Product</button>
            </form>
        </div>
    </div>

</body>

</html>