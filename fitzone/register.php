<?php

require 'config/config.php';
require 'includes/form_handlers/register_handler.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Fitzone</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/register_style.css">

</head>
<body>

<div class="container">
    <div class="all">
    <div class="container2">
            <p class="h1">Fit Zone</p>
            <p class="h2">Login or sign up below</p>
    </div>


    <form action="register.php" method="POST">
        <div class="inputs">
        <input class="input" type="text" name="reg_fname" placeholder="Firstname" value="<?php 
        if(isset($_SESSION['reg_fname'])){
            echo $_SESSION['reg_fname'];
        }?>" required>
        <br><br>
        <?php if(in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) echo "<span class='err'>Your first name must be between 2 and 25 characters</span><br><br>"; ?>
        <input class="input" type="text" name="reg_lname" placeholder="Lastname" value="<?php 
        if(isset($_SESSION['reg_lname'])){
            echo $_SESSION['reg_lname'];
        }?>" required>
        <br><br>
        <?php if(in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) echo "<span class='err'>Your last name must be between 2 and 25 characters</span><br><br>"; ?>
        <input class="input" type="email" name="reg_email" placeholder="Email" value="<?php 
        if(isset($_SESSION['reg_email'])){
            echo $_SESSION['reg_email'];
        }?>"required>
        <br><br>
        <input class="input" type="email" name="reg_email2" placeholder="Confirm Email" value="<?php 
        if(isset($_SESSION['reg_email2'])){
            echo $_SESSION['reg_email2'];
        }?>" required>
        <br><br>
        <?php if(in_array("Email already in use<br>", $error_array)) echo "<span class='err' id='eml'>Email already in use</span><br>"; 
		else if(in_array("Invalid email format<br>", $error_array)) echo "<span class='err' id='eml'>Invalid email format</span><br>";
		else if(in_array("Emails don't match<br>", $error_array)) echo "<span class='err' id='eml'>Emails don't match</span><br>"; ?>
        <input class="input" type="password" name="reg_password" placeholder="Password" required>
        <br><br>
        <input class="input" type="password" name="reg_password2" placeholder="Confirm Password" required>
        <br><br>
        <?php if(in_array("Your passwords do not match<br>", $error_array)) echo "<span class='err'id='eml'>Your passwords do not match</span><br>"; 
		else if(in_array("Your password can only contain english characters or numbers<br>", $error_array)) echo "<span class='err'>Your password can only contain english characters or numbers</span><br>";
		else if(in_array("Your password must be betwen 5 and 30 characters<br>", $error_array)) echo "<span class='err'>Your password must be between 5 and 30 characters</span><br><br>"; ?>
        <input class="s-btn" type="submit" name="register_button" value="Register">
        <br><br>
        <?php if(in_array("<span style='color: #14C800;'>You're all set! Goahead and login!</span><br>", $error_array)) echo "<span class='succ'>You're all set! Go ahead and login!</span><br><br>"; ?>
        <a class="Register" href="login.php">Have an account? Login here!</a>
        </div>
    </form>
    </div>
    </div>
</body>
</html>