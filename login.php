<?php

/**
 * Date: 09.09.2016
 * Time: 15:23
 */

session_start();

if (isset($_POST['submit'])) {

    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'admin');
    define('DB_PASSWORD', '12345');
    define('DB_DATABASE', 'db_photo_managing');
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);


    $username = $_POST['username'];
  $password = $_POST['password'];

  $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


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
