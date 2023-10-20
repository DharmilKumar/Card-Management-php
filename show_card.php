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
    $sql  = "SELECT * FROM card_add WHERE userName = '$userName'";
    $result = mysqli_query($conn, $sql);
    ?>
    <h2 class="text-center">Check Out</h2>
    <table class="table mx-auto mt-5" style="width: 90rem;">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>
                <th scope="col">Image</th>
                <th scope="col">Product Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                $i = 1;
                $grandTotal = 0;
                if($result->num_rows>0){
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id1 = $row['id'];
                        $total = 0;
                        $name = $row['productName'];
                        $price = $row['productPrice'];
                        $path = $row['productImagePath'];
                        $Q = $row['productQ'];
                        $total += $price * $Q;
                        echo '
                            <td>' . $i . '</td>
                            <td>' . $name . '</td>
                            <td>₹' . $price . '</td>
                            <td><img src="' . $path . '" width="60px"></td>
                            <td>' . $Q . '</td>
                            <td>₹' . $total . '</td>
                            <td><button class="btn btn-primary "><a class="text-light" href="updateCardProduct.php?updateId=' . $id1 . '">Update</a></button>
                            <button class="btn btn-danger "><a class="text-light" href="deleteCardProduct.php?deleteId=' . $id1 . '">Delete</a></button></td>';
                            
                        $i += 1;
                        $grandTotal += $total;
                ?>
            </tr>
        <?php

                }

                
                
            

        ?>
        </tbody>
                
    </table>
    <?php 
    echo '<h4 class="ml-5">Total: ₹'.$grandTotal.'</h4>
    <form action="orderProduct.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="total" value="'.$grandTotal.'">
    <button class="btn btn-primary ml-5"><a class="text-light">Check Out</a></button>
    </form>';
    }else{
        echo "<h3 class='ml-5'>There are no products in Card</h3>";
        echo "<a class='ml-5' href='user_productList.php'>Click here to show products</a>";
    }
    ?>
    
</body>

</html>