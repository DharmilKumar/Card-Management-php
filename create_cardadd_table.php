<?php

    require_once 'conn.php';
    $sql = "CREATE TABLE card_add(
        id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        productName VARCHAR (50) NOT NULL,
        productPrice INT (255),
        productImagePath VARCHAR (50),
        productQ INT(255),
        userName VARCHAR (50),
        userEmail VARCHAR (50),
        userContact VARCHAR(20),
        userAddress VARCHAR (100),
        createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if($conn->query($sql)==true){
        echo "<h3>Table created successfully</h3>";
    }else{
        echo "Error while creating table ".$conn->error;
    }
