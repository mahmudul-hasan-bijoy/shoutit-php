<?php
include 'database.php';

//check form is submitted
if (isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($con, $_POST['user']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    //set timezone
    date_default_timezone_set('Asia/Dhaka');
    $time = date('h:i:s:a', time());

    //validate input
    if (!isset($user) || $user == '' || !isset($message) || $message == '') {
        $error = 'Please fill your Name and Message';
        header('Location: index.php?error='.urlencode($error));
        exit();
    } else {
        $query = "INSERT INTO shouts (user, message, time)
                VALUES ('$user','$message','$time')";

        if(!mysqli_query($con, $query)) {
            die('Error: '.mysqli_error($con));
        } else {
            header('Location: index.php');
            exit();
        }
    }

}
