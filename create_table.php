<?php

    require_once 'conn.php';
    $sql = "CREATE TABLE card_mngmt(
        id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        user_name VARCHAR (50) NOT NULL,
        user_email VARCHAR (50),
        user_password VARCHAR (600),
        user_address VARCHAR (50),
        user_contact VARCHAR(10),
        user_gender VARCHAR (10)
    )";

    if($conn->query($sql)==true){
        echo "<h3>Table created successfully</h3>";
    }else{
        echo "Error while creating table ".$conn->error;
    }
