<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php
    require_once 'user_head.php';
    require_once 'conn.php';
    $userName = $_SESSION['user_session'];
    $userId = $_SESSION['id_session'];
    $total = $_POST['total'];
    $sql  = "SELECT * FROM card_add WHERE userName='$userName'";
    $result = mysqli_query($conn, $sql);



    ?>
    <h2 class="text-center">Check OUT</h2>
    <?php
    $count = mysqli_num_rows($result);
    echo '<form action="order_back.php" method="post" enctype="multipart/form-data">';
    $i = 1;
    foreach ($result as $key) {
        echo '
            <div class="card mx-auto mt-5" style="width: 30rem;">
            <div class="card-body">
                    <div class="mb-3">
                        <label name="label" value="aweh"></label>
                        <input type="hidden" name="productId'.$i.'" value="'.$key['productId'].'">
                        <input type="hidden" name="id'.$i.'" value="'.$key['id'].'">
                        Product Name: <input type="text" value="' . $key['productName'] . '" class="form-control"  name="name' . $i . '" disabled>
                        Product Name: <input type="hidden" value="' . $key['productName'] . '" class="form-control"  name="name' . $i . '">
                        Product Price: <input type="text" value="₹' . $key['productPrice'] . '" class="form-control" name="price' . $i . '" disabled>
                        Product Price: <input type="hidden" value="' . $key['productPrice'] . '" class="form-control" name="price' . $i . '">
                        Product Quantity: <input type="text" value="' . $key['productQ'] . '" class="form-control"  name="q' . $i . '" disabled>
                        Product Quantity: <input type="hidden" value="' . $key['productQ'] . '" class="form-control"  name="q' . $i . '" >
                        Product Quantity: <input type="hidden" value="' . $key['productImagePath'] . '" class="form-control" name="imgPath' . $i . '">
                        <img src="' . $key['productImagePath'] . '" alt="" width="100px">
                    </div>
                </div>
            </div>
            ';
        $i += 1;
    }
    echo '<div class="card mx-auto m-4" style="width:10rem;border:0px"><b>Total:<b> <input type="text" value="₹' . $total . '" style="border:0px"  name="total" disabled><br>';
    echo '<button class="btn btn-primary " name="submit" type="submit">Place Order</button></div>
    </form>    
            ';
    ?>
</body>

</html>