<?php


// Declaring variables to prevent errors

$fname = ""; //Firstname
$lname = ""; //Lastname
$em = "";   //Email
$em2 = "";  //Email2
$password ="";  // Password
$password2 =""; //Password2
$date = ""; // Sign up date
$error_array = array();  // Holds error message

// Form Handling

if(isset($_POST['register_button'])){

    //Regestration form values

    //First name
    $fname = strip_tags($_POST['reg_fname']); // remove html tags from value
    $fname = str_replace(' ','',$fname); // replace empty space with nothing in value or remove space
    $fname = ucfirst(strtolower($fname)); //uppercase first letter
    $_SESSION['reg_fname'] = $fname; //Store firstname in session variable

    //Last name
    $lname = strip_tags($_POST['reg_lname']); // remove html tags from value
    $lname = str_replace(' ','',$lname); // replace empty space with nothing in value or remove space
    $lname = ucfirst(strtolower($lname)); //uppercase first letter
    $_SESSION['reg_lname'] = $lname; //Store lastname in session variable

    //Email
    $em = strip_tags($_POST['reg_email']); // remove html tags from value
    $em = str_replace(' ','',$em); // replace empty space with nothing in value or remove space
    $em = ucfirst(strtolower($em)); //uppercase first letter
    $_SESSION['reg_email'] = $em; //Store email1 in session variable

    //Email2
    $em2 = strip_tags($_POST['reg_email2']); // remove html tags from value
    $em2 = str_replace(' ','',$em2); // replace empty space with nothing in value or remove space
    $em2 = ucfirst(strtolower($em2)); //uppercase first letter
    $_SESSION['reg_email2'] = $em2; //Store email2 in session variable

    //Password
    $password = strip_tags($_POST['reg_password']); // remove html tags from value

    //Password2
    $password2 = strip_tags($_POST['reg_password2']); // remove html tags from value

    //date
    $date = date("Y-m-d"); ///Current date

    if($em == $em2){
        if(filter_var($em, FILTER_VALIDATE_EMAIL)){
            $em = filter_var($em, FILTER_VALIDATE_EMAIL);

            //Check if email already exists 

            $e_check = mysqli_query($con, "SELECT `email` FROM users WHERE email='$em'");

            //Count no of rows returned

            $num_rows = mysqli_num_rows($e_check);

            if($num_rows>0) {
                array_push($error_array, "Email already in use<br>") ;
            }

        }
        else{
            array_push($error_array, "Invalid Format<br>");
        }
    }
    else {
		array_push($error_array, "Emails don't match<br>");
	}

    if(strlen($fname)>25 || strlen($fname) < 2){
        array_push($error_array, "Your first name must be between 2 and 25 characters<br>");
    }

    if(strlen($lname)>25 || strlen($lname) < 2){
        array_push($error_array, "Your last name must be between 2 and 25 characters<br>");
    }

    if($password != $password2) {
		array_push($error_array,  "Your passwords do not match<br>");
	}
	else {
		if(preg_match('/[^A-Za-z0-9]/', $password)) {
			array_push($error_array, "Your password can only contain english characters or numbers<br>");
		}
	}

	if(strlen($password)<5 || strlen($password)>30){
        array_push($error_array,"Your password must be betwen 5 and 30 characters<br>");
    }
    
    if(empty($error_array)){
        $password = md5($password); //Encrypt password before sending to database

        // Generate username by concatenating first name and last name

        $username = strtolower($fname ."_" .$lname);
        $check_username_query = mysqli_query($con, "SELECT username from users WHERE username='$username'");

        $i=0;

        //if username already exists add number to username
        while(mysqli_num_rows($check_username_query) !=0){
            $i++; //Add 1 to i
			$username = $username . "_" . $i;
            $check_username_query = mysqli_query($con, "SELECT username From users Where username='$username'");
        }

        //Profile picture assignment
        $rand = rand(1, 2); //Random number between 1 and 2
        if($rand == 1)
            $profile_pic = "assets/images/profile_pics/defaults/head_deep_blue.png";
        else if($rand == 2)
            $profile_pic = "assets/images/profile_pics/defaults/head_emerald.png";
        

        $query = mysqli_query($con, "INSERT INTO users VALUES ('', '$fname', '$lname', '$username', '$em', '$password', '$date', '$profile_pic', '0', '0', 'no', ',')");

        array_push($error_array, "<span style='color: #14C800;'>You're all set! Goahead and login!</span><br>");

        
		//Clear session variables 
		$_SESSION['reg_fname'] = "";
		$_SESSION['reg_lname'] = "";
		$_SESSION['reg_email'] = "";
		$_SESSION['reg_email2'] = "";

    }


    
}


?>