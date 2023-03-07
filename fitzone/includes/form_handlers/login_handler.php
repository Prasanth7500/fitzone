<?php

$error_array = array();

if(isset($_POST['login_button'])){

    $email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL); //sanitize email (correct format)
    $_SESSION['log_email'] = $email; //store email in session
    $password = md5($_POST['log_password']); //get password

    $check_database_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password'"); //selecting all data from users which has same em and pass user entered
    $check_login_query = mysqli_num_rows($check_database_query); // checking number of rows returned

    if($check_login_query == 1){
        $row = mysqli_fetch_array($check_database_query); //$row stores the one row which has same em and pass user entered by checking db
        $username = $row['username']; //storing only username

        $user_closed_query = mysqli_query($con, "SELECT * from users WHERE email='$email' AND user_closed='yes'");

        if(mysqli_num_rows($user_closed_query) == 1) {
            $reopen_account = mysqli_query($con, "UPDATE users SET user_closed='no' WHERE email='$email'");
        }

        $_SESSION['username'] = $username; //assign the stored username to session variable to know if user logged in

        header("Location: index.php"); //directing to homepage if the login is success
        exit(); 
    }
    else{
        array_push($error_array, "Incorrect email or password");
      }

}

?>