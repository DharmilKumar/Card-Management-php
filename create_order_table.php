<?php

    require_once 'conn.php';
    $sql = "CREATE TABLE card_orders(
        id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        userId INT,
        FOREIGN KEY (userId) REFERENCES card_mngmt(id),
        productsId INT,
        FOREIGN KEY (productsId) REFERENCES card_add(id),
        grandTotal INT (250)
    )";

    if($conn->query($sql)==true){
        echo "<h3>Table created successfully</h3>";
    }else{
        echo "Error while creating table ".$conn->error;
    }
