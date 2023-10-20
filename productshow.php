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
    require_once 'admin_head.php';
    require_once 'conn.php';
    $sql  = "SELECT * FROM card_products";
    $result = mysqli_query($conn, $sql);
    ?>
    <h2 class="text-center">Products</h2>
    <table class="table mx-auto mt-5" style="width: 90rem;">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    $id1 = $row['id'];
                    $name = $row['productName'];
                    $price = $row['productPrice'];
                    $desc = $row['productDesc'];
                    $path = $row['imagePath'];
                    echo '
                        <td>' . $i . '</td>
                        <td>' . $name . '</td>
                        <td>₹' . $price . '</td>
                        <td>' . $desc . '</td>
                        <td><img src="'.$path.'" width="60px"></td>
                        <td><button class="btn btn-primary "><a class="text-light" href="productUpdate.php?productId='.$id1.'">Update</a></button>&nbsp;<button class="btn btn-danger "><a class="text-light" href="productDelete.php?productId='.$id1.'">Delete</a></button></td>
                    ';
                    $i+=1;
                ?>
            </tr>
        <?php

                }

        ?>
        </tbody>
    </table>
</body>

</html>