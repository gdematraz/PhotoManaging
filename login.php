<?php

include 'config.php';

session_start();

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $mysqli = new mysqli("localhost", "root", "", "photo_managing");

    $query =
        "select id, username, firstname, lastname "
        . " from user where username = '$username' and password ='$password'";


    $result = $mysqli->query($query);


    if ($user = $result->fetch_assoc()) {
        $_SESSION['user']['firstname'] = $user['firstname'];
        $_SESSION['user']['lastname']  = $user['lastname'];
        $_SESSION['user']['username']  = $user['username'];
        $_SESSION['user']['id']        = $user['id'];
        $_SESSION['flash'] = 'Successfully logged in';
    } else {
        $_SESSION['flash'] = 'Utilisateur ou mot de passe incorrect';
    }
}

header('Location: index.php');
