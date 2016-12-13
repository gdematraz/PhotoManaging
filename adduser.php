<?php

include 'config.php';

if (isset($_POST['submit'])) {
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $sql = "INSERT INTO user (username, password, firstname, lastname) VALUES ('$username', '$password', '$firstname', '$lastname')";

    if ($con->query($sql) === TRUE) {
        echo "Utilisateur ajouté !";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    $con->close();
}

header('Location: index.php');
