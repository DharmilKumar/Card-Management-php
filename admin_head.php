<html>

<head>
    <style>
        .card-1-img {
            width: 75px;
            border-radius: 50%;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body>
    <?php
    require_once 'conn.php';
    session_start();
    $userid = "";
    $userid = $_SESSION['id_admin'];
    if($userid=='a'){

    
    if (isset($_POST['id'])) {
        session_destroy();
        echo "<script type='text/javascript'>alert('LoggedOut');window.location='productList.php'</script>";
    }
}else{
    echo "<script type='text/javascript'>alert('Please Login First');window.location='nav.php'</script>";

}
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Cart Management</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="productadd.php">Add Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="productshow.php">Show Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="allOrders.php">Show All Orders</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex justify-content-end">
                <div class="d-flex align-items-center">
                    <form action="" method="post">
                        <button class="btn btn-primary btn-block" name="id" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    
</body>

</html>