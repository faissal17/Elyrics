<?php
session_start();
session_destroy();


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
                        <input type="email" class="input-box" placeholder="Email" name="email">
                        <input type="password" class="input-box" placeholder="Password" name="password">
                        <button type="submit" class="submit-btn" name="login">Login</button>
                        <input type="checkbox"><span>Remember Me</span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="../js/script.js"></script>

</html>