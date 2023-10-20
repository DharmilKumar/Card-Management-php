<?php

    require_once 'conn.php';
    $sql = "CREATE TABLE card_products(
        id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        productName VARCHAR (50) NOT NULL,
        productPrice INT (255),
        productDesc VARCHAR (100),
        imagePath VARCHAR (50),
        user_name VARCHAR (50),
        user_email VARCHAR (50),
        ,
        createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if($conn->query($sql)==true){
        echo "<h3>Table created successfully</h3>";
    }else{
        echo "Error while creating table ".$conn->error;
    }
