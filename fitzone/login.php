<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/login_style.css">

    <!-- <script>
        window.setInterval('refresh()',1000);
        function refresh(){
            window .location.reload();
        }
    </script> -->

    <?php

    require 'config/config.php';
    require 'includes/form_handlers/login_handler.php';

    ?>
</head>
<body>
    <div class="container">
        <div class="all">
        <div class="container2">
            <p class="h1">Fit Zone</p>
            <p class="h2">Login or sign up below</p>
        </div>
        <form action="login.php" method="POST">
        <div class="inputs">
        <input type="email" name=log_email placeholder="Email Address" class="input" value="<?php 
        if(isset($_SESSION['log_email'])){
            echo $_SESSION['log_email'];
        }?>" required><br><br>
        <input type="password" name=log_password placeholder="Password" class="input"><br><br>
        <button class="s-btn" name="login_button" value="Login" type="submit">LOGIN</button><br><br>

        <?php if(in_array("Incorrect email or password", $error_array)) echo "<span class='err'>Incorrect email or password </span>"; ?>

        <a class="Register" href="register.php">Dont have an account? Register here!</a>
        
        </div>
        </form>
        </div>
    </div>
</body>
</html>