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
    $sql  = "SELECT * FROM card_orders";
    $result = mysqli_query($conn, $sql);
    ?>
    <h2 class="text-center">All the Orders</h2>
    <table class="table mx-auto mt-5" style="width: 90rem;">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User Name</th>
                <th scope="col">User Contact</th>
                <th scope="col">User Address</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>
                <th scope="col">Product Quantity</th>
                <th scope="col">Total</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                $i = 1;
                $t = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $id1 = $row['id'];
                    $userId = $row['userId'];
                    $productsId = $row['productsId'];
                    $productQ = $row['product_q'];
                    $gtotal = $row['grandTotal'];
                    $t += $gtotal;
                    $sql4 = "SELECT * FROM card_products WHERE id=$productsId";
                    $resulte = mysqli_query($conn, $sql4);
                    while($row3=$resulte->fetch_assoc()){
                        $pname = $row3['productName'];
                        $pprice = $row3['productPrice'];
                    }
                    $sql2 = "SELECT * FROM card_mngmt WHERE id=$userId";
                    $resultee = mysqli_query($conn, $sql2);

                    while($row1=$resultee->fetch_assoc()){
                        $user_name = $row1['user_name'];
                        $user_contact = $row1['user_contact'];
                        $user_address = $row1['user_address'];
                        echo '<th>'.$i.'</th>';
                        echo '<th>'.$user_name.'</th>';
                        echo '<th>'.$user_contact.'</th>';
                        echo '<th>'.$user_address.'</th>';
                        echo "<th>".$pname."</th>";
                        echo "<th>".$pprice."</th>";
                        echo "<th>".$productQ."</th>";
                        echo "<th>".$gtotal;
                    }
                    
                    $i+=1;
                ?>
            </tr>
        <?php

                }

        ?>
        </tbody>
        <!-- <td><button class="btn btn-primary "><a class="text-light" href="productUpdate.php?productId='.$id1.'">Update</a></button>&nbsp;<button class="btn btn-danger "><a class="text-light" href="productDelete.php?productId='.$id1.'">Delete</a></button></td> -->
                    
    </table>
            <h3 class="text-center" >Total : <?php echo $t;?></h3>
</body>

</html>