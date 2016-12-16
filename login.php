<?php

include 'config.php';

session_start();

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query =
        "select id, username, firstname, lastname "
        . " from user where username = '$username' and password ='$password'";


    $result = $con->query($query);


    if ($user = $result->fetch_assoc()) {
        $_SESSION['user']['firstname'] = $user['firstname'];
        $_SESSION['user']['lastname']  = $user['lastname'];
        $_SESSION['user']['username']  = $user['username'];
        $_SESSION['user']['password']  = $user['password'];
        $_SESSION['user']['id']        = $user['id'];
        $_SESSION['message'] = 'Successfully logged in';
    } else {
        $_SESSION['message'] = 'Wrong user or password, try again !';
    }
}

header('Location: index.php');
