<?php
session_start();
include 'dbconnect.php';
if(isset($_GET['token'])){

    $token = $_GET['token'];
    $updatequery = "update User set status = 'active' where token = '$verify_token'";
    $query = mysqli_query($con, $updatequery);

    if($query){
        if(isset($_SESSION['status'])){
            $_SESSION['status'] = "Account Updated Successfully";
            header('location: login.php');
        }

        else {
            $_SESSION['status'] = "Account logged Out";
            header('location: login.php');

        }
    }
    else {
        $_SESSION['status'] = "Account not updated";
            header('location: index.php'); 
    }
}
?>