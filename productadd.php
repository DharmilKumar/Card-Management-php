<!DOCTYPE html>
<html>

<head>
    <style>
        .w{
            color: red;
        }
    </style>
    <meta charset="utf-8">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <?php
    require_once 'admin_head.php';
    require_once 'conn.php';

    $p_name = $p_nameErr = $p_decErr = $p_price = $p_priceErr =  $p_dec = $folderErr = $folder = "";

    if(isset($_POST['submit'])){
        $filename = $_FILES["image"]["name"];
        $tempfile = $_FILES["image"]["tmp_name"];

        if(empty($_POST['name'])){
            $p_nameErr = "Please Enter Product Name";
        }else{
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
        
        if(empty($_POST['price'])){
            $p_priceErr = "Please Enter Product Name";
        }else{
            $p_price = $_POST['price'];
        }

        if(empty($_POST['desc'])){
            $p_decErr = "Please Enter Product Name";
        }else{
            $p_dec = $_POST['desc'];
        }
        if(!empty($p_name && $p_price && $folder && $p_dec)){
            //insert into database
            $sql = "INSERT INTO card_products (productName, productPrice, productDesc, imagePath) VALUES ('$p_name',$p_price,'$p_dec','$folder');";
            if($conn->query($sql)){
                move_uploaded_file($tempfile,$folder);
                echo "<script type='text/javascript'>alert('Product Added');window.location='productadd.php'</script>";
            }else{
                echo "Error while inserting Product ".$conn->error ;
            }
        }

    }


    ?>

    <div class="card mx-auto mt-5" style="width: 30rem;">
        <div class="card-body">
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                    <span class="w"><?php echo $p_nameErr ?></span>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Product Price</label>
                    <input type="number" class="form-control" id="price" name="price">
                    <span class="w"><?php echo $p_priceErr ?></span>
                </div>
                <div class="mb-3">
                    <label for="decs" class="form-label">Product Description</label>
                    <input type="text" class="form-control" id="decs" name="desc">
                    <span class="w"><?php echo $p_decErr ?></span>
                </div>
                
                <div class="mb-3">
                        <label for="image" class="form-label">Product Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                        <span class="w"><?php echo $folderErr ?></span>
                    </div>
                <button class="btn btn-primary " name="submit" type="submit">Add Product</button>
            </form>
        </div>
    </div>
</body>

</html>