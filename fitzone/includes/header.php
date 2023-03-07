<?php

require 'config/config.php';

if(isset($_SESSION['username'])){
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
	$user = mysqli_fetch_array($user_details_query);
}
else{
    header("Location: login.php");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fitzone</title>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500;700;800&display=swap" rel="stylesheet">
    <!-- javascript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.js"></script>
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style2.css">

    <!-- ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

   
</head>
<body>
    <div class="top_bar">
        <div class="logo">
            <a href="index.php">Fit Zone</a>
        </div>
        
        <nav>
            <a href="#">
            <ion-icon name="home"></ion-icon>
            </a>
            <a href="#">
            <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
            </a>
            <a href="#">
            <ion-icon name="caret-forward-circle-outline"></ion-icon>
            </a>
            <a href="#">
            <ion-icon name="people"></ion-icon>
            </a>
            <a href="#">
            <ion-icon name="notifications"></ion-icon>
            </a>
        </nav>

        <div class="name">
        <a href="<?php echo $userLoggedIn; ?>">
            <?php echo $user['first_name']?>
            </a>
        </div>

        <div class="right">
            <a href="#">
            <ion-icon name="settings"></ion-icon>
            </a>
            <a href="includes/handlers/logout.php">
            <ion-icon name="exit-outline"></ion-icon>
            </a>
        </div>
            
    </div>
    <div class="wrapper">
