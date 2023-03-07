<?php

ob_start(); //Turns output buffering

session_start();

$timezone = date_default_timezone_set("Asia/Kolkata");

// Connecting with database

$con = mysqli_connect("localhost","root","","fitzone");

if(mysqli_connect_errno()) {
    
    echo "Failed to connect with db" .mysqli_connect_errno();
}

?>