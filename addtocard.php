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
    require_once 'conn.php';
    require_once 'user_head.php';
    if (isset($_GET['productId'])) {
        $productId = $_GET['productId'];
    }
    $sql = "SELECT * FROM card_products WHERE id=$productId";
    $products = mysqli_query($conn, $sql);
    echo "<div class='grid m-5'>";
    while ($row = mysqli_fetch_assoc($products)) {
        echo "<div class='card mx-auto ' style='width:18rem'>";
        echo "<img class='card-img-top' src=" . $row['imagePath'] . " alt=''/>";
        echo "<div class='card-body'>";
        echo "<div class='card-title'><h5>" . $row['productName'] . "</h5></div>";
        echo "<div class='card-title price'><h5>Price ₹" . $row['productPrice'] . "</h5></div>";
        echo "<div class='card-text'><p>" . $row['productDesc'] . "</p></div>";
        echo '
                <form action="card.php" method="post" enctype="multipart/form-data">
                
                <input type="hidden" name="productId" value="'.$productId.'">
                <input type="hidden" value="' . $row['productName'] . '"  name="productName" >
                <input type="hidden" value="' . $row['productPrice'] . '"  name="productPrice" >
                <input type="hidden" value="' . $row['productDesc'] . '"  name="productDesc" >
                <input type="hidden" value="' . $row['imagePath'] . '"  name="imagePath" >
                <input type="number" placeholder="Enter Quantity    " name="productQ">
            ';
        echo "<button class='btn btn-primary' type='submit' name='submit'>add</button><form>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
    ?>
</body>

</html>