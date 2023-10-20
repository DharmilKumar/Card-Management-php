<!DOCTYPE html>
<html>
<style>
    .grid {

        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(18rem, 1fr));
        grid-gap: 20px;
        align-items: stretch;
    }
    .price{
        color: skyblue;
    }
</style>

<head>
    <meta charset="utf-8">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>

<body>
    <?php
    require_once 'conn.php';
    require_once 'nav.php';
    $sql = "SELECT * FROM card_products";
    $products = mysqli_query($conn, $sql);
    echo "<div class='grid m-5'>";
    while ($row = mysqli_fetch_assoc($products)) {
        
        echo "<div class='card mx-auto ' style='width:18rem'>";
        echo "<img class='card-img-top' src=" . $row['imagePath'] . " alt=''/>";
        echo "<div class='card-body'>";
        echo "<div class='card-title'><h5>" . $row['productName'] . "</h5></div>";
        echo "<div class='card-title price'><h5>Price ₹" . $row['productPrice'] . "</h5></div>";
        echo "<div class='card-text'><p>" . $row['productDesc'] . "</p></div>";
        echo "</div>";
        echo "</div>";
        
    }
    echo "</div>";
    ?>
</body>

</html>