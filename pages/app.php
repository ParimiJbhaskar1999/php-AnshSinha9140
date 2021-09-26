<?php
session_start();
include('dbconnect.php');

function sendVerificationEmail($name, $email, $verify_token){
    $subject = "Email Verification";
    $body = "Hi, $name. Click here to activate your account 
    url/verify-email.php?token=$verify_token";
    $sender_mail = "From: bestcoder@gmail.com";

    if(mail($email, $subject, $body, $sender_mail)) {
        $_SESSION['status'] = "Please Verify your Email";
        header("Location: login.php");

    }
    else {
        $_SESSION['status'] = "Registration failed";
        header("Location: index.php");
    }
}

if(isset($_POST['register_btn'])){
       
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password =  mysqli_real_escape_string($con,$_POST['password']);
    $verify_token = bin2hex(random_bytes(15));
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $check_email_query = "SELECT email from Users where email = '$email'  ";
    $check_email_query_run = mysqli_query($con, $check_email_query); 

    if(mysqli_num_rows($check_email_query_run) > 0 ) {

        $_SESSION['status'] = "Email id already exists";
        header("Location: index.php");
    }
    else {

        $query = "INSERT into Users (name, email, password, verify_token, status) values ('$name', '$email', '$hashedPassword', '$verify_token', 'inactive') ";
        $query_run  = mysqli_query($con, $query);

        if($query_run){

            sendVerificationEmail("$name", "$email", "$verify_token");


        } else {
 
            $_SESSION['status'] = "Registration Failed";
            header("Location: index.php");

        }
    }

}

?>