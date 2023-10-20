<!DOCTYPE html>
<html>

<head>
    <style>
        .w {
            color: red;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>

    <body>
        <?php
        require_once 'nav.php';
        require_once 'conn.php';


        $name = $nameErr = $email = $emailErr = $contact = $contactErr = $password = $passwordErr = $hash = $gender = $genderErr = $address = $addressErr = "";

        $emailReg = '/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/';
        $nameReg = '/^[A-Za-z\s]+$/';
        $passReg = '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[\W_]).{8,}$/';
        $contactReg = '/^\d{10}$/';


        if (isset($_POST['submit'])) {

            if (empty($_POST['name'])) {
                $nameErr = "Please Enter Name";
            } else {
                $name = $_POST["name"];
                if (!preg_match($nameReg, $name)) {
                    $nameErr = "Name must be alphabets only.";
                    $name = "";
                } else {
                    $name = $_POST['name'];
                }
            }

            if (empty($_POST['email'])) {
                $emailErr = "Please Enter Email";
            } else {
                $email = $_POST["email"];
                if (!preg_match($emailReg, $email)) {
                    $emailErr = "Please Enter Valid Email";
                    $email = "";
                } else {
                    $email = $_POST["email"];
                }
            }


            if (empty($_POST['password'])) {
                $passwordErr = "Please Enter Password";
            } else {
                $password = $_POST["email"];
                if (!preg_match($passReg, $password)) {
                    $passwordErr = "password has minimum 8 length and contains special character!";
                    $password = "";
                } else {
                    $password = $_POST["password"];
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                }
            }
            if (empty($_POST['contact'])) {
                $contactErr = "Please Enter Contact";
            } else {
                $contact = $_POST["contact"];
                if (!preg_match($contactReg, $contact)) {
                    $contactErr = "Contact must be 10 digits only!";
                    $contact = "";
                } else {
                    $contact = $_POST['contact'];
                }
            }

            if (empty($_POST['gender'])) {
                $genderErr = "Select Gender";
            } else {
                $gender = $_POST['gender'];
            }
            if (empty($_POST['address'])) {
                $addressErr = "Enter Address";
            } else {
                $address = $_POST['address'];
            }


            if (!empty($name && $email && $hash && $contact && $gender && $address)) {
                $sql1 = mysqli_query($conn, "SELECT user_email FROM card_mngmt WHERE user_email='$email'");
                if (mysqli_num_rows($sql1) > 0) {
                    echo '<script language="javascript">';
                    echo 'alert("Email Id already exists")';
                    echo '</script>';
                } else {
                    $sql = "INSERT INTO card_mngmt(user_name,user_email,user_password,user_contact,user_gender,user_address) VALUES ('$name','$email','$hash',$contact,'$gender','$address');";
                    if ($conn->query($sql) == true) {
                        echo "<script type='text/javascript'>alert('Registration Successful');window.location='login.php'</script>";
                    } else {
                        echo "error while inserting data " . $conn->error;
                    }
                }
            }
        }
        ?>
        <div class="card mx-auto mt-5" style="width: 30rem;">
            <div class="card-body">
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Enter Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <span class="w"><?php echo $nameErr ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Enter Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                        <span class="w"><?php echo $emailErr ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Enter Password</label>
                        <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp">
                        <span class="w"><?php echo $passwordErr ?></span>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Enter Contact</label>
                        <input type="contact" class="form-control" id="email" name="contact">
                        <span class="w"><?php echo $emailErr ?></span>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="Male" id="flexRadioDefault1" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="Female" id="flexRadioDefault2" >
                            <label class="form-check-label" for="flexRadioDefault2">
                                Female
                            </label>
                        </div>
                        <span class="w"><?php echo $genderErr ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Enter Address</label>
                        <input type="text-area" class="form-control" id="address" name="address">
                        <span class="w"><?php echo $addressErr ?></span>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Register</button>
                    <div class="text-center">
                        <p>Already registered? <a href="login.php">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </body>

</html>