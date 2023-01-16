<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Lyrics</title>
    <link rel="shortcut icon" href="../images/smiya.ico" type="image/x-icon">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN core-css ================== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="../css/style.css">
    <!-- ================== END core-css ================== -->
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="inner-box" id="card">
                <div class="card-front">
                    <h2>Login</h2>
                    <form method="POST" action="user.php">
                        <input type="email" class="input-box" placeholder="Email">
                        <input type="password" class="input-box" placeholder="Password">
                        <button type="submit" class="submit-btn">Submit</button>
                        <input type="checkbox"><span>Remember Me</span>
                    </form>
                    <button type="button" class="btn" onclick="Register()">I'm New Here</button>
                </div>
                <div class="card-back">
                    <h2>Register</h2>
                    <form>
                        <input type="text" class="input-box" placeholder="First Name">
                        <input type="text" class="input-box" placeholder="Last Name">
                        <input type="email" class="input-box" placeholder="Email">
                        <input type="password" class="input-box" placeholder="Password">
                        <button type="submit" class="submit-btn">Submit</button>
                        <input type="checkbox"><span>Remember Me</span>
                    </form>
                    <button type="button" class="btn" onclick="login()">Already Have an account</button>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
session_start();
if (isset($_SESSION['type_message']))
    echo "<script>Register()</script>";
?>

<script src="../js/script.js"></script>

</html>